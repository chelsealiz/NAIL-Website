<?php get_header(); ?>

<div id="content">
	<div class="hero-section no-img">
		<div class="title-content">
			<h1 class="title">News</h1>
		</div>
	</div>

	<div class="article-holder">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="article">
					<div class="left-img">
						<?php the_post_thumbnail('small'); ?>
					</div>

					<div class="right-txt">
						<?php if (get_field('external_link')): ?>
							<a class="title-link" target="_blank" href="<?php the_field('external_post_link'); ?>"><h2 class="article-title"><?php the_title(); ?></h2></a>
							<?php else: ?>
							<a class="title-link" href="<?php echo get_permalink(); ?>"><h2 class="article-title"><?php the_title(); ?></h2></a>
						<?php endif; ?>

						<p class="date"><?php echo get_the_date(); ?></p>

						<p class="blurb"><?php the_field('blurb', get_the_ID()); ?></p>
					</div>

				</div>


			<?php endwhile; ?>

			<?php joints_page_navi(); ?>

			<?php else : ?>

			<?php get_template_part( 'parts/content', 'missing' ); ?>

		<?php endif; ?>
	</div>

</div> <!-- end #content -->

<?php get_footer(); ?>