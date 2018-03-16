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



		<?php endwhile; endif; ?>

</div> <!-- end #content -->

<?php get_footer(); ?>