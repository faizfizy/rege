<?php echo validation_errors(); ?>

<?php echo form_open(); ?> 
<div>
    <?php echo form_label('Brand: ', 'brand'); ?>
    <?php echo form_input('brand', set_value('brand')); ?>    
</div>
<div>
    <?php echo form_label('Item name: ', 'name'); ?>
    <?php echo form_input('name', set_value('name')); ?>
</div>
<div>
    <?php echo form_label('Price: RM', 'price'); ?>
    <?php echo form_input('price', set_value('price')); ?>
</div>
<div>
    <?php echo form_label('Date: ', 'date'); ?>
    <?php echo form_input('date', 'will be hidden & set to current'); ?>
</div>
<div>
    <?php echo form_label('Shop', 'shop'); ?>
    <?php echo form_dropdown('shop', $shop_dropdown, set_value('id')); ?>
</div>
<div>
    <?php echo form_submit('save', 'Save'); ?>
</div>
<?php echo form_close(); ?>