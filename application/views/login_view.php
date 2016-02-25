<!DOCTYPE html>
<html>
    <head>	
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?= base_url(); ?>css/sticky-footer-navbar.css">

        <style type="text/css">
            .colbox {
                margin-left: 0px;
                margin-right: 0px;
            }
        </style>
    </head>

    <?php
    include('bootstrap/navbar.php');
    ?>

    <body>
        <div class="container">

            <?php
            if ((isset($_SESSION['forbidden']) && $_SESSION['forbidden'] != ''))
                echo '<div class="alert alert-danger">
                        You need to Log In.</br>
                        If you do not have an account, <a href="' . base_url() . 'users/register">Sign Up</a> here. It only take 1 minutes, I promise.
                      </div>';
            $this->session->unset_userdata('forbidden');
            ?>


            <div class="row">
                <div class="col-lg-4 col-sm-4 well">
                    <?php
                    $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                    echo form_open("", $attributes);
                    ?>
                    <fieldset>
                        <legend>Login</legend>
                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_username" class="control-label">E-mail</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_username" name="txt_username" placeholder="E-mail" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_password" class="control-label">Password</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 col-sm-12 text-center">
                                <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Reset" />
                            </div>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            </div>
        </div>

        <!--load jQuery library-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!--load bootstrap.js-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <?php
        include('bootstrap/footer.php');
        ?>

    </body>
</html>