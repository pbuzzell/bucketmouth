<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Widget Template
 *
 *
 * @file        sidebar-left.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
        <div id="widgets" class="grid-right col-300 rtl-fit">
        <?php BassClubWebsites_widgets(); // above widgets hook ?>

            <?php if (!dynamic_sidebar('left-sidebar')) : ?>
            <div class="widget-wrapper">

                <div class="widget-title"><?php _e('In Archive', 'BassClubWebsites'); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>

            </div><!-- end of .widget-wrapper -->
            <?php endif; //end of right-left ?>

        <?php BassClubWebsites_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->