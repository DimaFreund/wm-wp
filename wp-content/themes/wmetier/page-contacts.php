<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wmetier
 */

get_header(); ?>




    <main class="contacts-page-content single-article">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <h1>Contact</h1>
                    <div class="title-section">
                        <div class="text1">Writing</div>
                        <div class="text2">Metier</div>
                    </div>
                    <div class="contacts-section">
                        <div class="row">
                            <div class="name">Email:</div>
                            <div class="desc"><?php echo get_option('email'); ?></div>
                        </div>
                        <div class="row">
                            <div class="name">Address:</div>
                            <div class="desc"><?php echo get_option('address'); ?></div>
                        </div>
                        <div class="row">
                            <div class="name">Phone:</div>
                            <div class="desc"><?php echo get_option('phone1'); ?></div>
                        </div>
                        <div class="row">
                            <div class="follow-section">
                                <span class="follow-title">Social Links:</span>
                                <ul>
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
                        </div>
                    </div>
                </div>
                <!--<div class="map-wrapper" id="map-wrapper"></div>-->

                <div class="contact-form-colored-section">
                    <div class="colored-desc-title">
                        Contact us directly
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="182" title="Контактная форма 1"]'); ?>
                </div>
            </div>



        </div>
        <button class="btn-to-top"></button>
    </main>



<?php
get_footer();

