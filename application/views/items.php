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

        <link rel="stylesheet" href="<?= base_url(); ?>css/sticky-footer-navbar.css">


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    </head>

    <?php
    include('bootstrap/navbar.php');
    ?>

    <body>
        <div class="container">
            <div class="page-header">
                <h1><p class="text-center">Find the cheapest prices on groceries.</p>
                    <p class="text-center"><small>Join other Regters who share prices and saving everyone money.</p></small></h1>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="well white">
                        <?php
                        $tmpl = array(
                            'table_open' => '<table id="example" class="table table-striped tc-table table-primary">',
                            'table_close' => '</table>');
                        $this->table->set_template($tmpl);

                        $this->table->set_heading('Item Name', 'Compare Prices');
                        ?>
                               
                        <style>
                        td{
                        border:0px solid #000;
                        }

                        tr td:last-child{
                        width:30%;
                        white-space:nowrap;
                        text-align: center;
                        }
                        </style><?php
                        echo $this->table->generate($item_list);
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include('bootstrap/footer.php');
        ?>

    </body>
</html>
