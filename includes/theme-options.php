<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Options
 */
?>
<?php
add_action('admin_init', 'BassClubWebsites_theme_options_init');
add_action('admin_menu', 'BassClubWebsites_theme_options_add_page');



/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function BassClubWebsites_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('BassClubWebsites-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '1.0');
	wp_enqueue_script('BassClubWebsites-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array('jquery'), '1.0');
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
}
add_action('admin_print_styles-appearance_page_theme_options', 'BassClubWebsites_admin_enqueue_scripts');

/**
 * Init plugin options to white list our options
 */
function BassClubWebsites_theme_options_init() {
    register_setting('BassClubWebsites_options', 'BassClubWebsites_theme_options', 'BassClubWebsites_theme_options_validate');
}

/**
 * Load up the menu page
 */
function BassClubWebsites_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'BassClubWebsites'), __('Theme Options', 'BassClubWebsites'), 'edit_theme_options', 'theme_options', 'BassClubWebsites_theme_options_do_page');
}



/**
 * Site Verification and Webmaster Tools
 * If user sets the code we're going to display meta verification
 * And if left blank let's not display anything at all in case there is a plugin that does this
 */

function BassClubWebsites_google_verification() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['google_site_verification'])) {
		echo '<meta name="google-site-verification" content="' . $options['google_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'BassClubWebsites_google_verification');

function BassClubWebsites_bing_verification() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['bing_site_verification'])) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'BassClubWebsites_bing_verification');

function BassClubWebsites_yahoo_verification() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['yahoo_site_verification'])) {
        echo '<meta name="y_key" content="' . $options['yahoo_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'BassClubWebsites_yahoo_verification');

function BassClubWebsites_site_statistics_tracker() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['site_statistics_tracker'])) {
        echo $options['site_statistics_tracker'];
	}
}

add_action('wp_head', 'BassClubWebsites_site_statistics_tracker');

