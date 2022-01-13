<?php
/**
 * Template Name: Stories Collection
 */

get_header(); ?>
			
			<span class="entry-title">
				<span><h1>Centennial Stories</h1>
			<h3 class="subhead">Meet some of the participants to this historic community campaign</h3></span>
</span>
<!-- THE LØØP -->
<div class="related-articles alignwide">
	<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'order'			=> 'ASC',
			'orderby'		=> 'title', 
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
                <?php the_excerpt( '<p class="entry-excerpt">', '</p>' ); ?>
            </div>
        </div>
			<?php endwhile; ?>			
		<?php endif;  ?>
		<?php wp_reset_query();?>		
</div>
	
	<!-- <?php echo do_shortcode('[ajax_load_more id="Personal" container_type="div" css_classes="grid-x grid-padding-x grid-margin-x pl-2 pr-2" post_type="video" posts_per_page="3" category="personal" pause="true" scroll="false" transition_container="false" images_loaded="true" offset="3" button_label="Load More Videos"]') ?>-->

<!-- END LØØP -->

	
<?php get_footer(); ?>