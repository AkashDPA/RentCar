<section class="row p-3">
    <div class="col-lg-6 col-md-8 mx-auto">
        <div class="card rounded shadow shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">Add Car</h3>
            </div>
            <div class="card-body mx-3">
                <?php echo form_open_multipart('agency/car_actions/add'); ?>
                <div class="form-group row">
                    <label class="col-4 col-form-label" for="vehicle_model">Vehicle Photo</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input type='file' name='vehicle_photo' size='20' class="form-control-file" accept=".jpg,.jpeg,.png"/>
                            <small>Size must be less than 512 KB, Square Photo recommended</small>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4 col-form-label" for="vehicle_model">Vehicle Model</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-arrow-up"></i>
                                </div>
                            </div>
                            <input id="vehicle_model" name="vehicle_model" type="text" class="form-control" required="required">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vehicle_number" class="col-4 col-form-label">Vehicle Number</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-address-card-o"></i>
                                </div>
                            </div>
                            <input id="vehicle_number" name="vehicle_number" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="seating_capacity" class="col-4 col-form-label">Seating Capacity</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa "></i>
                                </div>
                            </div>
                            <input id="seating_capacity" name="seating_capacity" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rent_per_day" class="col-4 col-form-label">Rent Per Day</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-inr"></i>
                                </div>
                            </div>
                            <input id="rent_per_day" name="rent_per_day" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>