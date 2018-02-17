<div class="top-bar small-bar" id="main-menu-mobile">
	<div class="top-bar-left">
		<a class='blog-name' href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
	</div>
	<div class="top-bar-right">
		<button id="offcanvas-menu-trigger"><i class="fa fa-bars" aria-hidden="true"></i></button>
	</div>
</div>

<div class="top-bar medium-up-bar" id="main-menu">
	<div class="top-bar-left">
		<a class='blog-name' href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
	</div>
	<div class="top-bar-right">
		<?php joints_top_nav(); ?>
	</div>
</div>