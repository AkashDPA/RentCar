<section class="ftco-section ftco-car-details">
    <div class="container mt-n4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <img class="img-fluid rounded mb-3" src="<?= base_url('assets/images/user_upload/') . $car_details['photo'] ?>" />
                    <div class="text text-center">
                        <h2><?= $car_details['model'] ?></h2>
                        <span class=""><?= $car_details['number'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-5">
        <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                        <div class="text">
                            <h3 class="heading mb-0 pl-3">
                                Rent
                                <span>&#8377; <?= $car_details['rent_per_day'] ?> / Day</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                        <div class="text">
                            <h3 class="heading mb-0 pl-3">
                                Capacity
                                <span><?= $car_details['seating_capacity'] ?> Persons</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container col-lg-4 d-flex align-items-center bg-light p-4">
            <?php echo form_open('user/car_actions/rent/'.$car_details['id']); ?>
                <h2>Rent Car</h2>
                <div class="form-group mr-2">
                    <label for="" class="label">Start date</label>
                    <input type="text" class="form-control" id="start_date" placeholder="Date" name="start_date">
                </div>
                <div class="form-group">
                    <label for="" class="label">Number of Days</label>
                    <select class="form-control" name="no_of_days">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Book Now" class="btn btn-secondary py-3 px-4 mx-auto">
                </div>
            </form>
        </div>
    </div>
</section>