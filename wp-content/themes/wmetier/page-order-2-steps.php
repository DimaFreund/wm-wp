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



    <main class="orderRegistration-page-content single-article registration-styles">
        <?php if(is_user_logged_in()){ ?>
        <form method="POST" action="<?php echo home_url(); ?>" >
        <?php } ?>
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

                    <div class="tabs-title">
                        <ul>
                            <li class="active-item returnedCustomer">Returned Customer</li>
                            <li class="newCustomer">New Customer</li>
                        </ul>
                    </div>

                    <div class="custom-registration-title">
                        And a little bit more...
                    </div>

                    <div class="custom-registration-title">
                        Or...
                    </div>
                    <div class="form-login">
                        <?php dynamic_sidebar('for_login'); ?>
                    </div>
                    <div class="form-registration">
                        <?php dynamic_sidebar('for_registr'); ?>
                    </div>
<?php if(is_user_logged_in()){ ?>
                    <div class="calculator-section">
                    <input type="submit" class="pink-btn" value="Order">
                        <input type="hidden" name="amount-new-order">
                    </div>
    <?php } ?>

                </div>
                <div class="sidebar">
                    <div class="paper-details-section custom-paper-details-section">
                        <div class="paper-details-content">
                            <div class="details-desc">
                                <div class="row">
                                    <div class="name-details">Type of paper:</div>
                                    <div name="type-task" class="desc-details"><?php if(isset($_POST['type-task'])) echo $_POST['type-task']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Pages:</div>
                                    <div name="countPage" class="desc-details"><?php if(isset($_POST['countPage'])) echo $_POST['countPage']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Academic Level:</div>
                                    <div name="level-dificult-value" class="desc-details"><?php if(isset($_POST['level-dificult'])) echo $academic_level[$_POST['level-dificult']]; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Discipline:</div>
                                    <div name="discipline-task" class="desc-details"><?php if(isset($_POST['discipline-task'])) echo $_POST['discipline-task']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Citation style:</div>
                                    <?php $all_style = get_field('citation_style', 23); ?>
                                    <div name="style-writing-value" class="desc-details"><?php if(isset($_POST['style-writing']) && $_POST['style-writing'] != -1) echo $all_style[$_POST['style-writing']]['text']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Topic:</div>
                                    <div name="writer-choice" class="desc-details"><?php if(isset($_POST['writer-choice'])) echo $_POST['writer-choice']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="name-details">Deadline:</div>
                                    <div name="deadline-time-value" class="desc-details"><?php if(isset($_POST['deadline-time']) && $_POST['deadline-time'] != -1) echo $title[$_POST['deadline-time']]; ?></div>
                                </div>
                                <input type="hidden" name="instructions" value="<?php if(isset($_POST['instructions'])) echo $_POST['instructions']; ?>">
                            </div>
                        </div>
                        <div class="total-price">
                            <div class="title">Total price: </div>
                            <div class="znak">$</div>
                            <div class="res"><?php if(isset($_POST['deadline-time']) && $_POST['deadline-time'] != -1 && isset($_POST['level-dificult']) && isset($_POST['countPage'])) echo $column[$_POST['deadline-time']][$_POST['level-dificult']]*$_POST['countPage']; ?></div>
                        </div>
                        <div class="paper-details-btns">
                            <a href="<?php echo get_permalink(23); ?>" class="btn-transp-withoutBorder">edit</a>
                        </div>
                        <div class="title-section">
                            <div class="text1">Order</div>
                            <div class="text2">preview</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button class="btn-to-top"></button>
<?php if(is_user_logged_in()){ ?>
        </form>
    <?php } ?>
    </main>



<?php
get_footer();

