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
<!--    <pre>-->
<!--        --><?php //var_dump($column); ?>
<!--    </pre>-->

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
                                <a href="<?php echo get_permalink(85); ?>" class="name-step">Preview & Personal</a>
                                <div class="bg-counter-steps">
                                    <div class="num">2</div>
                                    <div class="text">Step</div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <form action="" class="calculator-section">
                        <div class="col radioBtn-group">
                            <div class="title-row-form">Type of paper needed</div>
                            <ul>
                                <li>
                                    <input type="radio" id="paper_academic" name="type-paper">
                                    <label for="paper_academic">Academic</label>
                                </li>
                                <li>
                                    <input type="radio" id="paper_business" name="type-paper">
                                    <label for="paper_business">Business</label>
                                </li>
                                <li>
                                    <input type="radio" id="paper_content" name="type-paper" class="inactive-item">
                                    <label for="paper_content">Content</label>
                                </li>
                            </ul>
                        </div>
                        <div class="row row1">
                            <div class="type-task">
                                <!--                            <div class="title-row-form">Type of paper needed</div>-->
                                <div class="select-section little_select">
                                    <select name="type-task-academic" id="type-task-variants-academic">
                                        <option value="IB_Essay">IB Essay</option>
                                        <option value="Essay_writing">Essay writing</option>
                                        <option value="ToK_essay">ToK essay</option>
                                        <option value="Urgent_essay_writing">Urgent essay writing</option>
                                    </select>
                                    <div class="select-btn"></div>
                                </div>
                                <div class="select-section little_select">
                                    <select name="type-task-business" id="type-task-variants-business">
                                        <option value="Letter_writing_service">Letter writing service</option>
                                        <option value="Presentation_writing">Presentation writing</option>
                                        <option value="Speech">Speech</option>
                                    </select>
                                    <div class="select-btn"></div>
                                </div>
                                <div class="select-section little_select">
                                    <select name="type-task-content" id="type-task-variants-content">
                                        <option value="Content_writing_for_ICO_websites">Content writing for ICO websites</option>
                                        <option value="Guest_blog_writing_service">Guest blog writing service</option>
                                    </select>
                                    <div class="select-btn"></div>
                                </div>
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
                                <select name="type-task-academic" id="type-task-subject">
                                    <option value="Other">Other</option>
                                    <option value="Economics">Economics</option>
                                    <option value="History">History</option>
                                    <option value="Culture">Culture</option>
                                </select>
                                <div class="select-btn"></div>
                            </div>
                        </div>
                        <div class="pages_settings_box">
                            <div class="counter-box">
                                <div class="counter_box_left">
                                    <label for="fieldCount" class="title-row-form">Number of pages</label>
                                    <div class="counter">
                                        <button type="button" class="counterBtn dec down-btn"></button>
                                        <input type="text" id="fieldCount" class="field fieldCount" value="1" data-min="1" data-max="9999">
                                        <button type="button" class="counterBtn inc up-btn"></button>
                                    </div>
                                </div>
                                <div class="sub-desc">
                                    <span class="numberWordsCounter">475</span>
                                    <span> pages</span>
                                </div>
                            </div>
                            <div class="pages_spacing">
                                <div>
                                    <label for="">Spacing</label>
                                    <div class="select-section pages_settings_select">
                                        <select name="type-task-content" id="select_spacing">
                                            <option value="Double_Spaced">Double Spaced</option>
                                            <option value="One_Space">One Space</option>
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
                        <div class="col radioBtn-group">
                            <div class="title-row-form">Academic level</div>
                            <ul>
                                <li>
                                    <input type="radio" id="high-school" name="academic-level">
                                    <label for="high-school">High School</label>
                                </li>
                                <li>
                                    <input type="radio" id="undegrad-1-2" name="academic-level">
                                    <label for="undegrad-1-2">Undergrad. (yrs 1-2)</label>
                                </li>
                                <li>
                                    <input type="radio" id="undegrad-3-4" name="academic-level">
                                    <label for="undegrad-3-4">Undergrad. (yrs 3-4)</label>
                                </li>
                                <li>
                                    <input type="radio" id="master" name="academic-level">
                                    <label for="master">Master's / IB</label>
                                </li>
                                <li>
                                    <input class="inactive-item" type="radio" id="doctoral" name="academic-level">
                                    <label for="doctoral">Doctoral</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col radioBtn-group">
                            <div class="title-row-form">Citation Style</div>
                            <ul>
                                <li>
                                    <input type="radio" id="apa" name="citation-style">
                                    <label for="apa">APA</label>
                                </li>
                                <li>
                                    <input type="radio" id="mla" name="citation-style">
                                    <label for="mla">MLA</label>
                                </li>
                                <li>
                                    <input type="radio" id="oxford" name="citation-style">
                                    <label for="oxford">Oxford</label>
                                </li>
                                <li>
                                    <input type="radio" id="harvard" name="citation-style">
                                    <label for="harvard">Harvard</label>
                                </li>
                                <li>
                                    <input class="inactive-item" type="radio" id="turabian-chicago" name="citation-style">
                                    <label for="turabian-chicago">Turabian / Chicago</label>
                                </li>
                                <li>
                                    <input class="inactive-item" type="radio" id="not-applicable" name="citation-style">
                                    <label for="not-applicable">Not Applicable</label>
                                </li>
                            </ul>
                        </div>
                        <div class="sources_num">
                            <div class="counter-box">
                                <label for="fieldCountSources" class="title-row-form">Number of sources</label>
                                <div class="counter counter_sources">
                                    <button type="button" class="counterBtn dec down-btn"></button>
                                    <input type="text" id="fieldCountSources" class="field fieldCountSources" value="1" data-min="1" data-max="999">
                                    <button type="button" class="counterBtn inc up-btn"></button>
                                </div>
                            </div>
                            <div class="sources_checkbox">
                                <label for="sourseNeed">
                                    <input type="checkbox" name="src_no_need" id="sourseNeed">
                                    <i></i>
                                </label>
                                <span>Not needed</span>
                            </div>
                        </div>
                        <div class="col runner-section">
                            <div class="col time-line">
                                <div class="title-row-form">Deadline</div>
                                <div class="runner-line">
                                    <ul>
                                        <li>
                                            <input type="radio" id="5H" name="selector">
                                            <label for="5H">
                                                <span class="point"></span>
                                                <span class="title">5H</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="8H" name="selector">
                                            <label class="title" for="8H">
                                                <span class="point"></span>
                                                <span class="title">8H</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="16H" name="selector">
                                            <label class="title" for="16H">
                                                <span class="point"></span>
                                                <span class="title">16H</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="24H" name="selector">
                                            <label class="title" for="24H">
                                                <span class="point"></span>
                                                <span class="title">24H</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="2D" name="selector">
                                            <label class="title" for="2D">
                                                <span class="point"></span>
                                                <span class="title">2D</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="5D" name="selector">
                                            <label class="title" for="5D">
                                                <span class="point"></span>
                                                <span class="title">5D</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="14D" name="selector">
                                            <label class="title" for="14D">
                                                <span class="point"></span>
                                                <span class="title">14D</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col price-line">
                                <div class="title-row-form">Prices in US Dollars $</div>
                                <div class="runner-line">
                                    <ul>
                                        <li>
                                            <input type="radio" id="price1" name="selector">
                                            <label for="price1">
                                                <span class="point"></span>
                                                <span class="title">60,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price2" name="selector">
                                            <label class="title" for="price2">
                                                <span class="point"></span>
                                                <span class="title">55,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price3" name="selector">
                                            <label class="title" for="price3">
                                                <span class="point"></span>
                                                <span class="title">50,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price4" name="selector">
                                            <label class="title" for="price4">
                                                <span class="point"></span>
                                                <span class="title">45,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price5" name="selector">
                                            <label class="title" for="price5">
                                                <span class="point"></span>
                                                <span class="title">38,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price6" name="selector">
                                            <label class="title" for="price6">
                                                <span class="point"></span>
                                                <span class="title">29,99</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="price7" name="selector">
                                            <label class="title" for="price7">
                                                <span class="point"></span>
                                                <span class="title">18,99</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="middle_price">
                            <span>Price:</span>
                            <strong class="middle_price_value">$239.93</strong>
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
                            <input type="text">
                        </div>
                        <div class="col">
                            <div class="title-row-form">Instructions</div>
                            <textarea name="instructions" id="instructions" cols="30" rows="10"></textarea>
                        </div>
                        <!--<div class="row-btns">-->
                        <!--<a href="" class="btn-transp-withoutBorder">Back to step one</a>-->
                        <!--<input type="submit" class="pink-btn" value="sign up">-->
                        <!--</div>-->
                        <div class="input_customized">
                            <label for="input_additional_1">
                                <input type="checkbox" id="input_additional_1" name="input-additional-1">
                                <i></i>
                            </label>
                            <span>I want to add Additional materials</span>
                        </div>
                        <div class="discount_fields">
                            <label for="">Discount code</label>
                            <div class="discount_input_block">
                                <input type="text" placeholder="Enter your discount code here...">
                                <button type="submit">Apply</button>
                            </div>
                        </div>
                        <div class="input_customized">
                            <label for="input_additional_2">
                                <input type="checkbox" id="input_additional_2" name="input-additional-2">
                                <i></i>
                            </label>
                            <span>Add 1-page summary to my paper</span>
                        </div>
                        <div class="input_customized">
                            <label for="input_additional_3">
                                <input type="checkbox" id="input_additional_3" name="input-additional-3">
                                <i></i>
                            </label>
                            <span>I want professional quality check for my order</span>
                        </div>
                        <div class="input_customized">
                            <label for="input_additional_4">
                                <input type="checkbox" id="input_additional_4" name="input-additional-4">
                                <i></i>
                            </label>
                            <span>Plagiarism report</span>
                        </div>
                        <div class="input_customized">
                            <label for="input_additional_5">
                                <input type="checkbox" id="input_additional_5" name="input-additional-5">
                                <i></i>
                            </label>
                            <span>I want UK/US writer</span>
                        </div>
                        <div class="input_customized input_customized_centered">
                            <label for="input_additional_6">
                                <input type="checkbox" id="input_additional_6" name="input-additional-6">
                                <i></i>
                            </label>
                            <span>I agree with <a href="#">Terms & Conditions, Refund</a> and <a href="#">Revision</a></span>
                        </div>
                        <div class="total_price">
                            <span>Total price:</span>
                            <strong class="total_price_value">$239.93</strong>
                        </div>
                        <input type="submit" class="pink-btn" value="Go to step two">
                    </form>

                    <form method="POST" action="<?php if(!is_user_logged_in()) { echo get_permalink(85); } else { echo home_url(); } ?>" class="calculator-section">
                        <?php if(is_user_logged_in()) { ?>
                            <input type="hidden" name="amount-new-order">
                        <?php } ?>
                        <div class="row row1">
                            <div class="type-task">
                                <div class="title-row-form">Type of paper needed</div>
                                <ul>
                                    <li>
                                        <input type="radio" id="paper_academic" name="type-paper">
                                        <label for="paper_academic">Academic</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="paper_business" name="type-paper">
                                        <label for="paper_business">Business</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="paper_content" name="type-paper" class="inactive-item">
                                        <label for="paper_content">Content</label>
                                    </li>
                                </ul>
                                <div class="select-section">
                                    <select name="type-task" id="type-task-variants">
                                        <?php foreach(get_field('type_of_paper_needed') as $item) { ?>
                                            <option value="<?php echo $item['test']; ?>"><?php echo $item['test']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="select-btn"></div>
                                </div>
                            </div>
                            <div class="counter-box">
                                <label for="fieldCount" class="title-row-form">Pages</label>
                                <div class="counter">
                                    <button type="button" class="counterBtn dec down-btn"></button>
                                    <input name="countPage" type="text" id="fieldCount" class="field fieldCount" value="1" data-min="1" data-max="9999">
                                    <button type="button" class="counterBtn inc up-btn"></button>
                                </div>
                                <div class="sub-desc">
                                    <span class="numberWordsCounter">475</span>
                                    <span> words</span>
                                </div>
                            </div>
                        </div>
                        <div class="col radioBtn-group change-price" id="level-dificult">
                            <div class="title-row-form">Academic level</div>
                            <ul>
                                <?php foreach($academic_level as $item) { ?>
                                <li>
                                    <input <?php if($item == $academic_level[0]) echo 'checked'; ?> type="radio" id="<?php echo $item; ?>" name="academic-level">
                                    <label for="<?php echo $item; ?>"><?php echo $item; ?></label>
                                </li>
                                <?php } ?>
                            </ul>
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
                                            <input type="radio" id="price-<?php echo $increment; ?>" name="selectorPrice">
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
                        <div class="custom-registration-title">
                            And a little bit more...
                        </div>
                        <div class="col discipline-row">
                            <div class="title-row-form">Discipline</div>
                            <div class="select-section">
                                <select name="discipline-task" id="discipline-variants">
                                    <?php foreach(get_field('discipline:') as $item) { ?>
                                        <option value="<?php echo $item['text']; ?>"><?php echo $item['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="select-btn"></div>
                            </div>
                        </div>
                        <div class="col radioBtn-group change-price" id="style-work">
                            <div class="title-row-form">Citation Style</div>
                            <ul>
                                <?php foreach(get_field('citation_style') as $item) { ?>
                                <li>
                                    <input type="radio" id="<?php echo $item['text']; ?>" name="citation-style">
                                    <label for="<?php echo $item['text']; ?>"><?php echo $item['text']; ?></label>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>

                        <div class="col">
                            <div class="title-row-form">Topic</div>
                            <input type="text" name="writer-choice">
                        </div>

                        <div class="col">
                            <div class="title-row-form">Instructions</div>
                            <textarea name="instructions" id="instructions" cols="30" rows="10"></textarea>
                        </div>
                        <?php if(!is_user_logged_in()){ ?>
                            <input type="submit" class="pink-btn" value="Go to step two">
                        <?php } else { ?>
                            <input type="submit" class="pink-btn" value="Order">
                        <?php } ?>
                        <!--<div class="row-btns">-->
                        <!--<a href="" class="btn-transp-withoutBorder">Back to step one</a>-->
                        <!--<input type="submit" class="pink-btn" value="sign up">-->
                        <!--</div>-->
                        <input type="hidden" name="level-dificult" id="hidden-for-dificult">
                        <input type="hidden" name="deadline-time" id="hidden-for-time">
                        <input type="hidden" name="style-writing" id="hidden-for-style">

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

