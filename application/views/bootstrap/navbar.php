<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!--header section -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url(); ?>">REGE</a>
        </div>
        <!-- menu section -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">

                <?php
                $this->load->library('session');
                if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
                    echo '<li><form action="' . base_url() . 'users/login">'
                    . '<button class="btn btn-default btn-block navbar-btn">LOG IN </button>'
                    . '</form></li>'
                    . '<li><form action="' . base_url() . 'users/register">'
                    . '<button class="btn btn-primary btn-block navbar-btn"  role="button">SIGN UP</button>'
                    . '</form></li>';
                } else {
                    echo '<li><a href="' . base_url() . '">BROWSE</a></li>'
                    . '<li><a href="' . base_url() . 'items/add">ADD ITEM</a></li>'
                    . '<li><a href="' . base_url() . 'users/profile">PROFILE</a></li>'
                    . '<li><a href="' . base_url() . 'users/logout">LOG OUT</a></li>';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>