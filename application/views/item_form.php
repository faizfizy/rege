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
    <!-- v2 -->
    <?php //echo form_checkbox('bulk_qty', 'yes', FALSE); ?>
    <!-- Bulk Quantity checkbox - not working/best practice for labelling cbox? -->
</div>
<div>
    <?php echo form_label('Quantity :', 'qty'); ?>

    <?php //echo form_input('bulk', set_value('bulk')); ?>
    <?php //echo ' x '; ?>
    <?php echo form_input('qty', set_value('qty'));

    $unit = [
    'pack' => 'pack',
    'piece' => 'piece',
    'L' => 'L',
    'mL' => 'mL',
    'g' => 'g',
    'kg' => 'kg',
    'mg' => 'mg',
    'lb' => 'lb',
    'oz' => 'oz',
    ];

    echo form_dropdown('unit', $unit); ?>
</div>
<div>
    <?php echo form_label('Price: RM', 'price'); ?>
    <?php echo form_input('price', set_value('price')); ?>
</div>
<div>
    <?php //echo form_label('Date: ', 'datetime'); ?>
    <?php //echo form_input('datetime', 'will be hidden & set to current'); ?>
</div>
<div>
    <?php echo form_label('Shop: ', 'shop'); ?>
    <?php echo form_dropdown('shop', $shop_dropdown, set_value('id')); ?>
</div>
<div>
    <?php echo form_submit('save', 'Save'); ?>
    <?php echo form_button('back','Cancel - not working yet LOL'); ?>
</div>
<?php echo form_close(); ?>