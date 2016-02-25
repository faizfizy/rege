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

                    <h2>    
                        <?php echo html_escape($item->brand); ?>
                        <br />
                        <?php echo html_escape($item->name); ?>
                        <?php echo html_escape("(" . $item->qty . " " . $item->unit . ")"); ?>
                    </h2>

                    <?php
                    $tmpl = array('table_open' => '<table border="1" class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);

                    $this->table->set_heading('Shop', 'Price', 'Last Updated', 'Contributed by', 'Action');
                    echo $this->table->generate($price_list);
                    ?>

                    <div>
                        <?php echo anchor('items/add_price/' . $item->id, 'Add Price at Different Shop'); ?>
                    </div>

                </div>
            </div>
        </div>

        <?php
        include('bootstrap/footer.php');
        ?>

    </body>
</html>