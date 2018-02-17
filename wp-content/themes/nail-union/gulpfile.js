'use strict';

var proxy_url = 'http://chelsportfolio.wip/'; // REPLACE THIS WITH YOUR LOCAL DEV URL

// PUT ALL BOWER JS FILES USED HERE TO BE COMBINED INTO BUILD DIRECTORY
var bower_files = [
  './bower_components/jquery/dist/jquery.js',
  './bower_components/fastclick/lib/fastclick.js',
  './bower_components/foundation-sites/dist/js/foundation.js',   
  './bower_components/motion-ui/dist/motion-ui.js',
  './bower_components/slick-carousel/slick/slick.js',
  './bower_components/handlebars/handlebars.js',
  './bower_components/lodash/dist/lodash.js',
  './bower_components/moment/min/moment.min.js',
  './assets/js/fontawesome-all.min.js',
  // './bower_components/greensock/uncompressed/jquery.gsap.js', // GREENSOCK
];

// PUT ALL FONT FILES USED HERE TO BE COPIED INTO BUILD DIRECTORY
var fonts = [
  './bower_components/font-awesome/fonts/*',
];


/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* YOU SHOULDN'T NEED TO MODIFY ANYTHING BELOW HERE UNLESS YOU WANT TO ADD NEW FUNCTIONALITY */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------- */

 

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserify = require('gulp-browserify'),
    browserSync = require('browser-sync'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    watch = require('gulp-watch'),
    fs = require('fs'),
    justIndent = require('just-indent'),
    notifier = require('node-notifier'),
    Tail = require('tail').Tail,
    exec = require('child_process').exec;


// COMPILE THEME SASS FILE
gulp.task('sass', function () {
  return gulp.src('./assets/scss/style.scss')
    .pipe(sourcemaps.init()) // Start Sourcemaps
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('./build/css/'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/css/'));
});


// COMPILE ADMIN SASS FILE
gulp.task('admin', function () {
  return gulp.src('./assets/scss/admin.scss')
    .pipe(sourcemaps.init()) // Start Sourcemaps
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('./build/css/'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/css/'));
});


// COPY ALL FONTS INTO FONT BUILD DIRECTORY
gulp.task('fonts', function () {
  return gulp.src(fonts)
    .pipe(gulp.dest('./build/fonts/'));
});


// CONCAT ALL BOWER FILES INTO ONE DIST FILE
gulp.task('bower', function() {
  return gulp.src(bower_files)
    .pipe(sourcemaps.init())
    .pipe(concat('bower.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/js'));
});


// MINIFY THEME JS FILE
gulp.task('script', function() {
  return gulp.src('./assets/js/scripts.js')
    .pipe(sourcemaps.init())
    // .pipe(browserify({
    //   insertGlobals : true,
    //   debug : false
    // }))
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(gulp.dest('./build/js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./build/js'));
});

// BROWSERSYNC AND WATCH
gulp.task('watch', function () {
  var files = [
    './build/css/*.css',
    './build/js/*.js',
    './build/vue/**',
    '**/*.php',
    './assets/images/**/*.{png,jpg,gif,svg,webp}',
  ], lastFile = null, lastFileTimeout = null,
     lastFileTimeoutFunc = function () {
        lastFile = null;
      };

  browserSync.init(files, { proxy: proxy_url });

  gulp.watch('./assets/scss/**/*.scss', ['sass']);
  gulp.watch('./assets/js/*.js', ['script']);
  gulp.watch('./assets/vue-modules/**', ['vueify']);
  gulp.watch('./assets/scss/admin.scss', ['admin']);

  watch(['./**/*.php', '../../plugins/*vbtk*/*.php']).on('change', function (changedFile) {
    if (changedFile.indexOf('/plugins/') !== -1 &&
        changedFile.indexOf('vbtk') === -1) {
      return;
    }

    if (changedFile === lastFile) {
      lastFile = null;
      return;
    }

    console.log('Beautifing', changedFile);

    var content = fs.readFileSync(changedFile).toString()
                    .replace('/\t+/g', ' ').replace('/\r+/g', '').replace(/\n[ \t]+\n/g, '\n\n')
                    .replace(/\t+/g,  ' ')
                    .replace(/\ {2,}/g, ' ')
                    .replace(/<\?([^p])/, '<?php $1'),
        newContent = justIndent(content, '\t');


    if (content !== newContent) {
      clearTimeout(lastFileTimeout);

      lastFileTimeout = setTimeout(lastFileTimeoutFunc, 750);

      console.log('Saving', changedFile);
      lastFile = changedFile;
      fs.writeFile(changedFile, newContent.trim());
    }
  });
});

gulp.task('notify', function () {
  // Desktop notifications for PHP errors
  var logFile = new Tail('/Applications/MAMP/logs/php_error.log'),
      baseDir = __dirname.replace(/\/theme.*/, ''),
      dirRegex = new RegExp(baseDir, 'gi'),
      lastMessage = null,
      messageTimeout = null;

  notifier.on('click', function (a, b) {
    exec('open -a Terminal');
  });

  logFile.on('line', function (data) {
    if (!/^\[.+?UTC\]\s*/.test(data)) {
      return;
    }

    var title = proxy_url,
        string = data.replace(dirRegex, '')
                     .replace(/\/theme[^\/]+\/[^\/]+\//g, '')
                     .replace(/^\[.+?UTC\]\s*/, '')
                     .replace(/^([A-Za-z]+\s*){1,3}:\s*/, function (m) {
                        title = m;
                        return '';
                     })
                     .replace(/(\/[^\/\s]+)+/, function (path) {
                        return path.truncate(35, 'middle');
                     });

    console.log(data);

    if (string == lastMessage) {
      return;
    }

    lastMessage = string;
    clearTimeout(messageTimeout);

    messageTimeout = setTimeout(function () {
      notifier.notify({
        title: title,
        message: string,
        icon: baseDir + '/uploads/2017/04/cropped-spc-logo-only-100x100.png',
        timeout: 5,
        actions: 'Console'
      });
    }, 2500);
  });
});

gulp.task('dev', ['admin', 'bower','fonts','script','sass','watch']);
gulp.task('production', ['admin', 'bower','fonts','script','sass']);