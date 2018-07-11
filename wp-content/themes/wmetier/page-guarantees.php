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



    <main class="guarantees-page-content single-article">
        <div class="wrapper">
            <h1>We guarantees</h1>
            <div class="title-section">
                <div class="text2">Guarantees</div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();

                    endwhile; // End of the loop.
                    ?>
                    <div class="guarantees-items">

                        <?php foreach(get_field('guarantees', 14) as $item) { ?>

                            <div class="guarantees-item">
                                <h3>
                                    <a href="<?php echo $item['link_in_page']; ?>"><?php echo $item['title']; ?></a>
                                </h3>
                                <p>
                                    <?php echo $item['short_description_page']; ?>
                                </p>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <div class="sidebar">
                    <figure class="custom-img-2">
                        <img src="<?php echo wp_get_attachment_image_url(get_field('image'), 'medium'); ?>" alt="">
                    </figure>
                    <?php get_template_part( 'template-parts/content', 'about-list' ); ?>
                </div>
            </div>

            <div class="prices-section">
                <?php get_template_part( 'template-parts/content', 'small-form' ); ?>
                <div class="title-section">
                    <div class="text1">Our</div>
                    <div class="text2">Prices</div>
                </div>
            </div>


        </div>
        <button class="btn-to-top"></button>
    </main>


<?php
get_footer();

