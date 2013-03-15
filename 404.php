<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Error 404 Template
 *
 *
 * @file        404.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<?php get_header(); ?>

        <div id="content-full" class="grid col-940">
            <div id="post-0" class="error404">
                <div class="post-entry">
                    <h1 class="title-404"><?php _e('Whoops, something happened...', 'BassClubWebsites'); ?></h1>
                    <h4><?php _e('The page you requested was not found, and we have a fine guess why.', 'BassClubWebsites'); ?></h4>
                    <ul>
                        <li>If you typed the URL directly, please make sure the spelling is correct.</li>
                        <li>If you clicked on a link to get here, the link is outdated.</li>
                    </ul>
                    <h4>What can you do?</h4>
                    <p>Have no fear, help is near! There are many ways you can get back on track.</p>
                    <ul>
                        <li>Go back to the previous page.</li>
                        <li>Follow these links to get you back on track!</li>
                            <?php
                                $args = array(
                                    'after'             =>      '',
                                    'before'            =>      '',
                                    'container'         =>      false,
                                    'container_class'   =>      '',
                                    'container_id'      =>      '',
                                    'depth'             =>      0,
                                    'echo'              =>      true,
                                    'fallback_cb'       =>      'wp_page_menu',
                                    'items_wrap'        =>      '<ul>' . "\n" . '%3$s' . "\n" . '</ul>' . "\n",
                                    'link_after'        =>      '',
                                    'link_before'       =>      '',
                                    'menu'              =>      '',
                                    'menu_class'        =>      '',
                                    'menu_id'           =>      '',
                                    'theme_location'    =>      'header-menu',
                                    'walker'            =>      new BassClubWebsites_walker_nav_menu
                                );
                                wp_nav_menu( $args );
                            ?>
                    </ul>
                    <?php get_search_form(); ?>
                </div><!-- end of .post-entry -->
            </div><!-- end of #post-0 -->
        </div><!-- end of #content-full -->

<?php get_footer(); ?>
