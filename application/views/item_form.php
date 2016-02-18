<!DOCTYPE html>
<html lang="en">
    <head>	
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
    </head>

    <?php
    include('bootstrap/navbar.php');
    ?>

    <body>
        <div class="container">
            <div class="col-lg-10">
                <fieldset>
                    <legend>Record New Item</legend>

                    <?php echo validation_errors(); ?>

                    <?php
                    $class_form = array(
                        'class' => 'form-horizontal'
                    );
                    $class_label = array(
                        'class' => 'col-lg-3 control-label',
                    );
                    $class_input = array(
                        'class' => 'form-control',
                    );
                    $class_button_submit = array(
                        'class' => 'btn btn-success',
                    );
                    $class_button_cancel = array(
                        'class' => 'btn btn-primary',
                        'onclick' => "location.href='../'"
                    );
                    ?>

                    <?php echo form_open('', $class_form); ?>

                    <div class="form-group">
                        <?php echo form_label('Brand: ', 'brand', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('brand', set_value('brand'), $class_input); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Item name: ', 'name', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('name', set_value('name'), $class_input); ?>
                        </div>
                    </div>
                    <div>
                        <!-- v2 -->
                        <?php //echo form_checkbox('bulk_qty', 'yes', FALSE);    ?>
                        <!-- Bulk Quantity checkbox - not working/best practice for labelling cbox? -->
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Quantity :', 'qty', $class_label); ?>

                        <?php //echo form_input('bulk', set_value('bulk')); ?>
                        <?php //echo ' x '; ?>

                        <div class="col-lg-6">
                            <?php
                            echo form_input('qty', set_value('qty'), $class_input);
                            echo form_dropdown('unit', $unit);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Price: RM', 'price', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('price', set_value('price'), $class_input); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Shop: ', 'shop', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_dropdown('shop', $shop_dropdown, set_value('id'), $class_input); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
                            <?php echo form_submit('save', 'Save', $class_button_submit); ?>
                            <?php echo form_button('back', 'Cancel', $class_button_cancel); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </fieldset>
            </div>
        </div>
    </body>
</html>