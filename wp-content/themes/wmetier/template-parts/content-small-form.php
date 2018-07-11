
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


<form action="<?php echo get_permalink(23); ?>" class="calculator-section" id="page-order-options">
    <input type="hidden" id="table-auto-price" value="<?php echo esc_attr($columnJson); ?>">
    <div class="row row1">
        <div class="type-task">
            <div class="title-row-form">Type of paper needed</div>
            <div class="select-section">
                <select name="type-task" id="type-task-variants">
                    <?php foreach(get_field('type_of_paper_needed', 23) as $item) { ?>
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
    <div class="row row4">
        <div class="total-price">
            <div class="title">Total price: </div>
            <div class="znak">$</div>
            <div class="res">0</div>
        </div>
        <input type="submit" class="pink-btn" value="order now">
    </div>
</form>