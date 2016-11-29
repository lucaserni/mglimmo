<?php get_header(); ?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<header class="section-heading">
				<h1 class="section-title">News</h1>
			</header>
			<div class="section-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<article>
						<header class="article-heading">
							<h2 class="article-title"><?php the_title(); ?> <small class="section-date"><?php the_date(); ?></small></h2>
						</header>
						<div class="article-content">
							<?php 
								if ( has_post_thumbnail() ) {
									echo '<a href="' . get_the_permalink() . '" class="article-thumbnail">';
									the_post_thumbnail('thumbnail');
									echo '</a>';
								} 
							?>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">more...</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php _e('no entries found', 'theme'); ?>
		<?php endif; ?>
	</section>

<?php get_footer(); ?>
