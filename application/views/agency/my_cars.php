<section class="ftco-section bg-light">
    <div class="container">
        <h2 class="mt-n4 pb-3">My Cars</h2>
        <div class="row">
            <?php foreach ($cars as $car) : ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(<?= base_url('assets/images/user_upload/' . $car['photo']) ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="car-single.html"><?= $car['model'] ?></a></h2>
                            <div class="d-flex mb-3">
                                <span>
                                    <?= $car['number'] ?>
                                    <br />
                                    Capacity: <?= $car['seating_capacity'] ?>
                                </span>
                                <p class="price ml-auto">&#8377; <?= $car['rent_per_day'] ?> <span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <a href="<?= base_url('agency/edit-car/' . $car['id']) ?>" class="btn btn-secondary py-2 mx-auto">Edit</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>