<div class="item">
    <div class="title">     
        <?php echo html_escape($item->brand); ?>
        <br />
        <?php echo html_escape($item->name); ?>
        <?php echo html_escape("(" . $item->qty . "" . $item->unit . ")"); ?>
    </div>
    <div class="content">
        <?php
        $this->table->set_heading('Shop', 'Price', 'Last Updated', 'Contributed by', 'Action');
        echo $this->table->generate($price_list);
        ?>
    </div>
</div>