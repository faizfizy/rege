<!DOCTYPE html>
<html lang="en">
    <head>	
        <link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Item List</h2>
                    
                    <?php
                    $tmpl = array('table_open' => '<table border="1" class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);
    
                    $this->table->set_heading('Item Name', 'Compare');
                    echo $this->table->generate($item_list);
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
