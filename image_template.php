<?php
/*
Template Name: Pic Gallery Page
*/
?>
<?php 
// quering all the post from wordpress
$args = array('post_type' => 'post');
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php
	$post_id =get_the_ID();
    if ( get_post_gallery() ) :
    		$gallery = get_post_gallery( $post_id, false );
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] as $src ) : ?><img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" />
                 <?php
            endforeach;
        endif;
    endwhile;
?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>