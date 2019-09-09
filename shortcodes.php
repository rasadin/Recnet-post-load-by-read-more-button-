<?php 
/**
 * =========================================================
 * All Shortcodes
 * ---------------------------------------------------------
 * =========================================================
 */

 class Webalive_Elementor_Shortcodes {

    /**
     * Construct Function
     */
    public function __construct() {
        add_shortcode('blog-recent-post-load-sortcode',    array($this, 'blog_recent_post_load'));
    }

    /**
     * Post Thumbnail Grid
     * Shortcode: [post-thumb-grid per_page=""]
     */
    public function blog_recent_post_load( $atts, $content=null ) { ?>
   <div id="ajax-posts" class="row">
        <?php
            $postsPerPage = 3;
            $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $postsPerPage,
                    
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
        ?>

         <div class="small-12 large-4 columns">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
    <div id="more_posts">Load More</div>

<?php
 }
} 

 new Webalive_Elementor_Shortcodes();
