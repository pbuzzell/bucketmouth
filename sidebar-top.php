<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Top Widget Template
 *
 *
 * @file        sidebar-top.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
    <?php
        if (! is_active_sidebar('top-widget')
	    )
            return;
    ?>
    <div id="top-widget" class="top-widget">
        <?php BassClubWebsites_widgets(); // above widgets hook ?>

            <?php if (is_active_sidebar('top-widget')) : ?>

            <?php dynamic_sidebar('top-widget'); ?>

            <?php endif; //end of top-widget ?>

        <?php BassClubWebsites_widgets_end(); // after widgets hook ?>
    </div><!-- end of #top-widget -->