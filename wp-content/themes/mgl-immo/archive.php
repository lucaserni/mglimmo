<?php
/*
Template Name: Archives
*/
get_header(); ?>
<div class="contentWrap">
	<div class="container">
		<div class="news-archive">
		<h1>News</h1>
			<?php
			$args=array(
			  'post_type' => 'post',
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			  'caller_get_posts'=> 1
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="postArchive-post">
			 		<div class="row">
					  	<div class="col-md-9">
					  		<h3><?php the_date('d.m.Y'); ?> - <?php the_title(); ?></h3>
					  		  <?php
					  		the_content(); ?>
					  	</div>
					  	<div class="col-md-3">
					  		<?php if (has_post_thumbnail()): ?>
					  			<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
					  		<?php endif ?>
					  	</div>
					</div>
			   </div>
			  <?php
			endwhile;
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
