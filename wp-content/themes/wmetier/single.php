<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wmetier
 */

get_header(); ?>
<?php
global $post;
?>




    <!-- dialog itself, mfp-hide class is required to make dialog hidden -->

<?php $args  = array(
	'posts_per_page'   => 1,
	'offset'           => 0,
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => 'отображать_на_странице_сервисов',
	'meta_value'       => '1',
	'post_type'        => 'promo_cod',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'           => '',
	'author_name'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'fields'           => '',

);
$posts_array = get_posts( $args ); ?>
<pre></pre>

    <div class="header_bonus">
        <p>Special offer for new customers: 5% OFF your first order! Use coupon: <span><?= $posts_array[0]->post_title; ?></span></p>
        <button class="header_bonus_close">
            <span></span>
            <span></span>
        </button>
    </div>


    <main class="serviceSingle-page-content single-article">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
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
                            How it works
                        </div>
                        <div class="colored-desc-inf">
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/list.svg') left center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Fill All Required Fields
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/login.svg') left center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Create an Account/ Login
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/paypal.svg') left center no-repeat;"></div>
                                <div class="inf-item-text">
                                    Go to PayPal and Pay
                                </div>
                            </div>
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg" style="background: url('images/clip.svg') left center no-repeat;"></div>
                                <div class="inf-item-text">
                                    iles/ Send MSG
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php echo $two_content; ?>
                    <div class="paper-details-section">
                        <div class="title-section">
                            <div class="text1">Sample</div>
                        </div>
                        <div class="paper-details-content">
                            <?php $fields = get_field('example_work'); ?>
                            <div class="col">
                                <div class="details-title">Paper details</div>
                                <div class="details-desc">
                                    <div class="row">
                                        <div class="name-details">Academic Level:</div>
                                        <div class="desc-details"><?php echo $fields['academic_level']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Type of paper:</div>
                                        <div class="desc-details"><?php the_title(); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Discipline:</div>
                                        <div class="desc-details"><?php echo $fields['discipline']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Deadline:</div>
                                        <div class="desc-details"><?php echo $fields['deadline']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Price:</div>
                                        <div class="desc-details"><?php echo $fields['price']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <?php if(isset($fields['writers_short'])){ ?>
                                <div class="details-title">Writer's Short</div>
                                <div class="details-desc list-pink-disc">
                                    <ul>
                                        <?php if(isset($fields['writers_short']) && !empty($fields['writers_short'])) { ?>
                                            <?php foreach($fields['writers_short'] as $field) { ?>
                                                  <li><?php echo $field['title']; ?></li>
                                            <?php }  ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="paper-details-btns">
                            <?php if(isset($fields['pdf'])){ ?>
                                <a target="_blank"  href="<?php echo $fields['pdf']; ?>" class="btn-transp-withoutBorder">view sample</a>
                            <?php } ?>
                            <a href="#small-dialog" class="btn-transp-withoutBorder popup-with-zoom-anim">samples collection</a>
                        </div>
                    </div>

                </div>
                <div class="sidebar">
                    <?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>
                    <?php get_template_part( 'template-parts/content', 'about-list' ); ?>
                    <div class="aside_subscribe">
                        <h3>Want to get more?</h3>
                        <hr>
                        <p>Subscribe to recieve discount promos <br>and individual special offers</p>
                        <?= do_shortcode('[mc4wp_form id="229"]'); ?>
                        
                    </div>
                </div>
            </div>

        </div>
        <button class="btn-to-top"></button>
        <div class="super_bottom_order">
            <p>Just place an order with us and make sure we provide qualified help.</p>
            <a href="<?php the_permalink(23); ?>">order now</a>
        </div>
    </main>




<?php
$all_posts = get_posts(array(
    'numberposts' => 0
));

?>


    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
        <h3>Samples collection</h3>
        <div class="wraper-examples-work">
            <?php
                foreach($all_posts as $one_post){
                    $info = get_field('example_work', $one_post->ID);
                    if(isset($info['pdf'])){
                    ?>

                    <div class="item">
                        <h4><?php echo $one_post->post_title; ?></h4>
                        <p class="academic-level">Academic level: <span><?php echo ' '.$info['academic_level']; ?></span></p>
                        <a target="_blank" href="<?php echo $info['pdf']; ?>"><img src="images/pdf.png" alt="pdf" class="icon-pdf"></a>
                        <div class="writer"><span>Topic:</span> <a target="_blank" href="<?php echo $info['pdf']; ?>"><?php echo get_field('topic', $one_post->ID); ?></a></div>
                    </div>
            <?php } } ?>
        </div>
    </div>

<?php
get_footer();
