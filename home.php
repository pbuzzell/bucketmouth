<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 Template Name:  Home Page
 *
 *
 * @file        home.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="featured" class="grid col-940">

        <div class="grid col-540">
            <?php if ( function_exists( 'meteor_slideshow' ) ): ?>
                <?php meteor_slideshow(); ?>
            <?php else: ?>

            <?php $options = get_option('BassClubWebsites_theme_options');
			// First let's check if headline was set
			    if ($options['home_headline']) {
                    echo '<h1 class="featured-title">';
				    echo $options['home_headline'];
				    echo '</h1>';
			// If not display dummy headline for preview purposes
			      } else {
			        echo '<h1 class="featured-title">';
				    echo __('Hello, World!','BassClubWebsites');
				    echo '</h1>';
				  }
			?>

            <?php $options = get_option('BassClubWebsites_theme_options');
			// First let's check if headline was set
			    if ($options['home_subheadline']) {
                    echo '<h2 class="featured-subtitle">';
				    echo $options['home_subheadline'];
				    echo '</h2>';
			// If not display dummy headline for preview purposes
			      } else {
			        echo '<h2 class="featured-subtitle">';
				    echo __('Your H2 subheadline here','BassClubWebsites');
				    echo '</h2>';
				  }
			?>

            <?php $options = get_option('BassClubWebsites_theme_options');
			// First let's check if content is in place
			    if (!empty($options['home_content_area'])) {
                    echo '<p>';
					echo do_shortcode($options['home_content_area']);
				    echo '</p>';
			// If not let's show dummy content for demo purposes
			      } else {
			        echo '<p>';
				    echo __('Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.','BassClubWebsites');
				    echo '</p>';
				  }
			?>



            </div><!-- end of .call-to-action -->

        <?php endif ;?>

        </div><!-- end of .col-540 -->

        <h2>Our Sponsors</h2>
        <div id="featured-image" class="grid col-380 fit">

            <div class="grid col-180">
                <img src="/wp-content/themes/bassclubwebsites-master/images/ad_1.png" />
            </div>

            <div class="grid col-180 fit">
                <img src="/wp-content/themes/bassclubwebsites-master/images/ad_2.png" />
            </div>

            <div class="grid col-180">
                <img src="/wp-content/themes/bassclubwebsites-master/images/ad_3.png" />
            </div>

            <div class="grid col-180 fit">
                <img src="/wp-content/themes/bassclubwebsites-master/images/ad_4.png" />
            </div>


        </div><!-- end of #featured-image -->

        </div><!-- end of #featured -->

        <div id="home-content-left" class="grid col-540">
            <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                    <?php $options = get_option('BassClubWebsites_theme_options'); ?>
                    <div class="widget-wrapper">
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="post-title home-title"><?php the_title(); ?></h1>
                            <div class="post-entry">
                                <?php the_excerpt(); ?>
                                <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'BassClubWebsites'), 'after' => '</div>')); ?>
                            </div><!-- end of .post-entry -->
                        </div><!-- end of #post-<?php the_ID(); ?> -->
                    </div>
                    <?php endwhile; ?>



                    <?php else : ?>

                    <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'BassClubWebsites'); ?></h1>
                    <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'BassClubWebsites'); ?></p>
                    <h6><?php _e( 'You can return', 'BassClubWebsites' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'BassClubWebsites' ); ?>"><?php _e( '&larr; Home', 'BassClubWebsites' ); ?></a> <?php _e( 'or search for the page you were looking for', 'BassClubWebsites' ); ?></h6>
                    <?php get_search_form(); ?>

            <?php endif; ?>

            <div class="widget-wrapper">
                <div class="widget-title-home"><h3><?php _e('Latest News'); ?></h3></div>
                <ul>
                <?php
                    $args = array(
                        'numberposts' => 10,
                        'offset' => 0,
                        'category' => 0,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'include' => '',
                        'exclude' => '',
                        'meta_key' => '',
                        'meta_value' => '',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'suppress_filters' => true );
                    $recent_posts = wp_get_recent_posts ( $args );
                ?>
                <?php foreach( $recent_posts as $recent ): ?>
                <?php
                    $date = new DateTime($recent['post_date']);
                    $post_date = $date->format('m-d-Y');
                ?>
                    <li><a href="<?php echo get_permalink ( $recent [ 'ID' ] ); ?>" title="Look <?php echo esc_attr ( $recent [ 'post_title' ] ); ?>" ><span class="post-date"><?php echo $post_date; ?>&nbsp;&nbsp;</span><?php echo $recent [ 'post_title' ]; ?></a> </li>
                <?php endforeach; ?>
                </ul>
            </div>

            <?php BassClubWebsites_widgets(); // above widgets hook ?>

                <?php if (!dynamic_sidebar('home-widget-1')) : ?>
                <div class="widget-wrapper">

                    <div class="widget-title-home"><h3><?php _e('Home Widget 1', 'BassClubWebsites'); ?></h3></div>
                    <div class="textwidget"><?php _e('This is your first home widget box. To edit please go to Appearance > Widgets and choose 6th widget from the top in area six called Home Widget 1. Title is also manageable from widgets as well.','BassClubWebsites'); ?></div>

                </div><!-- end of .widget-wrapper -->
                <?php endif; //end of home-widget-1 ?>

            <?php BassClubWebsites_widgets_end(); // BassClubWebsites after widgets hook ?>
        </div>

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>