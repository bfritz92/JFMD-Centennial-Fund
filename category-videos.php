<?php
/**
 * Template Name: Stories Collection
 */

get_header(); ?>
			
			<h1 class="entry-title alignwide">Centennial Stories</h1>
<article class="video-page alignwide singular">
	
	<?php
		$args = array( 
			'order'			=> 'ASC',
			'orderby'		=> 'rand',									
			'posts_per_page'=> 1,
		);		
		$main_posts = new WP_Query( $args );
		$count = 0;
		if( $main_posts->have_posts() ):
			while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
				
				<article class="video-page--featured">
					
					<!-- <a href="<?php the_permalink(); ?>" ><h2 class=""></h2></a> -->
					<div class="">
						
					
					<h2><a href="<?php the_permalink(); ?>" class="" style="margin-bottom:0;"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						
					</div>
                </article>

				<div class="">
                <iframe src="https://player.vimeo.com/video/<?php the_field ('vimeo_embed'); ?>?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
				</div>	

			<?php endwhile; ?>			
		<?php endif;  ?>
	<?php wp_reset_query();?>	
				</article>

<!-- THE LØØP -->
<div class="related-articles alignwide">
	<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'order'			=> 'DESC',
			'orderby'		=> 'date', 
			'posts_per_page'=> 21,
       		'paged' => $paged
		);		
		$main_posts = new WP_Query( $args );
		$count = 0;
		if( $main_posts->have_posts() ):
			while( $main_posts->have_posts() ) : $main_posts->the_post(); ?>
				<div class="related-articles--item">
            
            <a href="<?php the_permalink()?>" class="related-articles--item--img"><?php the_post_thumbnail(); ?></a>
            <div class="related-articles--item--content">
                <a href="<?php the_permalink()?>"><h3 class="related-articles--item--title"><?php the_title(); ?></h3></a>
                <!-- <?php the_excerpt( '<p class="entry-excerpt">', '</p>' ); ?> -->
                <a href="<?php the_permalink()?>" class="related-articles--item--link">Read More</a>
            </div>
        </div>
			<?php endwhile; ?>			
		<?php endif;  ?>
		<?php wp_reset_query();?>		
</div>
	
	<!-- <?php echo do_shortcode('[ajax_load_more id="Personal" container_type="div" css_classes="grid-x grid-padding-x grid-margin-x pl-2 pr-2" post_type="video" posts_per_page="3" category="personal" pause="true" scroll="false" transition_container="false" images_loaded="true" offset="3" button_label="Load More Videos"]') ?>-->

<!-- END LØØP -->

	
<?php get_footer(); ?>