<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="hero-section" data-interchange="[<?php the_field('hero_image_mobile'); ?>, small], [<?php the_field('hero_image_large'); ?>, medium]">
				<div class="dimmer"></div>
				<div class="title-content">
					<h1 class="title"><?php the_field('main_title') ?></h1>
				</div>
			</div>

			<div class="mission-section">
				<div class="mission-wrap">
					<div class="mission-left">
						<h2 class="mission-title"><?php the_field('mission_section_title') ?></h2>
					</div>
					<div class="mission-right">
						<?php the_field('mission_content'); ?>
					</div>
				</div>
			</div>

			<div class="represent-section" style="background-image: url('<?php echo wp_get_attachment_url( get_field('representation_background'), 'full'); ?>');">
				<h2 class="represent-title"><?php the_field('representation_title'); ?></h2>
				<div class="represent-wrap">
					<div class="represent-left">
						<img data-interchange="[<?php echo wp_get_attachment_url( get_field('representation_image'), 'medium'); ?>, small], [<?php echo wp_get_attachment_url( get_field('representation_image'), 'large'); ?>, medium]">
						</div>
						<div class="represent-right">
							<?php the_field('representation_content'); ?>
						</div>
					</div>
				</div>

				<!-- Remember to adjust this when it's done b/c this is hardcore dummy content -->
				<div class='recent-news'>
					<h2 class="news-title">Recent News</h2>
					<div class="news-wrap">
						<div class="news-article">
							<a href="#" class="article-link">
								<a href="https://placeholder.com"><img src="http://via.placeholder.com/300x300"></a>
								<h3 class="news-title">Article Title</h3>
								<p class="blurb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut tellus lorem. Aliquam in sapien et orci condimentum bibendum. Maecenas nec nibh eu tortor dictum cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur nec commodo urna. Sed quis nibh ut enim feugiat suscipit.</p>
							</a>
						</div>
						<div class="news-article">
							<a href="#" class="article-link">
								<a href="https://placeholder.com"><img src="http://via.placeholder.com/300x300"></a>
								<h3 class="news-title">Article Title</h3>
								<p class="blurb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut tellus lorem. Aliquam in sapien et orci condimentum bibendum. Maecenas nec nibh eu tortor dictum cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur nec commodo urna. Sed quis nibh ut enim feugiat suscipit.</p>
							</a>
						</div>
						<div class="news-article">
							<a href="#" class="article-link">
								<a href="https://placeholder.com"><img src="http://via.placeholder.com/300x300"></a>
								<h3 class="news-title">Article Title</h3>
								<p class="blurb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut tellus lorem. Aliquam in sapien et orci condimentum bibendum. Maecenas nec nibh eu tortor dictum cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur nec commodo urna. Sed quis nibh ut enim feugiat suscipit.</p>
							</a>
						</div>
					</div>
				</div>

			<?php endwhile; endif; ?>

	</div> <!-- end #content -->

	<?php get_footer(); ?>