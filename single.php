<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file        single.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content" class="grid-right fit col-620">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

        <?php $options = get_option('BassClubWebsites_theme_options'); ?>
		<?php if ($options['breadcrumb'] == 0): ?>
		<?php echo BassClubWebsites_breadcrumb_lists(); ?>
        <?php endif; ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1>

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
                    <?php the_content(__('Read more &#8250;', 'BassClubWebsites')); ?>

                    <?php if ( get_the_author_meta('description') != '' ) : ?>

                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','BassClubWebsites'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->

                    <?php endif; // no description, no author's meta ?>

                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'BassClubWebsites'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

                <div class="navigation">
			        <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
                    <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
		        </div><!-- end of .navigation -->

                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'BassClubWebsites') . ' ', ', ', '<br />'); ?>
					<?php printf(__('Posted in %s', 'BassClubWebsites'), get_the_category_list(', ')); ?>
                </div><!-- end of .post-data -->

            <div class="post-edit"><?php edit_post_link(__('Edit', 'BassClubWebsites')); ?></div>
            </div><!-- end of #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

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

        </div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
