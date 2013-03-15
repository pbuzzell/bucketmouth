<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme's Action Hooks
 *
 */
?>
<?php

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function BassClubWebsites_container() {
    do_action('BassClubWebsites_container');
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function BassClubWebsites_container_end() {
    do_action('BassClubWebsites_container_end');
}

/**
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function BassClubWebsites_header() {
    do_action('BassClubWebsites_header');
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function BassClubWebsites_in_header() {
    do_action('BassClubWebsites_in_header');
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function BassClubWebsites_header_end() {
    do_action('BassClubWebsites_header_end');
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function BassClubWebsites_wrapper() {
    do_action('BassClubWebsites_wrapper');
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function BassClubWebsites_in_wrapper() {
    do_action('BassClubWebsites_in_wrapper');
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function BassClubWebsites_wrapper_end() {
    do_action('BassClubWebsites_wrapper_end');
}

/**
 * Just before opening <div id="widgets">
 *
 * @see sidebar.php
 */
function BassClubWebsites_widgets() {
    do_action('BassClubWebsites_widgets');
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function BassClubWebsites_widgets_end() {
    do_action('BassClubWebsites_widgets_end');
}

/**
 * Theme Options
 *
 * @see theme-options.php
 */
function BassClubWebsites_theme_options() {
    do_action('BassClubWebsites_theme_options');
}


?>