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

$obj = new Orders();
if(isset($_GET['status'])) {
    $status = $_GET['status'];
} else {
    $status = 'all';
}
$results = $obj->getOrdersUser(get_current_user_id(), $status);


?>

    <main class="orders-page-content">
        <div class="wrapper">
            <h1>Orders</h1>
            <div class="orders_switch">
                <a href="<?php the_permalink(97); ?>/?status=Unpaid" class="orders_switch_btn orders_switch_btn_active">Unpaid</a>
                <a href="<?php the_permalink(97); ?>/?status=Active" class="orders_switch_btn">Available</a>
                <a href="<?php the_permalink(97); ?>/?status=Completed" class="orders_switch_btn">Completed</a>
            </div>
            <div class="orders-section">
                <div class="rowTitle-ordersSection">
                    <div class="cell">Order ID</div>
                    <div class="cell topicCell">Topic</div>
                    <div class="cell dateForm">Started</div>
                    <div class="cell dateTo">Deadline</div>
                    <div class="cell priceCell">Price</div>
                    <div class="cell statusCell">
                        <div class="select-section">
                            <select name="orderStatusList" id="orderStatusList">
                                <option class="allVariants" value="all">Status</option>
                                <option class="inProgressVariant" value="inProgress">In progress</option>
                                <option class="canceledVariant" value="canceled">Canceled</option>
                                <option class="doneVariant" value="done">Done</option>
                            </select>
                            <!--                <div class="select-btn"></div>-->
                        </div>
                    </div>
                </div>
<?php foreach($results as $result) { ?>

	<?php



	?>
                <div class="orderIem-section">
                    <div class="rowOrder rowInProgress">
                        <a href="<?= get_permalink(244) . '?id=' . $result->id; ?>" class="cell moreDetailsBtn" target="_blank">
                            <span>#<?php echo $result->id; ?></span>
                            <!--                <span class="select-btn"></span>-->
                        </a>
                        <div class="cell topicCell"><?php echo $result->writers; ?></div>
                        <div class="cell dateForm"><?php echo $result->data_create; ?></div>
                        <div class="cell dateTo"><?php echo Orders::getDeadlineDate($result); ?></div>
                        <div class="cell priceCell"><?php echo $result->price; ?></div>
	                    <?php
	                    $status = mb_strtolower($result->status);
	                    $status = str_replace(' ', '-', $status);
	                    ?>
                        <div class="cell statusCell <?php echo $status; ?>"><?php echo $result->status; ?></div>
                    </div>

                </div>
<?php } ?>
            </div>
        </div>
        <button class="btn-to-top"></button>
    </main>



    <div class="overflowDark"></div>
    <div class="contact-form-colored-section popupFormSection">
        <div class="colored-desc-title">
            Enter your email address
        </div>
        <form method="POST" action="<?php echo home_url(); ?>">
            <label for="user-email">E-mail</label>
            <input name="email-user" id="user-email" type="email" placeholder="Enter E-mail">
            <input type="hidden" name="puth-file">
            <input type="hidden" name="amount-send-email-file">
            <input class="pink-btn" type="submit" value="submit">
        </form>
    </div>


<?php
get_footer();

