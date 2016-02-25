<?php //echo validation_errors(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>	
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="<?= base_url(); ?>css/sticky-footer-navbar.css">
    </head>

    <?php
    include('bootstrap/navbar.php');
    ?>

    <body>
        <div class="container">
            <div class="col-lg-10">
                <fieldset>
                    <legend>User Profile</legend>

                    <?php
                    $class_form = array(
                        'class' => 'form-horizontal'
                    );
                    $class_label = array(
                        'class' => 'col-lg-3 control-label',
                    );
                    $class_input = array(
                        'class' => 'form-control',
                        'readonly' => TRUE,
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
                        <?php echo form_label('Username: ', 'username', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('username', $user_detail['username'], $class_input); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_label('First Name: ', 'fname', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('fname', $user_detail['fname'], $class_input); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_label('Last Name: ', 'lname', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('lname', $user_detail['lname'], $class_input); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_label('E-mail: ', 'email', $class_label); ?>
                        <div class="col-lg-6">
                            <?php echo form_input('email', $user_detail['email'], $class_input); ?>
                        </div>
                    </div>
                    
                    <!-- Change Password -->
                    
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-10">
                            <?php //echo form_submit('save', 'Save', $class_button_submit); ?>
                            <?php echo form_button('back', 'Back', $class_button_cancel); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </fieldset>
            </div>
        </div>
        
        <?php
        include('bootstrap/footer.php');
        ?>
        
    </body>
</html>