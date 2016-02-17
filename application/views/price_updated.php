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
            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-success">
                        Price for
                        <?php echo html_escape($item->brand . " " . $item->name); ?>
                        at
                        <?php echo html_escape($s_name); ?>
                        is successfully updated.
                        <?php echo anchor('items/view/' . $item->id, 'Back to Item Page'); ?>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>