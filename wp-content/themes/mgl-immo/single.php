<?php get_header(); ?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="section-heading">
					<h1 class="section-title"><?php the_title(); ?> <small class="section-date"><?php the_date(); ?></small></h1>
				</header>
				<div class="section-content">
					<?php the_content() ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php _e('no entries found', 'theme'); ?>
		<?php endif; ?>
	</section>
<?php get_footer(); ?>
