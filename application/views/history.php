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
            <div class="page-header">
                <h2><p>Price History</p>
                    <small><p>for 
                            <a href='<?= base_url(); ?>items/view/<?= $item->id ?>'>
                                <strong><?php echo html_escape($item->brand . " "); ?></strong>
                                <?php echo html_escape($item->name); ?>
                                <?php echo html_escape("(" . $item->qty . " " . $item->unit . ")"); ?>
                            </a>
                            <?php echo html_escape("at " . $price->shop_name); ?>
                        </p></small></h2>
            </div>
            <div class="row">
                <div class="col-md-12">


                    <?php
                    $tmpl = array('table_open' => '<table border="1" class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);

                    $this->table->set_heading('Date', 'Price', 'Contributed by', 'Action');
                    echo $this->table->generate($price_list);
                    ?>

                </div>
            </div>
        </div>

        <?php
        include('bootstrap/footer.php');
        ?>

    </body>
</html>

