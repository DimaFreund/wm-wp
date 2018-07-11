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
$results = $obj->getOrdersUser(get_current_user_id());


?>



    <main class="orders-page-content">
        <div class="wrapper">
            <h1>Orders</h1>
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
                            <div class="select-btn"></div>
                        </div>
                    </div>
                </div>

                <?php foreach($results as $result) { ?>

                    <?php

                    $time1 = $result->data_create;

                    $t1 = explode(" ", $time1);
                    $d1 = explode("-", $t1['0']);
                    $ti1 = explode(":", $t1['1']);



                    $tm = mktime($ti1[0],$ti1[1],$ti1[2],$d1[1],$d1[2],$d1[0]) + $result->value;


                    ?>

                <div class="orderIem-section">
                    <div class="rowOrder rowCanceled">
                        <div class="cell moreDetailsBtn">
                            <span>#<?php echo $result->id; ?></span>
                            <span class="select-btn"></span>
                        </div>
                        <div class="cell topicCell"><?php echo $result->writers; ?></div>
                        <div class="cell dateForm"><?php echo $result->data_create; ?></div>
                        <div class="cell dateTo"><?php echo date("Y-m-d H:i:s",$tm); ?></div>
                        <div class="cell priceCell"><?php echo $result->price; ?></div>
                        <?php
                        $status = mb_strtolower($result->status);
                        $status = str_replace(' ', '-', $status);
                        ?>
                        <div class="cell statusCell <?php echo $status; ?>"><?php echo $result->status; ?></div>
                    </div>

                    <div class="order-details-section">
                        <div class="order-details-content">
                            <div class="col details-col">
                                <div class="details-title">
                                    Details
                                </div>
                                <div class="details-desc">
                                    <div class="row">
                                        <div class="name-details">Type of paper:</div>
                                        <div class="desc-details"><?php echo $result->typy_work; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Pages:</div>
                                        <div class="desc-details"><?php echo $result->pages; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Academic Level:</div>
                                        <div class="desc-details"><?php echo $result->academic_level; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Discipline:</div>
                                        <div class="desc-details"><?php echo $result->disciplin; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Citation style:</div>
                                        <div class="desc-details"><?php echo $result->citation_style; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Type of paper:</div>
                                        <div class="desc-details"><?php echo $result->writers; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col timelines-col">
                                <div class="details-title">
                                    Timelines
                                </div>
                                <div class="details-desc">
                                    <div class="row">
                                        <div class="name-details">Started:</div>
                                        <div class="desc-details"><?php echo $result->data_create; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Urgency:</div>
                                        <div class="desc-details"><?php echo $result->full_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="name-details">Deadline:</div>
                                        <div class="desc-details"><?php echo date("Y-m-d H:i:s",$tm); ?></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col otherInfromation-col">
                                <div class="details-title">
                                    Other Infromation
                                </div>
                                <div class="details-desc">
                                    <div class="row">
                                        <div class="name-details">Actual topic:</div>
                                        <div class="desc-details"><?php echo $result->writers; ?></div>
                                    </div>
                                    <div class="row instructionsRow">
                                        <div class="name-details">Instructions From:</div>
                                        <div class="desc-details"><?php echo $result->description; ?></div>
                                    </div>
                                    <div class="row total-price-row">
                                        <div class="total-price">
                                            <div class="title">Total price: </div>
                                            <div class="znak">$</div>
                                            <div class="res"><?php echo $result->price; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="oreder-details-btns">
                            <?php
                            if(isset($result->upload_file) && $result->upload_file != 0 ){
                            $href = get_post($result->upload_file);
                            $href = $href->guid;

                            ?>
                            <a target="_blank" href="<?php echo $href ?>" class="btn-transp-withoutBorder">PREVIEW</a>
                            <a download="download" href="<?php echo $href ?>" class="btn-transp-withoutBorder">DAWNLOAD</a>
                            <button type="button" data-link="<?php echo $href; ?>" class="open-popup btn-transp-withoutBorder">SEND BY EMAIL</button>
                                <?php } ?>
                        </div>
                        <div class="title-section">
                            <div class="text2">Invoice</div>
                        </div>
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

