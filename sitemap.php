<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sitemap Template
 *
   Template Name: Sitemap
 *
 * @file        sitemap.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content-sitemap" class="grid col-940">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

        <?php $options = get_option('BassClubWebsites_theme_options'); ?>
		<?php if ($options['breadcrumb'] == 0): ?>
		<?php echo BassClubWebsites_breadcrumb_lists(); ?>
        <?php endif; ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1>

                <div class="post-entry">
                <div id="widgets">

                    <div class="grid col-300">
                        <div class="widget-title"><?php _e('Categories', 'BassClubWebsites'); ?></div>
                            <ul><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&title_li='); ?></ul>
                    </div><!-- end of .col-300 -->

                    <div class="grid col-300">
                        <div class="widget-title"><?php _e('Latest Posts', 'BassClubWebsites'); ?></div>
                            <ul><?php $archive_query = new WP_Query('posts_per_page=-1');
                                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'BassClubWebsites'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                            </ul>
                    </div><!-- end of .col-300 -->

                    <div class="grid col-300 fit">
                          <div class="widget-title"><?php _e('Pages', 'BassClubWebsites'); ?></div>
                            <ul><?php wp_list_pages("title_li=" ); ?></ul>
                    </div><!-- end of .col-300 fit -->

                </div><!-- end of #widgets -->
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

        <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'BassClubWebsites'); ?></h1>
        <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'BassClubWebsites'); ?></p>
        <h6><?php _e( 'You can return', 'BassClubWebsites' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'BassClubWebsites' ); ?>"><?php _e( '&larr; Home', 'BassClubWebsites' ); ?></a> <?php _e( 'or search for the page you were looking for', 'BassClubWebsites' ); ?></h6>
        <?php get_search_form(); ?>

<?php endif; ?>

        </div><!-- end of #content-sitemap -->

<?php get_footer(); ?>
