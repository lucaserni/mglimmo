

<?php get_header(); ?>

<section>
	<header class="section-heading">
		<h1 class="section-title"><?php _e( "404 - Page not found" ) ?></h1>
	</header>

	<div class="section-content">
		<p>
			<?php printf( __( "It looks like nothing was found at this location. Maybe you will find what you're looking for if you return to %s ", 'theme' ), '<a href="'.esc_url( home_url( '/' ) ) .'">'. sprintf( __('Home', 'theme') . '</a>' )); ?>
		</p>
	</div><!-- .page-content -->
</section>

<?php get_footer(); ?>