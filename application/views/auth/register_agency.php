<section class="row p-3">
    <div class="col-lg-6 col-md-8 mx-auto">
        <div class="card rounded shadow shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">Register Agency</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('auth/validate_register/agency'); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control form-control-lg rounded-0" name="name" />
                </div>
                <div class="form-group">
                    <label for="uname1">Email</label>
                    <input type="email" class="form-control form-control-lg rounded-0" name="email" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-lg rounded-0" name="password" autocomplete="new-password" />
                </div>
                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Register</button>
                <p>
                    <a href="<?= base_url('auth/register') ?>">User? Register Here</a>
                </p>
                </form>
            </div>
        </div>
    </div>
</section>