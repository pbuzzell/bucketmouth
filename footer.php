<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file        footer.php
 * @Author:     BassClubWebsites
 * @Since:      BassClubWebsites v1.0.0
 */
?>
    </div><!-- end of #wrapper -->
    <?php BassClubWebsites_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php BassClubWebsites_container_end(); // after container hook ?>

<div id="footer" class="clearfix">

    <div id="footer-wrapper">



        <div class="grid col-540">
		<?php if (has_nav_menu('footer-menu', 'BassClubWebsites')): ?>
	        <?php wp_nav_menu(array(
				    'container'       => '',
					'fallback_cb'	  =>  false,
					'menu_class'      => 'footer-menu',
					'theme_location'  => 'footer-menu')
					);
				?>
         <?php elseif (!dynamic_sidebar('footer-left')) : ?>
         <?php  ?>
         <div class="widget-wrapper">

             <div class="widget-title-home"><h3><?php _e('Footer Left Widget', 'BassClubWebsites'); ?></h3></div>
             <div class="textwidget"><?php _e('This is your left footer widget. To edit please go to Appearance > Widgets and choose Footer Left widget. Title is also manageable from widgets as well.','BassClubWebsites'); ?></div>

         </div><!-- end of .widget-wrapper -->
         <?php endif; //end of home-widget-1 ?>
         </div><!-- end of col-540 -->

         <div class="grid col-380 fit">
         <?php $options = get_option('BassClubWebsites_theme_options');

            // First let's check if any of this was set

                echo '<ul class="social-icons">';
                foreach ($options['social'] as $key => $data)
                {

                    $keys[] = $key;
                    $parts = explode('_',$key);
                    $name = $parts[0];
                    $title = ucfirst($name);
                    $url = $data['url'];

                    $image = $data['icon'];
                    if ( $image == '' )
                    {
                    	$image = get_stylesheet_directory_uri().'/icons/'.$name.'-icon.png';
                    }
                    $active = $data['active'];
                    if ($active == 1)
                    {
                        echo <<<HTML
                        <li class="$name-icon"><a href="$url" title="Follow us on $title"><img src="$image" alt="$title" /></a></li>
HTML;
                    }
                }
                echo '</ul><!-- end of .social-icons -->';
         ?>

         </div><!-- end of col-380 fit -->

         <div class="grid col-300 clear">
         	&nbsp;
         </div>

         <div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'BassClubWebsites' ); ?>"><?php _e( '&uarr;', 'BassClubWebsites' ); ?></a></div>

         <div class="grid col-300 fit powered">
             Website By: <a href="http://www.bassclubwebsites.com" title="Free Websites for Bass Clubs">
                 Bass Club Websites
             </a>
         </div><!-- end of .copyright -->







    </div><!-- end #footer-wrapper -->

</div><!-- end #footer -->

<?php wp_footer(); ?>
</body>
</html>