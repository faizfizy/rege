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
                        Price for
                        <?php echo html_escape($price[0]->brand . " " . $price[0]->item_name); ?>
                        at
                        <?php echo html_escape($price[0]->shop_name); ?>
                        is successfully updated.
                        <?php echo anchor('items/view/' . $price[0]->item_id, 'Back to Item Page'); ?>
                    </div>

                </div>
            </div>
        </div>
        
        <?php
        include('bootstrap/footer.php');
        ?>
        
    </body>
</html>