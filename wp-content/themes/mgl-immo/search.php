<?php get_header(); ?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<header class="section-heading">
				<h1 class="section-title"><?php printf( __( 'Search Results for: %s', 'theme' ), get_search_query() ); ?></h1>
			</header>
			<div class="section-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<article>
						<header class="article-heading">
							<h1><?php the_title(); ?></h1>
						</header>
						<div class="article-content">
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php _e('no entries found', 'theme'); ?>
		<?php endif; ?>
	</section>
	<section>
		<?php get_search_form(); ?>
	</section>
<?php get_footer(); ?>
