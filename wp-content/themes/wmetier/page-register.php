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
            <h1>Sign up</h1>
            <div class="content-wrapper">
                <div class="content">



                    <?php dynamic_sidebar('for_registr'); ?>

                </div>
                <div class="sidebar">
                    <div class="title-section">
                        <div class="text1">Already</div>
                        <div class="text2">have an</div>
                        <div class="text3">account?</div>
                    </div>
                    <a href="<?php echo get_permalink(get_page_by_path('login')); ?>" class="btn-transparent">sign in</a>
                </div>
            </div>

        </div>
        <button class="btn-to-top"></button>
    </main>


<?php
get_footer();

