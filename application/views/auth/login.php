<section class="row p-3">
    <div class="col-lg-6 col-md-8 mx-auto">
        <div class="card rounded shadow shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('auth/validate_login'); ?>
                    <div class="form-group">
                        <label for="uname1">Email</label>
                        <input type="email" class="form-control form-control-lg rounded-0" name="email"      />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-lg rounded-0" name="password" autocomplete="new-password"  />
                    </div>
                    <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>