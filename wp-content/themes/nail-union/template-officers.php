<?php
/*
Template Name: Officers Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="hero-section no-img">
				<div class="title-content">
					<h1 class="title"><?php the_title(); ?></h1>
				</div>
			</div>

			<div class="officers">
				<?php if( have_rows('officers') ): ?>
					<?php while ( have_rows('officers') ) : the_row(); ?>
						<div class="officer">
							<?php $img_url = wp_get_attachment_url(get_sub_field('image')); ?>
							<img src="<?php echo $img_url; ?>">
							<h2 class="name"><?php the_sub_field('name'); ?></h2>
							<h2 class="title"><?php the_sub_field('title'); ?></h2>

							<?php $img_url_full = wp_get_attachment_url(get_sub_field('image'), 'full'); ?>
							<div class='main-popup' data-equalizer="officer-popup" data-equalize-on='medium'>
								<button class="officers-popup-close"><i class="fa fa-times" aria-hidden="true"></i></button>
								<div class="popup-left" data-equalizer-watch="officer-popup" style="background-image: url(<?php echo $img_url_full; ?>);"></div>
								<div class="popup-right" data-equalizer-watch="officer-popup">
									<h2 class="name"><?php the_sub_field('name'); ?></h2>
									<h2 class="title"><?php the_sub_field('title'); ?></h2>
									<?php the_sub_field('bio_blurb'); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

				<?php endif; ?>
			</div>

			<div id="dim-overlay"></div>

		<?php endwhile; endif; ?>

</div> <!-- end #content -->

<?php get_footer(); ?>