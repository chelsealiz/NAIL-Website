<div class="top-bar small-bar grid-x" id="main-menu-mobile">
	<div class="small-cell">
		<a class='blog-name' href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
	</div>
	<div class="small-cell left-side">
		<button class="active" id="offcanvas-menu-trigger"><i class="fa fa-bars" aria-hidden="true"></i></button>
		<button id="offcanvas-menu-close"><i class="fa fa-times" aria-hidden="true"></i></button>
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