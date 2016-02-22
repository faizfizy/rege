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

                    <h2>History at <?php echo html_escape($price->shop_name); ?></h2>

                    <h4>
                        <a href='<?= base_url(); ?>items/view/<?= $item->id ?>'>
                            <?php echo html_escape($item->brand); ?>
                            <br />
                            <?php echo html_escape($item->name); ?>
                            <?php echo html_escape("(" . $item->qty . " " . $item->unit . ")"); ?>
                        </a>
                    </h4>

                    <?php
                    $tmpl = array('table_open' => '<table border="1" class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);

                    $this->table->set_heading('Date', 'Price', 'Contributed by', 'Action');
                    echo $this->table->generate($price_list);
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>

