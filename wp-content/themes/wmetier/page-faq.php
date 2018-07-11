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




    <main class="faq-page-content single-article">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="title-section">
                <div class="text2">FAQ</div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <div class="collapse-section">

                        <?php
                        $count = 1;
                        foreach(get_field('item') as $items) { ?>
                        <div class="collapse-item">
                            <div class="title-collapse-item">
                                <div class="arrow"></div>
                                <h3><?php echo $count; $count++; ?>. <?php echo $items['parent_title']; ?></h3>
                            </div>
                            <div class="content-collapse-item">
                                <?php if(isset($items['parent_text'])) { echo '<p>'. $items['parent_text'] . '</p>'; } ?>
                                <?php if(isset($items['inner_']) && !empty($items['inner_'])){
                                    foreach ($items['inner_'] as $item){ ?>
                                        <div class="collapse-item">
                                            <div class="title-collapse-item">
                                                <div class="arrow"></div>
                                                <div class="h3"><?php echo $item['title']; ?></div>
                                            </div>
                                            <div class="content-collapse-item">
                                                <p>
                                                    <?php echo $item['text']; ?>
                                                </p>
                                            </div>
                                        </div>

                                <?php    }
                                }
                                ?>

                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="sidebar">
                    <?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>

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


        </div>
        <button class="btn-to-top"></button>
    </main>



<?php
get_footer();

