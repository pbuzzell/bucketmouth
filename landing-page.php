<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Landing Page Template
 *
   Template Name:  Landing Page (no menu)
 *
 * @file        landing-page.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content-full" class="grid col-940">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1>

                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'BassClubWebsites')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'BassClubWebsites'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

                <?php if ( comments_open() ) : ?>
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'BassClubWebsites') . ' ', ', ', '<br />'); ?>
                    <?php the_category(__('Posted in %s', 'BassClubWebsites') . ', '); ?>
                </div><!-- end of .post-data -->
                <?php endif; ?>

            <div class="post-edit"><?php edit_post_link(__('Edit', 'BassClubWebsites')); ?></div>
            </div><!-- end of #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>

        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'BassClubWebsites' ) ); ?></div>
            <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'BassClubWebsites' ) ); ?></div>
		</div><!-- end of .navigation -->
        <?php endif; ?>

	    <?php else : ?>

        <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'BassClubWebsites'); ?></h1>
        <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'BassClubWebsites'); ?></p>
        <h6><?php _e( 'You can return', 'BassClubWebsites' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'BassClubWebsites' ); ?>"><?php _e( '&larr; Home', 'BassClubWebsites' ); ?></a> <?php _e( 'or search for the page you were looking for', 'BassClubWebsites' ); ?></h6>
        <?php get_search_form(); ?>

<?php endif; ?>

        </div><!-- end of #content-full -->

<?php get_footer(); ?>
