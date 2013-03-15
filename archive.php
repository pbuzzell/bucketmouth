<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @Author: BassClubWebsites
 * @Since: BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content-archive" class="grid col-620">

<?php if (have_posts()) : ?>

        <?php $options = get_option('BassClubWebsites_theme_options'); ?>
		<?php if ($options['breadcrumb'] == 0): ?>
		<?php echo BassClubWebsites_breadcrumb_lists(); ?>
        <?php endif; ?>

		    <h6>
			    <?php if ( is_day() ) : ?>
				    <?php printf( __( 'Daily Archives: %s', 'BassClubWebsites' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'BassClubWebsites' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'BassClubWebsites' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'BassClubWebsites' ); ?>
				<?php endif; ?>
			</h6>

        <?php while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__( 'Permanent Link to %s', 'BassClubWebsites' ), the_title_attribute( 'echo=0' )); ?>"><?php the_title(); ?></a></h1>

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
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'BassClubWebsites'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

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

        </div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
