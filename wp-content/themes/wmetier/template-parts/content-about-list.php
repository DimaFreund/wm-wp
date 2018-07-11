<div class="benefits-section">
    <div class="title-section">
        <div class="text1">Our</div>
        <div class="text2">benefits</div>
    </div>
    <div class="benefits-items">
        <?php
        $list = get_field('benefits', 8);
        foreach ($list as $item) { ?>
            <div class="benefits-item">
                <h3><?php echo $item['title']; ?></h3>
            </div>
        <?php } ?>


    </div>
    <a href="<?php echo get_permalink(8); ?>" class="btn-transp-withoutBorder">read more</a>
</div>