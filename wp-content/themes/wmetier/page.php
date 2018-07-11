<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wmetier
 */

get_header(); ?>



    <main class="guaranteeSingle-page-content single-article">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="title-section">
                <div class="text2">Guarantee</div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <div class="accent-information">
                        <?php echo get_field('important_text'); ?>
                    </div>
                    <hr>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="sidebar">
                    <figure class="custom-img-2">
                        <img src="<?php echo wp_get_attachment_image_url(get_field('image'), 'medium'); ?>" alt="">
                    </figure>
                    <?php get_template_part( 'template-parts/content', 'about-list' ); ?>
                </div>
            </div>

            <div class="colored-section-inf">
                <div class="colored-desc-title">
                    Easy steps to get your paper done
                </div>
                <div class="colored-desc-inf">
                    <div class="desc-inf-item">
                        <div class="inf-item-bgImg" style="background: url('images/number_1.svg') left center no-repeat;"></div>
                        <div class="inf-item-text">
                            Submit the assignment
                        </div>
                    </div>
                    <div class="desc-inf-item">
                        <div class="inf-item-bgImg" style="background: url('images/number_2.svg') left center no-repeat;"></div>
                        <div class="inf-item-text">
                            Proceed with the payment
                        </div>
                    </div>
                    <div class="desc-inf-item">
                        <div class="inf-item-bgImg" style="background: url('images/number_3.svg') left center no-repeat;"></div>
                        <div class="inf-item-text">
                            Get notified  of the order initialiazation
                        </div>
                    </div>
                    <div class="desc-inf-item">
                        <div class="inf-item-bgImg" style="background: url('images/number_4.svg') left center no-repeat;"></div>
                        <div class="inf-item-text">
                            Receive  your order
                        </div>
                    </div>
                </div>
                <a href="<?php echo get_permalink(23); ?>" class="pink-btn">order now</a>
            </div>

            <a href="<?php echo get_permalink(14); ?>" class="pink-btn back-btn">All guarantees</a>


        </div>
        <button class="btn-to-top"></button>
    </main>



<?php
get_footer();
