<div class="item">
    <div class="price">     
        <?php echo html_escape($item->name); ?>
        RM<?php echo html_escape($price->price); ?>
    </div>
    <div class="datetime">
        <?php echo html_escape($price->datetime); ?>
    </div>
</div>