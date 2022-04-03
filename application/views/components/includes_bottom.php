<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.stellar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/js/aos.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.animateNumber.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/js/scrollax.min.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script src="<?= base_url('assets/js/toastr.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        // toastr msg from flashdata
        <?php if ($this->session->flashdata('error') != '') : ?>
            var msg = "<?= str_replace(array("\r", "\n", "<p>", "</p>"), array("", "", "- ", "<br/>"), $this->session->flashdata('error')); ?>"
            toastr.error(msg, "Error!")
        <?php endif; ?>

        <?php if ($this->session->flashdata('success') != '') : ?>
            var msg = "<?=$this->session->flashdata('success'); ?>"
            toastr.success(msg, "Success!")
        <?php endif; ?>

        <?php if ($this->session->flashdata('info') != '') : ?>
            var msg = "<?=$this->session->flashdata('info'); ?>"
            toastr.info(msg, "")
        <?php endif; ?>
    });
</script>