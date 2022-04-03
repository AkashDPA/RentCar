<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url('assets/images/car-11.jpg') ?>);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <h2 class="mb-4 text-capitalize">Welcome <?= $this->session->userdata('name') ?></h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt mollitia blanditiis corrupti hic dolor doloremque, nam cumque atque natus architecto at sint omnis doloribus nostrum corporis suscipit illo, explicabo fugit.</p>
                    <p><a href="<?= base_url('agency/car-bookings') ?>" class="btn btn-primary py-3 px-4">View Bookings</a></p>
                </div>
            </div>
        </div>
    </div>
</section>