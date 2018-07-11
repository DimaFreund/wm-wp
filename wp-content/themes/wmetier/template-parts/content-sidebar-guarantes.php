<div class="guarantees-section">
    <div class="title-section">
        <div class="text2">Guarantees</div>
    </div>
    <div class="guarantees-items">

        <?php foreach(get_field('guarantees', 14) as $item) { ?>

        <div class="guarantees-item">
            <h3>
                <a href="<?php echo $item['link_in_page']; ?>"><?php echo $item['title']; ?></a>
            </h3>
            <p>
                <?php echo $item['short_description_page']; ?>
            </p>
        </div>
        <?php } ?>
    </div>
    <a href="<?php echo get_permalink(14); ?>" class="btn-transp-withoutBorder">read more</a>
</div>