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
$column = array();
$title = array();
$days = json_decode(get_option('all_time_order'));
$academic_level = json_decode(get_option('academic_level'));
foreach($days as $day) {
    $arr = json_decode(get_option($day));
    array_push($column, $arr);

    ?>

<?php } ?>


    <main class="prices-page-content single-article">
        <div class="wrapper">
            <h1>Prices</h1>
            <div class="title-section">
                <div class="text2">Prices</div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();

                    endwhile; // End of the loop.
                    ?>
                    <div class="colored-section-inf">
                        <div class="colored-desc-title">
                            The price is based on these factors
                        </div>
                        <div class="colored-desc-inf">
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/mortarboard.svg') center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Academic Level
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/notebook.svg') center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Number of Pages
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/hourglass.svg') center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Urgency
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/price-tag.svg') center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Price per 275 words/page (in US dollar)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price-table custom-table1">
                        <table>
                            <tr>
                                <td>Urgency/ Level</td>
                            <?php foreach($academic_level as $item) { ?>
                                <td><?php echo $item; ?></td>
                            <?php } ?>
                            </tr>
                            <?php foreach($column as $item) { ?>
                            <tr>
                                <?php foreach($item as $it) { ?>
                                <td><?php echo $it; ?></td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="sidebar">
                    <figure class="custom-img-2">
                        <img src="<?php echo wp_get_attachment_image_url(get_field('image'), 'medium'); ?>" alt="">
                    </figure>
                    <?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>
                </div>
            </div>

            <?php get_template_part( 'template-parts/content', 'small-form' ); ?>


        </div>
        <button class="btn-to-top"></button>
    </main>


<?php
get_footer();

