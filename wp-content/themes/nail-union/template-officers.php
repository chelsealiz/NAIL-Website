<?php
/*
Template Name: Officers Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if (get_field('header_image_mobile') && get_field('header_image_lg')): ?>
				<div class="hero-section" data-interchange="[<?php the_field('header_image_mobile'); ?>, small], [<?php the_field('header_image_lg'); ?>, medium]">
					<div class="dimmer"></div>
					<div class="title-content">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				</div>
				<?php else: ?>
				<div class="hero-section no-img">
					<div class="title-content">
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
				</div>
			<?php endif; ?>



			<div class="officers">
				<?php if( have_rows('officers') ): ?>
					<?php while ( have_rows('officers') ) : the_row(); ?>
						<div class="officer">
							<?php $img_url = wp_get_attachment_image_src(get_sub_field('image'), 'medium'); ?>
							<?php $img_url = $img_url[0]; ?>
							<img class="main-img" src="<?php echo $img_url; ?>">
							<h2 class="name"><?php the_sub_field('name'); ?></h2>
							<h2 class="title"><?php the_sub_field('title'); ?></h2>

							<?php $img_url_full = wp_get_attachment_image_src(get_sub_field('image'), 'small'); ?>
							<?php $img_url_full = $img_url_full[0]; ?>
							<div class='main-popup'>
								<button class="officers-popup-close"><i class="fa fa-times" aria-hidden="true"></i></button>
								<div class="popup-left">

									<img class="left-img" src="<?php echo $img_url_full; ?>">
								</div>
								<div class="popup-right">
									<h2 class="name"><?php the_sub_field('name'); ?></h2>
									<h2 class="title"><?php the_sub_field('title'); ?></h2>
									<?php the_sub_field('bio_blurb'); ?>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					<?php endwhile; ?>

				<?php endif; ?>
			</div>

			<div class="national-reps-wrap">
				<h2 class="national-rep-title"><?php the_field('bottom_section_title'); ?></h2>
				<div class="national-reps">
					<?php if( have_rows('national_reps') ): ?>
						<?php while ( have_rows('national_reps') ) : the_row(); ?>
							<div class="national-rep">
								<?php $img_url = wp_get_attachment_image_src(get_sub_field('image'), 'medium'); ?>
								<?php $img_url = $img_url[0]; ?>
								<img class="main-img" src="<?php echo $img_url; ?>">
								<h2 class="name"><?php the_sub_field('name'); ?></h2>
								<h2 class="title"><?php the_sub_field('title'); ?></h2>

								<?php $img_url_full = wp_get_attachment_image_src(get_sub_field('image'), 'small'); ?>
								<?php $img_url_full = $img_url_full[0]; ?>
								<div class='main-popup'>
									<button class="reps-popup-close"><i class="fa fa-times" aria-hidden="true"></i></button>
									<div class="popup-left">

										<img class="left-img" src="<?php echo $img_url_full; ?>">
									</div>
									<div class="popup-right">
										<h2 class="name"><?php the_sub_field('name'); ?></h2>
										<h2 class="title"><?php the_sub_field('title'); ?></h2>
										<?php the_sub_field('bio_blurb'); ?>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						<?php endwhile; ?>

					<?php endif; ?>
				</div>
			</div>

			<div id="dim-overlay"></div>

		<?php endwhile; endif; ?>

</div> <!-- end #content -->

<?php get_footer(); ?>