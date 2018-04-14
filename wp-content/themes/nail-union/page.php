<?php get_header(); ?>

<div id="content">


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'parts/pagebuilder' ); ?>

		<?php endwhile; else : ?>

		<?php get_template_part( 'parts/content', 'missing' ); ?>

	<?php endif; ?>


</div> <!-- end #content -->

<?php get_footer(); ?>