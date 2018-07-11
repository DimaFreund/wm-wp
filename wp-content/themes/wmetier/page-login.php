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







    <main class="registration-page-content single-article registration-styles">
        <div class="wrapper">
            <h1>Log in</h1>
            <div class="content-wrapper">
                <div class="content">



                    <?php dynamic_sidebar('for_login'); ?>

                </div>

            </div>

        </div>
        <button class="btn-to-top"></button>
    </main>


<?php
get_footer();

