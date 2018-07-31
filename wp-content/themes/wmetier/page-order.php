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
    array_push($title, array_shift($arr));
    array_push($column, $arr);

    ?>

<?php } ?>
<?php $columnJson = json_encode($column); ?>

    <input type="hidden" id="table-auto-price" value="<?php echo esc_attr($columnJson); ?>">
    <main class="order-page-content single-article registration-styles" id="page-order-options">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <h1>Order</h1>
                    <div class="steps-items">
                        <ul>
                            <?php if(!is_user_logged_in()){ ?>
                            <li class="active-item">
                                <a href="<?php echo get_permalink(23); ?>" class="name-step">Order Details</a>
                                <div class="bg-counter-steps">
                                    <div class="num">1</div>
                                    <div class="text">Step</div>
                                </div>
                            </li>
                            <li>
                                <a onclick="document.getElementById('order-blank').submit();" href="<?php echo get_permalink(85); ?>" class="name-step">Preview & Personal</a>
                                <div class="bg-counter-steps">
                                    <div class="num">2</div>
                                    <div class="text">Step</div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <form onsubmit="return submitOrderForm()" id="order-blank" method="POST" action="<?php  echo get_permalink(85); ?>" class="calculator-section">
                        <div class="col radioBtn-group category-type" id="typePaper">
                            <div class="title-row-form">Type of paper needed</div>
                            <ul>
                                <li>
                                    <input type="radio" id="paper_academic" name="type_paper">
                                    <label for="paper_academic">Academic</label>
                                </li>
                                <li>
                                    <input type="radio" id="paper_business" name="type_paper">
                                    <label for="paper_business">Business</label>
                                </li>
                                <li>
                                    <input type="radio" id="paper_content" name="type_paper" class="inactive-item">
                                    <label for="paper_content">Content</label>
                                </li>
                            </ul>
                        </div>
                        <div class="row row1">
                            <div class="type-task can-disables">
                                <!--                            <div class="title-row-form">Type of paper needed</div>-->
                                <?php $categoryId = array(5,6,7); ?>
                                <?php foreach($categoryId as $item) { ?>
                                    <?php $category = get_category($item); ?>
                                <div class="select-section little_select">
                                    <select name="typy_work" id="type-task-variants-<?= $category->slug; ?>">
	                                    <?php $args  = array(
		                                    'posts_per_page'   => -1,
		                                    'offset'           => 0,
		                                    'category'         => $category->term_id,
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
                                        <?php foreach($posts_array as $post) { ?>
                                            <option value="<?= $post->post_title; ?>"><?= $post->post_title; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="select-btn"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!--
							  <div class="counter-box">
								  <label for="fieldCount" class="title-row-form">Pages</label>
								  <div class="counter">
									  <button type="button" class="counterBtn dec down-btn"></button>
									  <input type="text" id="fieldCount" class="field fieldCount" value="1" data-min="1" data-max="9999">
									  <button type="button" class="counterBtn inc up-btn"></button>
								  </div>
								  <div class="sub-desc">
									  <span class="numberWordsCounter">475</span>
									  <span> words</span>
								  </div>
							  </div>
							  -->
                        </div>
                        <div class="title-row-form">Subject</div>
                        <div class="type-task">
                            <div class="select-section large_select">
                                <select name="disciplin" id="type-task-subject">
                                    <?php foreach(get_field('discipline:', 23) as $item) { ?>}
                                        <option value="<?= $item['text']; ?>"><?= $item['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="select-btn"></div>
                            </div>
                        </div>
                        <div class="pages_settings_box">
                            <div class="counter-box">
                                <div class="counter_box_left">
                                    <label for="fieldCount" class="title-row-form">Number of pages</label>
                                    <div class="counter counter-pages">
                                        <button type="button" class="counterBtn dec down-btn"></button>
                                        <input name="pages" type="text" id="fieldCount" class="field fieldCount" value="1" data-min="1" data-max="9999">
                                        <button type="button" class="counterBtn inc up-btn"></button>
                                    </div>
                                </div>
                                <div class="sub-desc">
                                    <span class="numberWordsCounter">275</span>
                                    <span> words</span>
                                </div>
                            </div>
                            <div class="pages_spacing">
                                <div>
                                    <label for="">Spacing</label>
                                    <div class="select-section pages_settings_select">
                                        <select name="spacing" id="select_spacing">
                                            <option value="550">Double Spaced</option>
                                            <option value="275">One Space</option>
                                        </select>
                                        <div class="select-btn"></div>
                                    </div>
                                </div>
                                <div class="spacing-desc">
                                    <span class="spacingWordsCounter">275</span>
                                    <span> words/page</span>
                                </div>
                            </div>
                        </div>
                        <div class="col radioBtn-group change-price" id="level-dificult">
                            <div class="title-row-form">Academic level</div>
                            <ul>
		                        <?php foreach($academic_level as $item) { ?>
                                    <li>
                                        <input <?php if($item == $academic_level[0]) echo 'checked'; ?> type="radio" id="<?php echo $item; ?>" name="academic_level">
                                        <label for="<?php echo $item; ?>"><?php echo $item; ?></label>
                                    </li>
		                        <?php } ?>
                            </ul>

                        </div>
                        <div class="col radioBtn-group change-price" id="style-work">
                            <div class="title-row-form">Citation Style</div>
                            <ul>
			                    <?php foreach(get_field('citation_style', 23) as $item) { ?>
                                    <li>
                                        <input type="radio" id="<?php echo $item['text']; ?>" name="citation-style">
                                        <label for="<?php echo $item['text']; ?>"><?php echo $item['text']; ?></label>
                                    </li>
			                    <?php } ?>

                            </ul>
                        </div>

                        <div class="sources_num">
                            <div class="counter-box">
                                <label for="fieldCountSources" class="title-row-form">Number of sources</label>
                                <div class="counter counter_sources">
                                    <button type="button" class="counterBtn dec down-btn"></button>
                                    <input name="sources" type="text" id="fieldCountSources" class="field fieldCountSources" value="1" data-min="1" data-max="999">
                                    <button type="button" class="counterBtn inc up-btn"></button>
                                </div>
                            </div>
                            <div class="sources_checkbox">
                                <label for="sourseNeed">
                                    <input type="checkbox" name="sources_need" id="sourseNeed">
                                    <i></i>
                                </label>
                                <span>Not needed</span>
                            </div>
                        </div>
                        <div class="col runner-section">
                            <div class="col time-line change-price" id="deadline">
                                <div class="title-row-form">Deadline</div>
                                <div class="runner-line">
                                    <ul>
					                    <?php foreach($title as $item) { ?>
                                            <li>
                                                <input required type="radio" id="<?php echo $item; ?>" name="selectorDeadline">
                                                <label for="<?php echo $item; ?>">
                                                    <span class="point"></span>
                                                    <span class="title"><?php echo $item; ?></span>
                                                </label>
                                            </li>

					                    <?php } ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="col price-line change-price" id="price-work">
                                <div class="title-row-form">Prices in US Dollars $</div>
                                <div class="runner-line">
                                    <ul>
					                    <?php $increment = 1; ?>
					                    <?php foreach(array_reverse($column) as $item) { ?>
                                            <li>
                                                <input disabled type="radio" id="price-<?php echo $increment; ?>" name="selectorPrice">
                                                <label for="price-<?php echo $increment; ?>">
                                                    <span class="point"></span>
                                                    <span class="title"><?php echo $item[0]; ?></span>
                                                </label>
                                            </li>
						                    <?php $increment++; ?>
					                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="middle_price">
                            <span>Price:</span>
                            <strong class="middle_price_value">$<div style="display: inline-block" id="start_price">239.93</div></strong>
                        </div>
                        <!--
						  <div class="custom-registration-title">
							  And a little bit more...
						  </div>
						  -->
                        <!--
						  <div class="col discipline-row">
							<div class="title-row-form">Discipline</div>
							<div class="select-section">
							  <select name="type-task" id="discipline-variants">
								<option value="Coursework1">Coursework 1</option>
								<option value="Coursework2">Coursework 2</option>
								<option value="Coursework3">Coursework 3</option>
							  </select>
							  <div class="select-btn"></div>
							</div>
						  </div>
						  -->
                        <div class="col">
                            <div class="title-row-form">Topic</div>
                            <input type="text" name="writers">
                        </div>
                        <div class="col">
                            <div class="title-row-form">Instructions</div>
                            <textarea name="description" id="instructions" cols="30" rows="10"></textarea>
                        </div>
                        <!--<div class="row-btns">-->
                        <!--<a href="" class="btn-transp-withoutBorder">Back to step one</a>-->
                        <!--<input type="submit" class="pink-btn" value="sign up">-->
                        <!--</div>-->
                        <div class="input_customized">
                            <label for="additional">
                                <input type="checkbox" id="additional" name="additional">
                                <i></i>
                            </label>
                            <span>I want to add Additional materials</span>
                        </div>
                        <div class="discount_fields">
                            <label for="">Discount code</label>
                            <div class="discount_input_block">
                                <input id="promocod" name="promocod" type="text" placeholder="Enter your discount code here...">
                                <button id="check_promo" type="submit">Apply</button>

                            </div>
                        </div>
                        <div class="input_customized">
                            <label for="bonus_page">
                                <input type="checkbox" id="bonus-page" name="bonus_page">
                                <i></i>
                            </label>
                            <span>Add 1-page summary to my paper</span>
                        </div>
                        <div class="input_customized">
                            <label for="check_professional">
                                <input type="checkbox" id="check-professional" name="check_professional">
                                <i></i>
                            </label>
                            <span>I want professional quality check for my order</span>
                        </div>
                        <div class="input_customized">
                            <label for="plagiat_report">
                                <input type="checkbox" id="plagiat-report" name="plagiat_report">
                                <i></i>
                            </label>
                            <span>Plagiarism report</span>
                        </div>
                        <div class="input_customized">
                            <label for="special_writer">
                                <input type="checkbox" id="special-writer" name="special_writer">
                                <i></i>
                            </label>
                            <span>I want UK/US writer</span>
                        </div>
                        <div class="input_customized input_customized_centered">
                            <label for="term-conditions">
                                <input type="checkbox" id="term-conditions" name="term-conditions">
                                <i></i>
                            </label>
                            <span>I agree with <a href="#">Terms & Conditions, Refund</a> and <a href="#">Revision</a></span>
                        </div>
                        <div class="total_price">
                            <span>Total price:</span>
                            <strong class="total_price_value">$<div style="display: inline-block" id="finally-price">239.93</div></strong>
                        </div>
                        <input type="submit" class="pink-btn" value="Go to step two">

                        <input type="hidden" name="finally-price" id="hidden-finally-price">
                        <input type="hidden" name="deadline" id="hidden-for-time">
                        <input type="hidden" name="citation_style" id="hidden-for-style">
                        <input type="hidden" name="discount-promo" id="hidden-for-discount">
                    </form>


                </div>
                <div class="sidebar">
                        <div class="security_step_1">
                            <div class="securuty_step_1_top">
                                <div class="securuty_step_1_top_block">
                                    <img src="images/trustmark-rbg-2-copy.png" alt="icon">
                                </div>
                                <span></span>
                                <div class="securuty_step_1_top_block">
                                    <p>Tested daily</p>
                                    <a href="#">Click to verify</a>
                                </div>
                            </div>
                            <div class="security_step_1_txt">
                                <div class="security_step_1_txt_block">
                                    <div>
                                        <img src="images/padlock.png" alt="ico">
                                        <span>Secured shopping cart</span>
                                    </div>
                                    <p>Every McAfee SECURE certified site is tested and certified to be free of malware, viruses, phishing attacks, and other things that can harm you and your computer.</p>
                                    <p>The McAfee SECURE Insight and see which sites are McAfee SECURE certified as you browse with Chrome.</p>
                                </div>
                                <div class="security_step_1_txt_block">
                                    <div>
                                        <img src="images/computer-security-shield-icon.png" alt="ico">
                                        <span>Privacy and security</span>
                                    </div>
                                    <p>Every McAfee SECURE certified site is tested and certified to be free of malware, viruses, phishing attacks, and other things that can harm you and your computer.</p>
                                </div>
                                <div class="sec_abs_text">
                                    <span>All<br>payments<br>secured</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <button class="btn-to-top"></button>
        </main>




    <?php
    get_footer();

