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

                    <h2>Item List</h2>

                    <?php
                    $tmpl = array('table_open' => '<table border="1" class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);

                    $this->table->set_heading('Item Name', 'Compare Prices');
                    echo $this->table->generate($item_list);
                    ?>

                    <h3>Didn't manage to find the item? Help yourself and others by contributing the price information in REGE!</h3>
                    <h4>Sign up now and spread the good deed!</h4>

                </div>
            </div>
        </div>
    </body>
</html>
