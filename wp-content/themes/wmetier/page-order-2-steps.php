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
$order = null;

if(isset($_GET['order'])) {
	$order = Orders::getOneOrder( $_GET['order'] );
}

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

    <main class="orderRegistration-page-content single-article registration-styles">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <h1>Order</h1>
                    <div class="steps-items">
                        <ul>
                            <li>
                                <a href="<?php echo get_permalink(23); ?>" class="name-step">Order Details</a>
                                <div class="bg-counter-steps">
                                    <div class="num">1</div>
                                    <div class="text">Step</div>
                                </div>
                            </li>
                            <li class="active-item">
                                <a href="<?php echo get_permalink(85); ?>" class="name-step">Preview & Personal</a>
                                <div class="bg-counter-steps">
                                    <div class="num">2</div>
                                    <div class="text">Step</div>
                                </div>
                            </li>
                        </ul>
                    </div>
					<?php if(!is_user_logged_in()){ ?>
                        <div class="tabs-title">
                            <ul>
                                <li class="active-item returnedCustomer">Existing Customer</li>
                                <li class="newCustomer">New Customer</li>
                            </ul>
                        </div>
                        <div class="form-login">
							<?php dynamic_sidebar('for_login'); ?>
                        </div>
                        <div class="form-registration" style="display:none">
							<?php dynamic_sidebar('for_registr'); ?>
                        </div>
					<?php } else { ?>
                        <div class="form_succeed">
                            <img src="images/confirm.png" alt="status ok">

                            <p>Hello, <b class="form_name_output"><?= wp_get_current_user()->user_login; ?>!</b></p>
                            <p>We are glad to see you again</p>
                            <a onclick="document.getElementById('paypal_form').submit(); return false;" href="#">proceed to safe payment</a>
                        </div>
					<?php } ?>
                    <?php if(isset($order) && !empty($order)) { ?>
                    <div class="paper-details-section">
                        <div class="paper-details-content">
                            <div class="details-desc">
                                <h3>Your order Summary</h3>

                                <div class="row">
                                    <div class="name-details">Type of paper:</div>
                                    <div class="desc-details"><?= $order->typy_work; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Pages:</div>
                                    <div class="desc-details"><?= $order->pages; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Academic Level:</div>
                                    <div class="desc-details"><?= $order->academic_level; ?>  </div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Discipline:</div>
                                    <div class="desc-details"><?= $order->disciplin; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Citation style:</div>
                                    <div class="desc-details"><?= $order->citation_style; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Topic:</div>
                                    <div class="desc-details"><?= $order->writers; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Deadline:</div>
                                    <div class="desc-details"><?= $order->deadline; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="total-price">
                            <div class="title">Total price: </div>
                            <div class="znak">$</div>
                            <div class="res"><?= $order->price; ?></div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="paper-details-section">
                            <div class="paper-details-content">
                                <div class="details-desc">
                                    <h3>Your order Summary</h3>
                                    <div class="row">
                                        <div class="name-details">Type of paper:</div>
                                        <div class="desc-details"><?php if(isset($_POST['typy_work'])) echo $_POST['typy_work']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Pages:</div>
                                        <div class="desc-details"><?php if(isset($_POST['pages'])) echo $_POST['pages']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Academic Level:</div>
                                        <div class="desc-details"><?php if(isset($_POST['academic_level'])) echo $academic_level[$_POST['academic_level']]; ?>  </div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Discipline:</div>
                                        <div class="desc-details"><?php if(isset($_POST['disciplin'])) echo $_POST['disciplin']; ?></div>
                                    </div>
                                    <div class="row">
					                    <?php $all_style = get_field('citation_style', 23); ?>
                                        <div class="name-details">Citation style:</div>
                                        <div class="desc-details"><?php if(isset($_POST['citation_style']) && $_POST['citation_style'] != -1) echo $all_style[$_POST['citation_style']]['text']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Topic:</div>
                                        <div class="desc-details"><?php if(isset($_POST['writers'])) echo $_POST['writers']; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Deadline:</div>
                                        <div class="desc-details"><?php if(isset($_POST['deadline']) && $_POST['deadline'] != -1) echo $title[$_POST['deadline']]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-price">
                                <div class="title">Total price: </div>
                                <div class="znak">$</div>
                                <div class="res"><?php if(isset($_POST['finally-price'])) echo $_POST['finally-price']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(is_user_logged_in()){ ?>
                    <div class="bottom_reg_buttons">
                        <a href="<?php the_permalink(23); ?>" class="btn-transp-withoutBorder">Back to step one</a>
                        <form class="paypal" action="<?php echo the_permalink(235); ?>" method="post" id="paypal_form" target="_blank">
                            <input type="hidden" name="orderID" value="<?php if(isset($_GET['order'])) echo $_GET['order']; ?>">
                            <a onclick="document.getElementById('paypal_form').submit(); return false;" href="#" class="safe_pay_btn">proceed to safe payment</a>
                        </form>

                    </div>
                    <?php } ?>
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

