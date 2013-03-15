<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Widget Template
 *
 *
 * @file        sidebar.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.rotate').cycle();
    });
</script>
        <div id="widgets" class="grid-right fit col-300">
            <div class="widget-wrapper">
                <h2>Our Sponsors</h2>
                <div class="sidebar-ads rotate">
                    <img src="/wp-content/themes/bassclubwebsites-master/images/ad_1.png" />

                    <img src="/wp-content/themes/bassclubwebsites-master/images/ad_2.png" />

                    <img src="/wp-content/themes/bassclubwebsites-master/images/ad_3.png" />

                    <img src="/wp-content/themes/bassclubwebsites-master/images/ad_4.png" />
                </div>
            </div>
        <?php BassClubWebsites_widgets(); // above widgets hook ?>

            <?php if (!dynamic_sidebar('main-sidebar')) : ?>
            <div class="widget-wrapper">

                <div class="widget-title"><?php _e('In Archive', 'BassClubWebsites'); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>

            </div><!-- end of .widget-wrapper -->
			<?php endif; //end of main-sidebar ?>

        <?php BassClubWebsites_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->
