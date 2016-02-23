<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

        <script src="<?= base_url(); ?>js/jquery.js"></script>
        <script src="<?= base_url(); ?>js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    </head>

    <?php
    include('bootstrap/navbar.php');
    ?>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <h2>Item List</h2>

                    <div class="well white">
                        <?php
                        $tmpl = array(
                            'table_open' => '<table id="example" class="table table-bordered table-striped table-hover tc-table table-primary footable" data-page-size="2">',
                            'table_close' => '</table>');
                        $this->table->set_template($tmpl);

                        $this->table->set_heading('Item Name', 'Compare Prices');
                        echo $this->table->generate($item_list);
                        ?>
                    </div>

                    <h3>Didn't manage to find the item? Help yourself and others by contributing the price information in REGE!</h3>
                    <h4>Sign up now and spread the good deed!</h4>

                </div>
            </div>
        </div>
    </body>
</html>
