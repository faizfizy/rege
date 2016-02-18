<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
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
                <li><a href="<?= base_url(); ?> ">HOME</a></li>
                <li><a href="<?= base_url(); ?>items/add">ADD ITEM</a></li>
                <?php
                $this->load->library('session');
                if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
                    echo '<li><a href="' . base_url() . 'users/login">LOG IN</a></li>'
                    . '<li><a href="' . base_url() . 'users/register">SIGN UP</a></li>';
                } else {
                    echo '<li><a href="' . base_url() . 'users/profile">PROFILE</a></li>'
                    . '<li><a href="' . base_url() . 'users/logout">LOG OUT</a></li>';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>