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
						<h2 class="mission-title"><?php the_field('mission_section_title'); ?></h2>
					</div>
					<div class="mission-right">
						<?php the_field('mission_content'); ?>
						<a href="<?php the_field('mission_link'); ?>" class="mission-btn"><?php the_field('mission_link_text'); ?></a>
					</div>
				</div>
			</div>

			<div class="represent-section" style="background-image: url('<?php echo wp_get_attachment_image_src( get_field('representation_background'), 'full')[0]; ?>');">
				<h2 class="represent-title"><?php the_field('representation_title'); ?></h2>
				<div class="represent-wrap">
					<div class="represent-left"><img src="<?php echo wp_get_attachment_image_src( get_field('representation_image'), 'large')[0]; ?>">
						</div>
						<div class="represent-right">
							<?php the_field('representation_content'); ?>
							<a href="<?php the_field('representation_link'); ?>" class="represent-btn"><?php the_field('representation_link_text'); ?></a>
						</div>
					</div>
				</div>

				<?php $args = array('posts_per_page' => 3);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) : ?>
					<div class='recent-news'>
						<h2 class="news-section-title">Recent News</h2>
						<div class="news-wrap">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="news-article">
									<a href="<?php the_permalink(); ?>" class="article-link"></a>
									<?php if (get_the_post_thumbnail()): ?>
										<?php echo get_the_post_thumbnail(); ?>
									<?php endif; ?>
									<h3 class="news-title"><?php the_title(); ?></h3>
									<?php if ( get_field('blurb') ): ?>
										<p class="blurb"><?php the_field('blurb'); ?></p>
									<?php endif; ?>

								</div>
							<?php endwhile; ?>
						</div>
						<div class="link-wrap">
							<a href="/news" class='news-link'>More News</a>
						</div>
					</div>
				<?php endif; wp_reset_postdata(); ?>

			<?php endwhile; endif; ?>

	</div> <!-- end #content -->

	<?php get_footer(); ?>