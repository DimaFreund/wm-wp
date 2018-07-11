<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wmetier
 */

?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>
        <head>
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <base href="<?php echo get_template_directory_uri(); ?>/">


            <?php wp_head(); ?>
        </head>
        <body <?php body_class(); ?>>

        <!--header.css-->
        <header>
            <div class="wrapper">
                <div class="col1">
                    <a href="<?php echo home_url(); ?>" class="logo-section">
               <span class="img-logo">
              <svg xmlns="http://www.w3.org/2000/svg" width="78" height="78" viewBox="0 0 224 224">
                <style>.st0,.st1{fill:#fff;stroke:#fff;stroke-width:5;stroke-miterlimit:10}.st1{fill:none;stroke-width:16}</style>
                <path class="st0" d="M43.8 42l29.5 80h15.2L112 57l23.8 65h15l29.5-80-13.6-12.5L143.3 96l-23.8-65.5h-15L81 95.7 57 29.5zM78 135h68.3l-26.8 72h-14.7z"/>
                <circle class="st1" cx="112" cy="112" r="104"/>
              </svg>
            </span>
                        <span class="text-logo">Writing Metier</span>
                    </a>
                </div>
                <div class="col2">
                    <div class="row1">
                        <div class="follow-section">
                            <span class="follow-title">Follow us:</span>
                            <ul>
                                <style>.st0{fill:#fff}</style>
                                <li><a target="_blank" href="<?php echo get_option('tw'); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 310 253.8"><style>.st0{fill:#fff}</style><g><path class="st0" d="M303 29.3c-4.9 2.2-9.9 4-15 5.5 6.1-6.9 10.7-14.9 13.5-23.7.6-2 0-4.1-1.6-5.4-1.6-1.3-3.9-1.4-5.7-.4-10.9 6.4-22.6 11.1-34.9 13.8C246.9 6.9 230.1 0 212.7 0c-36.7 0-66.5 29.9-66.5 66.5 0 2.9.2 5.8.5 8.6-45.5-4-87.9-26.4-116.9-62-1-1.3-2.6-2-4.3-1.8-1.6.1-3.1 1-3.9 2.5-5.9 10.1-9 21.7-9 33.5 0 16 5.7 31.2 15.8 43.1-3.1-1.1-6.1-2.4-8.9-4-1.5-.9-3.4-.8-4.9 0-1.5.9-2.5 2.5-2.5 4.2v.9c0 23.9 12.9 45.5 32.6 57.2-1.7-.2-3.4-.4-5.1-.7-1.7-.3-3.5.3-4.7 1.6-1.2 1.3-1.6 3.2-1 4.8 7.3 22.8 26.1 39.5 48.7 44.6-18.8 11.8-40.3 18-62.9 18-4.7 0-9.5-.3-14.1-.8-2.3-.3-4.5 1.1-5.3 3.3-.8 2.2 0 4.6 2 5.9 29 18.6 62.6 28.4 97 28.4 67.8 0 110.1-31.9 133.8-58.8 29.5-33.4 46.4-77.7 46.4-121.4 0-1.8 0-3.7-.1-5.5 11.6-8.8 21.6-19.4 29.8-31.5 1.2-1.8 1.1-4.3-.3-6-1.5-1.7-3.9-2.2-5.9-1.3z"/></g></svg>
                                    </a></li>
                                <li><a target="_blank" href="<?php echo get_option('facebook'); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 156.6 310"><style>.st0{fill:#fff}</style><g><path class="st0" d="M5 165.1h34V305c0 2.8 2.2 5 5 5h57.6c2.8 0 5-2.2 5-5V165.8h39.1c2.5 0 4.7-1.9 5-4.4l5.9-51.5c.2-1.4-.3-2.8-1.2-3.9-.9-1.1-2.3-1.7-3.7-1.7h-45V72c0-9.7 5.2-14.7 15.6-14.7h29.4c2.8 0 5-2.2 5-5V5c0-2.8-2.2-5-5-5h-42.4c-7 0-31.5 1.4-50.8 19.2C37 38.8 40 62.4 40.7 66.5v37.8H5c-2.8 0-5 2.2-5 5v50.8c0 2.8 2.2 5 5 5z"/></g></svg>
                                    </a></li>
                                <li><a target="_blank" href="<?php echo get_option('you'); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 310 218.2"><style>.st0{fill:#fff}</style><g><path class="st0" d="M297.9 18.7C286.7 5.4 266.1 0 226.6 0H83.4C43 0 22 5.8 10.9 19.9 0 33.7 0 54.1 0 82.2v53.7c0 54.6 12.9 82.2 83.4 82.2h143.2c34.2 0 53.2-4.8 65.4-16.5 12.6-12 17.9-31.7 17.9-65.7V82.2c.1-29.6-.7-50.1-12-63.5zM199 116.5l-65 34c-1.5.8-3 1.1-4.6 1.1-1.8 0-3.6-.5-5.2-1.4-3-1.8-4.8-5.1-4.8-8.6V73.9c0-3.5 1.8-6.7 4.8-8.5 3-1.8 6.7-1.9 9.8-.3l65 33.8c3.3 1.7 5.4 5.1 5.4 8.9 0 3.5-2.1 7-5.4 8.7z"/></g></svg>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="mail-section">
                            <?php echo get_option('email'); ?>
                        </div>
                        <div class="login-section">
                            <?php if(!is_user_logged_in()){ ?>
                            <a href="<?php echo get_permalink(get_page_by_path('login')); ?>">SIGN IN</a>
                            <a href="<?php echo get_permalink(get_page_by_path('register')); ?>">SIGN UP</a>
                            <?php } else { ?>
                                <a href="<?php echo get_permalink(get_page_by_path('account-customer')); ?>">My orders</a>
                                <a href="<?php echo get_permalink(get_page_by_path('logout')); ?>">Logout</a>
                            <?php } ?>
                        </div>
                        <?php if(!is_page(23)){ ?>
                        <a href="<?php echo get_permalink(23); ?>" class="pink-btn">order now</a>
                        <?php } ?>
                        <button class="burger">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="row2 main-menu-section">

                        <nav class="main-menu">
                            <?php wp_nav_menu( array('menu' => 'Home top menu' )); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content">