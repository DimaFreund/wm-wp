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

<?php


while ( have_posts() ) : the_post();  ?>
    <div class="wrapper">
    <?php
        echo the_content();
    ?>
    </div>
    <?php
endwhile; // End of the loop.

?>


<?php
get_footer();
?>
<script>
    function delete_cookie(name) {
        document.cookie = name + '=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    };
    delete_cookie('price-value');
    delete_cookie('selectorDeadline');
    delete_cookie('selectorPrice');
    delete_cookie('type-task');
    delete_cookie('writer-choice');
    delete_cookie('academic-level');
    delete_cookie('citation-style');
    delete_cookie('countPage');
    delete_cookie('deadline-time');
    delete_cookie('deadline-time-value');
    delete_cookie('discipline-task');
    delete_cookie('instructions');
</script>