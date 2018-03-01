<footer class="footer" role="contentinfo">
	<div class="footer-holder">
		<div class="footer-left">
			<?php the_field('address', 'option') ?>
		</div>

		<div class="footer-right">
			<div class="social"><a href="<?php the_field('facebook_link', 'option') ?>" class="facebook-link"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></div>
			<div class="important-links">
				<?php joints_footer_links(); ?>
			</div>
		</div>
	</div>
</footer> <!-- end .footer -->
</div> <!-- end .main-content -->
<?php wp_footer(); ?>
</body>
</html> <!-- end page -->