<?php //echo validation_errors();      ?>

<?php echo form_open(); ?>
<div class="title">     
    <?php echo html_escape($item->brand); ?>
    <br />
    <?php echo html_escape($item->name); ?>
    <?php echo html_escape("(" . $item->qty . "" . $item->unit . ")"); ?>
</div>
<?php echo form_label('Price: RM', 'price'); ?>
<?php echo form_input('price', set_value('price')); ?>
</div>
<div>
    <?php echo form_label('Shop: ', 'shop'); ?>
    <?php echo form_dropdown('shop', $shop_dropdown, set_value('id')); ?>
</div>
<div>
    <?php echo form_submit('save', 'Update Price'); ?>
    <?php echo form_button('back', 'Cancel - not working yet LOL'); ?>
</div>
<?php echo form_close(); ?>