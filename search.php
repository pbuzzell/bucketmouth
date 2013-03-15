<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file        search.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content" class="grid col-620">

<?php if (have_posts()) : ?>

    <h6><?php printf(__('Search results for: %s', 'BassClubWebsites' ), '<span>' . get_search_query() . '</span>'); ?></h6>

		<?php while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'BassClubWebsites'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>

                <div class="post-meta">
                <?php BassClubWebsites_post_meta_data(); ?>

				    <?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'BassClubWebsites'), __('1 Comment &darr;', 'BassClubWebsites'), __('% Comments &darr;', 'BassClubWebsites')); ?>
                        </span>
                    <?php endif; ?>
                </div><!-- end of .post-meta -->

                <div class="post-entry">
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'BassClubWebsites'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->


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

        <h3 class="title-404"><?php _e('Your search for', 'BassClubWebsites' );?> <?php the_search_query(); ?> <?php _e('did not match any entries', 'BassClubWebsites');?></h3>
        <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'BassClubWebsites'); ?></p>
        <h6><?php _e('You can return', 'BassClubWebsites'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php esc_attr_e( 'Home', 'BassClubWebsites' ); ?>"><?php _e( '&larr; Home', 'BassClubWebsites' ); ?></a> <?php _e( 'or search for the page you were looking for', 'BassClubWebsites' ); ?></h6>
        <?php get_search_form(); ?>

<?php endif; ?>

        </div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
