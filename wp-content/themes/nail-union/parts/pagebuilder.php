<?php if (have_rows('page_builder')): ?>

	<div class="pb">

		<?php while( have_rows('page_builder') ): the_row(); ?>

			<?php if ( get_row_layout() == 'wysiwyg'): ?>
				<div class="pb-section pb-wysiwyg">
					<div class="text-holder">
						<?php the_sub_field('wysiwyg'); ?>
					</div>
				</div>

			<?php elseif( get_row_layout() == 'full_width_video' ): ?>
				<div class="pb-section pb-fw-vid">
					<div class="responsive-embed widescreen">
						<?php the_sub_field('embed_code'); ?>
					</div>
				</div>

			<?php elseif( get_row_layout() == 'image_left' ): ?>
				<div class="pb-section pb-img-left">
					<?php $image = get_sub_field('image'); ?>
					<div class="img-l" style="background-image: url(<?php echo $image['url']; ?>);"></div>
					<div class="text-r">
						<?php the_sub_field('text_section'); ?>
					</div>
				</div>

			<?php elseif( get_row_layout() == 'three_column' ): ?>
				<div class="pb-section pb-three-col">
					<?php if( have_rows('columns') ): ?>
						<?php while ( have_rows('columns') ) : the_row(); ?>
							<div class="col-section">
								<img src="<?php the_sub_field('image'); ?>">
									<?php the_sub_field('text'); ?>
								</div>
							<?php endwhile; ?>

						<?php endif; ?>
					</div>

				<?php elseif( get_row_layout() == 'full_width_image' ): ?>
					<?php $image = get_sub_field('image'); ?>
					<div class="pb-section pb-fw-img" style="background-image: url(<?php echo $image['url']; ?>);">

					</div>

				<?php elseif( get_row_layout() == 'full_width_quote' ): ?>
					<div class="pb-section pb-fw-quote">
						<h2 class="quote"><?php the_sub_field('quote_text'); ?></h2>
						<?php if (get_sub_field('attribution')): ?>
							<h3 class='attribution'><?php the_sub_field('attribution'); ?></h3>
						<?php endif; ?>

					</div>

				<?php elseif( get_row_layout() == 'two_column_text' ): ?>
					<div class="pb-section pb-two-col">
						<div class="text-l"><?php the_sub_field('text_left'); ?></div>
						<div class="text-r"><?php the_sub_field('text_right'); ?></div>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>
		</div>


	<?php endif; ?>