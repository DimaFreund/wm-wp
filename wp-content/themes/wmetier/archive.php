<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wmetier
 */

get_header(); ?>
<?php $term = get_queried_object(); ?>
    <main class="serviceSingle-page-content single-article">
        <div class="wrapper">
            <h1><?= $term->name; ?></h1>

            <div class="content-wrapper">
                <div class="content">
                    <p>
						<?= $term->description; ?>

                    </p>
                    <div class="colored-section-inf">
                        <div class="colored-desc-title">
                            How it works
                        </div>
                        <div class="colored-desc-inf">
                            <div class="desc-inf-item">
                                <div class="inf-item-bgImg"
                                     style="background: url('images/list.svg') left center no-repeat;"></div>
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
                                <div class="inf-item-bgImg"
                                     style="background: url('images/clip.svg') left center no-repeat;"></div>
                                <div class="inf-item-text">
                                    iles/ Send MSG
                                </div>
                            </div>
                        </div>
                    </div>
					<?= get_field( 'description', $term ); ?>
                    <a href="<?= the_permalink( 23 ); ?>" class="pink-btn">Order now</a>
                    <div class="collapse-section services_single_collapse_section">
						<?php $args  = array(
							'posts_per_page'   => 5,
							'offset'           => 0,
							'category'         => $term->term_id,
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
                            <div class="collapse-item n_collapse-item">
                                <div class="title-collapse-item n_title-collapse-item">
                                    <div class="arrow n_arrow"></div>
                                    <h3><?= $item->post_title; ?></h3>
                                </div>
                                <div class="content-collapse-item n_content-collapse-item">
                                    <p>
										<?= $item->post_content; ?>
                                    </p>
                                    <div class="n_collapse_bg_text"><span>sample</span></div>
                                    <div class="n_collapse_doc_container">
                                        <?php $field = get_field('example_work', $item->id); ?>
                                        <iframe src="<?= $field['pdf']; ?>" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
						<?php } ?>
                    </div>

                </div>
                <div class="sidebar">

	                <?php get_template_part( 'template-parts/content', 'sidebar-guarantes' ); ?>

	                <?php get_template_part( 'template-parts/content', 'about-list' ); ?>

                </div>

            </div>
            <div class="bottom_buttons">
                <a href="<?php the_permalink(10); ?>" class="pink-btn">All services</a>
                <a href="<?php the_permalink(23); ?>" class="pink-btn">Order now</a>
            </div>
        </div>
        <button class="btn-to-top"></button>
    </main>

<?php
get_footer();
