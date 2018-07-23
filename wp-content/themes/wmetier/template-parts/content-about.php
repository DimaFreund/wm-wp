<div data-depth="0.3" class="about-inf <?php if(is_front_page()) echo 'movingToTop'; ?>">
    <div class="title-section">
        <div class="text1">Our</div>
        <div class="text2">beNefits</div>
    </div>
    <ul>
        <?php
        $list = get_field('benefits', 8);
//        foreach ($list as $item) { ?>
<!--            <li class="about-inf-item">--><?php //echo $item['title']; ?><!--</li>-->
<!--        --><?php //} ?>


    </ul>
    <a href="<?php echo get_permalink(8); ?>" class="btn-transp-withoutBorder">read more</a>
</div>