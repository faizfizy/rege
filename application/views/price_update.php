<?php //echo validation_errors();        ?>

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
                    <legend>Change Price</legend>

                    <h4>     
                        <?php echo html_escape($item->brand); ?>
                        <br />
                        <?php echo html_escape($item->name); ?>
                        <?php echo html_escape("(" . $item->qty . " " . $item->unit . ")"); ?>
                    </h4>

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
                        //'href' => '..',
                        'onclick' => "location.href='". base_url() . "items/view/" . $item->id . "'"
                    );
                    ?>

                    <?php echo form_open('', $class_form); ?>
                    <div class="form-group">    
                        <?php echo form_label('Shop: ', 'shop', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_label($s_name, 'shop_name', $class_input); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Price: RM', 'price', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('price', set_value('price'), $class_input); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
                            <?php echo form_submit('save', 'Update Price', $class_button_submit); ?>
                            <?php echo form_button('back', 'Cancel', $class_button_cancel); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </fieldset>
            </div>
        </div>
    </body>
</html>