<?php if ( has_post_thumbnail() ): ?>
	<div class="hero-section" data-interchange="[<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>, small], [<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>, medium]">
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

<?php if (have_rows('page_builder')): ?>

	<div class="pb">

		<?php while( have_rows('page_builder') ): the_row(); ?>

			<?php if ( get_row_layout('wysiwyg') ): ?>
				<div class="pb-section pb-wysiwyg">
					<div class="text-holder">
						<?php the_sub_field('wysiwyg'); ?>
						</div>
				</div>

				<?php elseif( get_row_layout('full_width_video') ) ?>
				<div class="pb-section pb-fw-vid">

				</div>

				<?php elseif( get_row_layout('image_left') ) ?>
				<div class="pb-section pb-img-left">

				</div>

				<?php elseif( get_row_layout('three_column') ) ?>
				<div class="pb-section pb-three-col">

				</div>

				<?php elseif( get_row_layout('full_width_image') ) ?>
				<div class="pb-section pb-fw-img">

				</div>

				<?php elseif( get_row_layout('full_width_quote') ) ?>
				<div class="pb-section pb-fw-quote">

				</div>

				<?php elseif( get_row_layout('two_column_text') ) ?>
				<div class="pb-section pb-two-col">

				</div>
			<?php endif; ?>

		<?php endwhile; ?>
	</div>


<?php endif; ?>