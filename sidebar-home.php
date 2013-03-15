<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Widgets Template
 *
 *
 * @file        sidebar-home.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
    <div id="widgets" class="home-widgets">
        <div class="grid col-380 fit">
        <?php BassClubWebsites_widgets(); // BassClubWebsites above widgets hook ?>

			<?php if (!dynamic_sidebar('home-widget-2')) : ?>
            <div class="widget-wrapper">

                <div class="widget-title-home"><h3><?php _e('Home Widget 2', 'BassClubWebsites'); ?></h3></div>
                <div class="textwidget"><?php _e('This is your second home widget box. To edit please go to Appearance > Widgets and choose 7th widget from the top in area seven called Home Widget 2. Title is also manageable from widgets as well.','BassClubWebsites'); ?></div>

			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-2 ?>

        <?php BassClubWebsites_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 -->


    </div><!-- end of #widgets -->