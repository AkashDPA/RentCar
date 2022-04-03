<nav class="navbar navbar-expand-lg  ftco_navbar ftco-navbar-light bg-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('agency') ?>">Rent<span>Car</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $page_name == '' ? "active" : "" ?>"><a href="<?= base_url('agency') ?>" class="nav-link">Home</a></li>
                <li class="nav-item <?= $page_name == 'my_cars' ? "active" : "" ?>"><a href="<?= base_url('agency/my-cars') ?>" class="nav-link">My Cars</a></li>
                <li class="nav-item <?= $page_name == 'add_car' ? "active" : "" ?>"><a href="<?= base_url('agency/add-car') ?>" class="nav-link">Add Car</a></li>
                <li class="nav-item <?= $page_name == 'car_bookings' ? "active" : "" ?>"><a href="<?= base_url('agency/car-bookings') ?>" class="nav-link">Booked Cars</a></li>
                <li class="nav-item <?= $page_name == 'rent_car' ? "active" : "" ?>"><a href="<?= base_url('home/rent-car') ?>" class="nav-link">Rent A Car</a></li>
                <li class="nav-item"><a href="<?= base_url('auth/logout') ?>" class="nav-link">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>