function BassClubWebsites_inline_css() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['BassClubWebsites_inline_css'])) {
		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		echo $options['BassClubWebsites_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action('wp_head', 'BassClubWebsites_inline_css');

function BassClubWebsites_inline_js_head() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['BassClubWebsites_inline_js_head'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $options['BassClubWebsites_inline_js_head'];
		echo "\n";
	}
}

add_action('wp_head', 'BassClubWebsites_inline_js_head');

function BassClubWebsites_inline_js_footer() {
    $options = get_option('BassClubWebsites_theme_options');
    if (!empty($options['BassClubWebsites_inline_js_footer'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $options['BassClubWebsites_inline_js_footer'];
		echo "\n";
	}
}

add_action('wp_footer', 'BassClubWebsites_inline_js_footer');

/**
 * Create the options page
 */
function BassClubWebsites_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <style>
    #sortable { list-style-type: none; margin: 0; padding: 0; }
    #sortable li {/* margin: 0 5px 5px 5px;*/ padding: 5px; /*font-size: 1.2em;*/ height: 1.5em; cursor:move; }
    html>body #sortable li { height: 1.5em; line-height: 1.2em; }
    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
    </style>
    <div class="wrap">
        <?php
        /**
         * < 3.4 Backward Compatibility
         */
        ?>
        <?php $theme_name = function_exists('wp_get_theme') ? wp_get_theme() : get_current_theme(); ?>
        <?php //screen_icon();
        echo "<h2>BassClubWebsites ". __('Theme Options', 'BassClubWebsites') . "</h2>";
        $current_user = wp_get_current_user();
        $user = $current_user->ID;
        ?>

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'BassClubWebsites'); ?></strong></p></div>
		<?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields('BassClubWebsites_options'); ?>
            <?php $options = get_option('BassClubWebsites_theme_options'); ?>
	    <div id="rwd" class="grid col-940">
            <h3 class="rwd-toggle"><a href="#"><?php _e('Site Defaults', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                    <?php
                    /**
                    * Default Contact Information
                    */
                    ?>
                    <div class="grid col-220"><?php _e('Address', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[address]" class="regular-text" type="text" name="BassClubWebsites_theme_options[address]" value="<?php if (!empty($options['address'])) echo esc_attr($options['address']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('Address 2', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[address2]" class="regular-text" type="text" name="BassClubWebsites_theme_options[address2]" value="<?php if (!empty($options['address2'])) echo esc_attr($options['address2']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('City', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[city]" class="regular-text" type="text" name="BassClubWebsites_theme_options[city]" value="<?php if (!empty($options['city'])) echo esc_attr($options['city']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('State', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[state]" class="regular-text" type="text" name="BassClubWebsites_theme_options[state]" value="<?php if (!empty($options['state'])) echo esc_attr($options['state']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('Zip Code', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[zip]" class="regular-text" type="text" name="BassClubWebsites_theme_options[zip]" value="<?php if (!empty($options['zip'])) echo esc_attr($options['zip']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('Phone #', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[phone]" class="regular-text" type="text" name="BassClubWebsites_theme_options[phone]" value="<?php if (!empty($options['phone'])) echo esc_attr($options['phone']); ?>" />

                    </div><!-- end of .grid col-620 -->

                    <div class="grid col-220"><?php _e('Fax #', 'BassClubWebsites'); ?></div><!-- end of .grid col-220 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[fax]" class="regular-text" type="text" name="BassClubWebsites_theme_options[fax]" value="<?php if (!empty($options['fax'])) echo esc_attr($options['fax']); ?>" />

                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->
                </div>
            </div>

            <h3 class="rwd-toggle"><a href="#"><?php _e('Theme Elements', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">


                <?php
                /**
                 * Breadcrumb Lists
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Breadcrumb Lists?', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="BassClubWebsites_theme_options[breadcrumb]" name="BassClubWebsites_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($options['breadcrumb']) ? checked( '1', $options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="BassClubWebsites_theme_options[breadcrumb]"><?php _e('Check to disable', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * CTA Button
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Call to Action Button?', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="BassClubWebsites_theme_options[cta_button]" name="BassClubWebsites_theme_options[cta_button]" type="checkbox" value="1" <?php isset($options['cta_button']) ? checked( '1', $options['cta_button'] ) : checked('0', '1'); ?> />
						<label class="description" for="BassClubWebsites_theme_options[cta_button]"><?php _e('Check to disable', 'BassClubWebsites'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Logo Upload', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Logo Upload
                 */
                ?>
                <div class="grid col-300"><?php _e('Custom Header', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">

                        <p><?php printf(__('Need to replace or remove default logo?','BassClubWebsites')); ?> <?php printf(__('<a href="%s">Click here</a>.', 'BassClubWebsites'), admin_url('themes.php?page=custom-header')); ?></p>

                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
            <h3 class="rwd-toggle"><a href="#"><?php _e('Home Page', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Homepage Headline
                 */
                ?>

                <div class="grid col-300"><?php _e('Headline', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[home_headline]" class="regular-text" type="text" name="BassClubWebsites_theme_options[home_headline]" value="<?php if (!empty($options['home_headline'])) echo esc_attr($options['home_headline']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[home_headline]"><?php _e('Enter your headline', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->


                <?php
                /**
                 * Homepage Subheadline
                 */
                ?>

                <div class="grid col-300"><?php _e('Subheadline', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[home_subheadline]" class="regular-text" type="text" name="BassClubWebsites_theme_options[home_subheadline]" value="<?php if (!empty($options['home_subheadline'])) echo esc_attr($options['home_subheadline']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[home_subheadline]"><?php _e('Enter your subheadline', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Content Area
                 */
                ?>

                <div class="grid col-300"><?php _e('Content Area', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="BassClubWebsites_theme_options[home_content_area]" class="large-text" cols="50" rows="10" name="BassClubWebsites_theme_options[home_content_area]"><?php if (!empty($options['home_content_area'])) echo esc_html($options['home_content_area']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[home_content_area]"><?php _e('Enter your content', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Call to Action URL
                 */
                ?>

                <div class="grid col-300"><?php _e('Call to Action (URL)', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[cta_url]" class="regular-text" type="text" name="BassClubWebsites_theme_options[cta_url]" value="<?php if (!empty($options['cta_url'])) echo esc_url($options['cta_url']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[cta_url]"><?php _e('Enter your call to action URL', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Call to Action Text
                 */
                ?>

                <div class="grid col-300"><?php _e('Call to Action (Text)', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[cta_text]" class="regular-text" type="text" name="BassClubWebsites_theme_options[cta_text]" value="<?php if (!empty($options['cta_text'])) echo esc_attr($options['cta_text']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[cta_text]"><?php _e('Enter your call to action text', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Featured Content
                 */
                ?>
                <div class="grid col-300">
                    <?php _e('Featured Content', 'BassClubWebsites'); ?>

                </div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="BassClubWebsites_theme_options[featured_content]" class="large-text" cols="50" rows="10" name="BassClubWebsites_theme_options[featured_content]"><?php if (!empty($options['featured_content'])) echo esc_html($options['featured_content']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[featured_content]"><?php _e('Paste your html, shortcode, video or image source', 'BassClubWebsites'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->


            <h3 class="rwd-toggle"><a href="#"><?php _e('Webmaster Tools', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">

                <?php
                /**
                 * Google Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Google Site Verification', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[google_site_verification]" class="regular-text" type="text" name="BassClubWebsites_theme_options[google_site_verification]" value="<?php if (!empty($options['google_site_verification'])) echo esc_attr($options['google_site_verification']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Bing Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Bing Site Verification', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[bing_site_verification]" class="regular-text" type="text" name="BassClubWebsites_theme_options[bing_site_verification]" value="<?php if (!empty($options['bing_site_verification'])) echo esc_attr($options['bing_site_verification']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Yahoo Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Yahoo Site Verification', 'BassClubWebsites'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="BassClubWebsites_theme_options[yahoo_site_verification]" class="regular-text" type="text" name="BassClubWebsites_theme_options[yahoo_site_verification]" value="<?php if (!empty($options['yahoo_site_verification'])) echo esc_attr($options['yahoo_site_verification']); ?>" />
                        <label class="description" for="BassClubWebsites_theme_options[yahoo_site_verification]"><?php _e('Enter your Yahoo ID number only', 'BassClubWebsites'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Site Statistics Tracker
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Site Statistics Tracker', 'BassClubWebsites'); ?>
                    <span class="info-box information help-links"><?php _e('Leave blank if plugin handles your webmaster tools', 'BassClubWebsites'); ?></span>
                </div><!-- end of .grid col-300 -->

                    <div class="grid col-620 fit">
                        <textarea id="BassClubWebsites_theme_options[site_statistics_tracker]" class="large-text" cols="50" rows="10" name="BassClubWebsites_theme_options[site_statistics_tracker]"><?php if (!empty($options['site_statistics_tracker'])) echo esc_textarea($options['site_statistics_tracker']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[site_statistics_tracker]"><?php _e('Site Stats Script Area - Google Analytics, StatCounter, any other or all of them.  This will be added to the head section.', 'BassClubWebsites'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Social Icons', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                    <p>Drag and drop to change the order that each icon will display on the front end.</p>
                    <p style="text-align:right;">Active?</p>
                 <ul id="sortable">
                <?php
                /**
                 * Social Media
                 */
                $socialArray = array(
                    'facebook_uid'      => $options['social']['facebook_uid'],
                    'twitter_uid'       => $options['social']['twitter_uid'],
                    'linkedin_uid'      => $options['social']['linkedin_uid'],
                    'youtube_uid'       => $options['social']['youtube_uid'],
                    'stumble_uid'       => $options['social']['stumble_uid'],
                    'rss_uid'           => $options['social']['rss_uid'],
                    'google_plus_uid'   => $options['social']['google_plus_uid'],
                    'instagram_uid'     => $options['social']['instagram_uid'],
                    'pinterest_uid'     => $options['social']['pinterest_uid'],
                    'yelp_uid'          => $options['social']['yelp_uid'],
                    'vimeo_uid'         => $options['social']['vimeo_uid'],
                    'foursquare_uid'    => $options['social']['foursquare_uid']
                    );
                if ($options['social'])
                {
                    $newSocialArray = array_merge($options['social'], $socialArray);
                }
                else
                {
                    $newSocialArray = $socialArray;
                }
                if (is_array($newSocialArray))
                {
                    $icon = '';
                    $active = '';
                    $title = '';
                    $image = '';
                    foreach ($newSocialArray as $key => $data)
                    {
                        $keys[] = $key;
                        $parts = explode('_',$key);
                        $name = $parts[0];
                        $title = ucfirst($name);
                        $image = get_stylesheet_directory_uri().'/icons/'.$name.'-icon.png';
                        if ($data['icon'])
                        {
                            $icon = $data['icon'];
                        }
                        else
                        {
                            $icon = $image;
                        }
                        if ($data['active'] == 1)
                        {
                            $checked = 'checked="checked"';
                            $activeTitle = "Deactivate?";
                        }
                        else
                        {
                            $checked = '';
                            $activeTitle = 'Activate?';
                        }
                        echo <<<HTML
                        <li class="ui-state-default" id="ordinal_1">
                        <div class="grid col-60 fit" style="position:relative;">
                            <div id="{$name}_image_holder" style="display:none;"></div>
                            <img src="$icon" width="15" height="15" alt="$name" title="Update this icon" id="{$name}_icon_holder" class="icon_holder" />
                            <input type="text" name="BassClubWebsites_theme_options[social][$key][icon]" value="{$data['icon']}" id="{$name}_icon" rel="$name" class="icon_upload" style="position:absolute; z-index:10; left:20px; display:none;" />
                            <input id="{$name}" class="upload_button" type="button" value="Upload" style="position:absolute; z-index:10; top:-4px; left:155px; display:none;" />
                        </div>
                        <div class="grid col-300">$title</div><!-- end of .grid col-300 -->
                            <div class="grid col-540 fit">
                                <input id="BassClubWebsites_theme_options[social][$key][url]" class="regular-text" type="text" name="BassClubWebsites_theme_options[social][$key][url]" value="{$data['url']}" />
                                <label class="description" for="BassClubWebsites_theme_options[social][$key][url]">Enter your $title url</label>

                            </div>
                        <div class="squaredOne">
                            <input type="checkbox" value="1" $checked style="display:none;" id="BassClubWebsites_theme_options[social][$key][active]" name="BassClubWebsites_theme_options[social][$key][active]" />
                            <label for="BassClubWebsites_theme_options[social][$key][active]"></label>
                        </div>
                        </li>

HTML;
                    }
                }
                else
                {
                }
                ?>
                    </ul>
                <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <?php if ($current_user->ID == 1): ?>
            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom CSS Styles', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom CSS Styles', 'BassClubWebsites'); ?>
                </div><!-- end of .grid col-300 -->

                    <div class="grid col-620 fit">
                        <textarea id="BassClubWebsites_theme_options[BassClubWebsites_inline_css]" class="inline-css large-text" cols="50" rows="30" name="BassClubWebsites_theme_options[BassClubWebsites_inline_css]"><?php if (!empty($options['BassClubWebsites_inline_css'])) echo esc_textarea($options['BassClubWebsites_inline_css']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[BassClubWebsites_inline_css]">
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
                    <?php _e('Custom Button Styles', 'BassClubWebsites'); ?>
                </div><!-- end of .grid col-300 -->

                    <div class="grid col-620 fit">
                        <div class="color-picker" style="position: relative;">
                            <input type="text" name="BassClubWebsites_theme_options[button][0][color]" id="color" value="<?php if (!empty($options['button'][0]['color'])) {echo $options['button'][0]['color'];} else { echo '#fff'; } ?>"/>
                            <div style="position: absolute; top:-80px; left: 170px;" id="colorpicker"></div>
                        </div>
                        <label class="description" for="BassClubWebsites_theme_options[button][0][color]"><?php _e('Button text color.', 'BassClubWebsites'); ?></label>

                        <div class="color-picker" style="position: relative;">
                            <input type="text" name="BassClubWebsites_theme_options[button][0][gradient_top]" id="color1" value="<?php if (!empty($options['button'][0]['gradient_top'])) {echo $options['button'][0]['gradient_top'];} else { echo '#fff'; } ?>" />
                            <div style="position: absolute; top:-80px; left: 170px;" id="colorpicker1"></div>
                        </div>
                        <label class="description" for="BassClubWebsites_theme_options[button][1][gradient-top]"><?php _e('Button Gradient - Top color.', 'BassClubWebsites'); ?></label>

                        <div class="color-picker" style="position: relative;">
                            <input type="text" name="BassClubWebsites_theme_options[button][0][gradient_bottom]" id="color2" value="<?php if (!empty($options['button'][0]['gradient_bottom'])) {echo $options['button'][0]['gradient_bottom'];} else { echo '#fff'; } ?>" />
                            <div style="position: absolute; top:-80px; left: 170px;" id="colorpicker2"></div>
                        </div>
                        <label class="description" for="BassClubWebsites_theme_options[button][1][gradient-bottom]"><?php _e('Button Gradient - Bottom color.', 'BassClubWebsites'); ?></label>

                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom Scripts', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom Scripts for Header and Footer', 'BassClubWebsites'); ?>

                </div><!-- end of .grid col-300 -->

                    <div class="grid col-620 fit">
                        <p><?php printf(__('Embeds to header.php &darr;','BassClubWebsites')); ?></p>
                        <textarea id="BassClubWebsites_theme_options[BassClubWebsites_inline_js_head]" class="inline-css large-text" cols="50" rows="30" name="BassClubWebsites_theme_options[BassClubWebsites_inline_js_head]"><?php if (!empty($options['BassClubWebsites_inline_js_head'])) echo esc_textarea($options['BassClubWebsites_inline_js_head']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[BassClubWebsites_inline_js_head]"><?php _e('Enter your custom header script.', 'BassClubWebsites'); ?></label>

                        <p><?php printf(__('Embeds to footer.php &darr;','BassClubWebsites')); ?></p>
                        <textarea id="BassClubWebsites_theme_options[BassClubWebsites_inline_js_footer]" class="inline-css large-text" cols="50" rows="30" name="BassClubWebsites_theme_options[BassClubWebsites_inline_js_footer]"><?php if (!empty($options['BassClubWebsites_inline_js_footer'])) echo esc_textarea($options['BassClubWebsites_inline_js_footer']); ?></textarea>
                        <label class="description" for="BassClubWebsites_theme_options[BassClubWebsites_inline_js_footer]"><?php _e('Enter your custom footer script.', 'BassClubWebsites'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'BassClubWebsites'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

             <h3 class="rwd-toggle"><a href="#"><?php _e('Developer', 'BassClubWebsites'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                    <?php echo '<pre>'; print_r($options); echo '</pre>'; ?>
                    <?php
                        echo "<h3>Theme Functions</h3>";
                        echo '<pre>[bw_insert page="XXX"] where XXX = page id will insert the content from one page onto another.</pre>';
                        echo '<pre>[bw_button text="Call To Action" color="blue" url="http://www.BassClubWebsites.com"] will insert a call to action button on any page.</pre>';
                    ?>

                </div>
            </div>
            <?php endif; ?>
            </div><!-- end of .grid col-940 -->
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function BassClubWebsites_theme_options_validate($input) {

	// checkbox value is either 0 or 1
	foreach (array(
		'breadcrumb',
		'cta_button'
		) as $checkbox) {
		if (!isset($input[$checkbox]))
			$input[$checkbox] = null;
		    $input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
	}

	$input['home_headline']		 = wp_kses_stripslashes($input['home_headline']);
	$input['home_subheadline']	 = wp_kses_stripslashes($input['home_subheadline']);
	$input['home_content_area']	 = wp_kses_stripslashes($input['home_content_area']);
	$input['cta_text']		 = wp_kses_stripslashes($input['cta_text']);
	$input['cta_url']		 = esc_url_raw($input['cta_url']);
	$input['featured_content']	 = wp_kses_stripslashes($input['featured_content']);
	$input['google_site_verification'] = wp_filter_post_kses($input['google_site_verification']);
	$input['bing_site_verification'] = wp_filter_post_kses($input['bing_site_verification']);
	$input['yahoo_site_verification'] = wp_filter_post_kses($input['yahoo_site_verification']);
	$input['site_statistics_tracker'] = wp_kses_stripslashes($input['site_statistics_tracker']);
	$input['twitter_uid']		 = esc_url_raw($input['twitter_uid']);
	$input['facebook_uid']		 = esc_url_raw($input['facebook_uid']);
	$input['linkedin_uid']		 = esc_url_raw($input['linkedin_uid']);
	$input['youtube_uid']		 = esc_url_raw($input['youtube_uid']);
	$input['stumble_uid']		 = esc_url_raw($input['stumble_uid']);
	$input['rss_uid']		 = esc_url_raw($input['rss_uid']);
	$input['google_plus_uid']	 = esc_url_raw($input['google_plus_uid']);
	$input['instagram_uid']		 = esc_url_raw($input['instagram_uid']);
	$input['pinterest_uid']		 = esc_url_raw($input['pinterest_uid']);
	$input['yelp_uid']		 = esc_url_raw($input['yelp_uid']);
	$input['vimeo_uid']		 = esc_url_raw($input['vimeo_uid']);
	$input['foursquare_uid']	 = esc_url_raw($input['foursquare_uid']);
	$input['BassClubWebsites_inline_css'] = wp_kses_stripslashes($input['BassClubWebsites_inline_css']);
	$input['BassClubWebsites_inline_js_head'] = wp_kses_stripslashes($input['BassClubWebsites_inline_js_head']);
	$input['BassClubWebsites_inline_css_js_footer'] = wp_kses_stripslashes($input['BassClubWebsites_inline_css_js_footer']);

    return $input;
}
