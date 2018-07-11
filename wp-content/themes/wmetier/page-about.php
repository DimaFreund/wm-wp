<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wmetier
 */

get_header(); ?>

<?php global $post; ?>


    <main class="about-page-content single-article">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="title-section">
                <div class="text2">About</div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <?php
                    while ( have_posts() ) : the_post();
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]>', $content);
                        $pos = strpos($content, '</p>');
                        $first_content = substr($content, 0 , $pos);
                        $two_content = substr($content, $pos);
                        echo $first_content;

                    endwhile; // End of the loop.
                    ?>
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
                    </div>
                    <?php echo $two_content; ?>
                </div>
                <div class="sidebar">
                    <figure class="custom-img-2">
                        <img src="<?php echo wp_get_attachment_image_url(get_field('image'), 'medium'); ?>" alt="">
                    </figure>
                    <?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>
                </div>
            </div>


            <div class="benefits-section">
                <figure class="movingToBottom">
                    <img src="<?php echo wp_get_attachment_image_url(get_field('image_two'), 'large'); ?>" alt="">
                </figure>
                <div class="title-section">
                    <div class="text1">Our</div>
                    <div class="text2">Benefits</div>
                </div>
                <div class="benefits-items">
                    <?php foreach(get_field('benefits') as $item) { ?>
                    <div class="benefits-item">
                        <h3><?php echo $item['title']; ?></h3>
                        <p>
                            <?php echo $item['text']; ?>
                        </p>
                    </div>
                    <?php } ?>
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
