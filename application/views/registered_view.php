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
            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-success">
                        You are successfully registered! </br>
                        Please <a href="<?= base_url(); ?>users/login">Login</a> to proceed.
                    </div> 

                </div>
            </div>
        </div>
        
        <?php
        include('bootstrap/footer.php');
        ?>
        
    </body>
</html>
