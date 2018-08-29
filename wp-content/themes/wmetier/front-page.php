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

    <main class="home-page-content">
        <div class="wrapper">
            <div id="about-section" class="about-section">
                <div class="title-section">
                    <div class="text1">We</div>
                    <div class="text2">WriTe</div>
                    <div class="text3">for</div>
                    <div class="text4">YoU</div>
                </div>
                <div class="about-description">
                    <div class="about-text">
                        <h1>
                           <?php echo get_field('title'); ?>
                        </h1>
                        <p class="text-desc">
                            <?php echo get_field('text1'); ?>
                        </p>
                    </div>
                    <div data-depth="0.2" class="img-wrapper">
                        <img src="<?php echo get_field('image'); ?>" alt="">
                    </div>
                </div>
                <?php get_template_part( 'template-parts/content', 'about' ); ?>

            </div>
            <div class="offer-section">
                <div class="title-section">
                    <div class="text1">We</div>
                    <div class="text2">offer</div>
                </div>
                <p class="offer-desc">
                    <?php echo get_field('text2'); ?>
                </p>
                <div class="offer-list">
                    <?php
                    $posts = get_posts(array(
                        'numberposts' => 6,
                        'category'    => 4,
                    ));

                    foreach ($posts as $post) { ?>
                        <div class="offer-item">
                            <a href="<?php echo $post->guid; ?> " class="to-offer-link"><?php echo $post->post_title; ?></a>
                        </div>
                    <?php }
                    wp_reset_postdata();
                    ?>



                </div>
                <a href="<?php echo get_permalink(10); ?>" class="btn-transparent">read more</a>
            </div>
            <div class="home-desc-section">
                <div class="img-wrapper movingToBottom">
                    <img src="images/home-img-1.jpg" alt="">
                </div>
                <div class="colored-section-inf movingToTop">
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
            </div>
            <div class="guarantees-section">
                <div class="title-section">
                    <div class="text2">Guarantees</div>
                </div>
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
                <a href="<?php echo get_permalink(14); ?>" class="btn-transp-withoutBorder">read more</a>
            </div>
            <div class="prices-section">
                <?php get_template_part( 'template-parts/content', 'small-form' ); ?>
                <div class="title-section">
                    <div class="text1">Our</div>
                    <div class="text2">Prices</div>
                </div>
            </div>
            <div class="faq-section">
                <div class="title-section">
                    <div class="text2">FAQ</div>
                </div>
                <div class="collapse-section">
                    <?php $flag = true; ?>
                    <?php foreach(get_field('faq') as $item) { ?>
                        <div class="collapse-item <?php if($flag) echo 'active-item'; $flag=false;?>">
                            <div class="title-collapse-item">
                                <div class="arrow"></div>
                                <h3><?php echo $item['title']; ?></h3>
                            </div>
                            <div class="content-collapse-item">
                                <p>
                                    <?php echo $item['text']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <button class="btn-to-top"></button>

    </main>
    </div>

<?php
get_footer();
