<nav class="navbar navbar-expand-lg  ftco_navbar ftco-navbar-light bg-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Rent<span>Car</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $page_name == '' ? "active" : "" ?>"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
                <li class="nav-item <?= $page_name == 'rent_car' ? "active" : "" ?>"><a href="<?= base_url('home/rent-car') ?>" class="nav-link">Rent Car</a></li>
                <?php if (!$this->session->userdata('is_logged_in')) : ?>
                    <li class="nav-item <?= $page_name == 'register' ? "active" : "" ?>"><a href="<?= base_url('auth/register') ?>" class="nav-link">Register</a></li>
                    <li class="nav-item <?= $page_name == 'login' ? "active" : "" ?>"><a href="<?= base_url('auth/login') ?>" class="nav-link">Login</a></li>
                <?php else : ?>
                    <li class="nav-item"><a href="<?= base_url('auth/logout') ?>" class="nav-link">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<style>
    .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
        color: #000;
    }

    .ftco-navbar-light .navbar-brand {
        color: #000;
    }
</style>