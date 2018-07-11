<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wmetier
 */

get_header(); ?>



    <main class="services-page-content single-article">
    <div class="wrapper">
    <h1><?php the_title(); ?></h1>
    <div class="title-section">
        <div class="text2">We offer</div>
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
                    <div class="inf-item-bgImg"
                         style="background: url('images/login.svg') left center no-repeat;"></div>
                    <div class="inf-item-text">
                        Create an Account/ Login
                    </div>
                </div>
                <div class="desc-inf-item">
                    <div class="inf-item-bgImg"
                         style="background: url('images/paypal.svg') left center no-repeat;"></div>
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
        <div class="collapse-section">
			<?php $categoryId = array( 5, 6, 7 ); ?>
			<?php foreach ( $categoryId as $item ) { ?>
                <div class="collapse-item">
                    <div class="title-collapse-item">
                        <div class="arrow"></div>
                        <h3><?= get_category( $item )->name; ?></h3>
                    </div>
                    <div class="content-collapse-item">
                        <p>
							<?= get_category( $item )->description; ?>
                        </p>

                        <a href="<?= get_category_link( $item ); ?>" class="pink-btn">read more</a>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
    <div style="margin-bottom: 30px" class="sidebar">
    <!--
	  <figure class="custom-img-2">
		 <img src="images/photo-about.jpg" alt="">
	  </figure>
	  -->
    <div class="services_aside">

<?php foreach ( $categoryId as $category ) { ?>
    <div class="services_aside_header">
        <h4><?= get_category( $category )->name; ?></h4>
    </div>
	<?php $args  = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => get_category($category)->term_id,
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'           => '',
		'author_name'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true,
		'fields'           => '',
	);
	$posts_array = get_posts( $args ); ?>
	    <?php foreach ( $posts_array as $item ) { ?>
            <div class="services_aside_link">
                <a href="<?php the_permalink($item->ID); ?>"><?= $item->post_title; ?></a>
                <?php if(get_field('top', $item->ID)) { ?>
                    <span class="services_aside_link_red">Top</span>
                <?php } ?>
                <?php if(get_field('pop', $item->ID)) { ?>
                    <span class="services_aside_link_green">Popular</span>
                <?php } ?>
            </div>

        <?php } ?>
	<?php } ?>

    </div>
	<?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>
    <br>
    <br>
    <br>
	<?php get_template_part( 'template-parts/content', 'about-list' ); ?>
    </div>

    </div>

        <a class="order_now_btn_bottom pink-btn">
            Order now
        </a>


    </div>
    <button class="btn-to-top"></button>
    </main>

    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
        <h3>Samples collection</h3>
        <div class="wraper-examples-work">
			<?php
			foreach ( $all_posts as $one_post ) {
				$info = get_field( 'example_work', $one_post->ID );
				if ( isset( $info['pdf'] ) ) {
					?>

                    <div class="item">
                        <h4><?php echo $one_post->post_title; ?></h4>
                        <p class="academic-level">Academic level:
                            <span><?php echo ' ' . $info['academic_level']; ?></span></p>
                        <a target="_blank" href="<?php echo $info['pdf']; ?>"><img src="images/pdf.png" alt="pdf"
                                                                                   class="icon-pdf"></a>
                        <div class="writer"><span>Topic:</span> <a target="_blank"
                                                                   href="<?php echo $info['pdf']; ?>"><?php echo get_field( 'topic', $one_post->ID ); ?></a>
                        </div>
                    </div>
				<?php }
			} ?>
        </div>
    </div>


	<?php
	get_footer();
