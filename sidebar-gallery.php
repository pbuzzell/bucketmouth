<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Gallery Widget Template
 *
 *
 * @file        sidebar-gallery.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
        <div id="widgets" class="grid col-300 fit gallery-meta">
        <?php BassClubWebsites_widgets(); // above widgets hook ?>
            <div class="widget-wrapper">

                <div class="widget-title"><?php _e('Image Information', 'BassClubWebsites'); ?></div>
                    <ul>

					<?php $BassClubWebsites_data = get_post_meta($post->ID, '_wp_attachment_metadata', true); ?>

                    <span class="full-size"><?php _e('Full Size:','BassClubWebsites'); ?> <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo $BassClubWebsites_data['width'] . '&#215;' . $BassClubWebsites_data['height']; ?></a>px</span>

					<?php if ($BassClubWebsites_data['image_meta']['aperture']) { ?>
                    <span class="aperture"><?php _e('Aperture: f&#47;','BassClubWebsites'); ?><?php echo $BassClubWebsites_data['image_meta']['aperture']; ?></span>
                    <?php } ?>

                    <?php if ($BassClubWebsites_data['image_meta']['focal_length']) { ?>
                    <span class="focal-length"><?php _e('Focal Length:','BassClubWebsites'); ?> <?php echo $BassClubWebsites_data['image_meta']['focal_length']; ?><?php _e('mm','BassClubWebsites'); ?></span>
                    <?php } ?>

                    <?php if ($BassClubWebsites_data['image_meta']['iso']) { ?>
                    <span class="iso"><?php _e('ISO:','BassClubWebsites'); ?> <?php echo $BassClubWebsites_data['image_meta']['iso']; ?></span>
                    <?php } ?>

                    <?php if ($BassClubWebsites_data['image_meta']['shutter_speed']) { ?>
                    <span class="shutter"><?php _e('Shutter:','BassClubWebsites'); ?>
					<?php
                        if ((1 / $BassClubWebsites_data['image_meta']['shutter_speed']) > 1) {
                            echo "1/";
                        if (number_format((1 / $BassClubWebsites_data['image_meta']['shutter_speed']), 1) == number_format((1 / $BassClubWebsites_data['image_meta']['shutter_speed']), 0)) {
                            echo number_format((1 / $BassClubWebsites_data['image_meta']['shutter_speed']), 0, '.', '') . ' sec';
                        } else {
                            echo number_format((1 / $BassClubWebsites_data['image_meta']['shutter_speed']), 1, '.', '') . ' sec';
                        }
                        } else {
                            echo $BassClubWebsites_data['image_meta']['shutter_speed'] . ' sec';
                        }
                    ?>
                    </span>
                    <?php } ?>

                    <?php if ($BassClubWebsites_data['image_meta']['camera']) { ?>
                    <span class="camera"><?php _e('Camera:','BassClubWebsites'); ?> <?php echo $BassClubWebsites_data['image_meta']['camera']; ?></span>
                    <?php } ?>

                    </ul>

            </div><!-- end of .widget-wrapper -->
        </div><!-- end of #widgets -->

            <?php if (!is_active_sidebar('gallery-widget')) return; ?>

            <?php if (is_active_sidebar('gallery-widget')) : ?>

        <div id="widgets" class="grid col-300 fit">

        <?php BassClubWebsites_widgets(); // above widgets hook ?>

                <?php dynamic_sidebar('gallery-widget'); ?>

        <?php BassClubWebsites_widgets_end(); // after widgets hook ?>

        </div><!-- end of #widgets -->

        <?php endif; ?>