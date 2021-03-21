        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date('Y'); ?> <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">ROCKTERA ASSETS </a>, All rights reserved. </span>
            <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- BEGIN VENDOR JS-->
    <script type="text/javascript" src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
<script src="<?php echo BASE_URL . '/assets/dashboard/js/clipboard.min.js'; ?>"></script>
<script type="text/javascript">
        var iclp = new ClipboardJS('.i-block');
        iclp.on('success', function(e) {
            $(e.trigger).append("<span class='ic-badge badge badge-success'>copied</span>");
            setTimeout(function() {
                $('.i-block').children('.ic-badge').remove();
            }, 3000);
        });

        iclp.on('error', function(e) {
            $(e.trigger).append("<span class='ic-badge badge badge-danger'>Error</span>");
            setTimeout(function() {
                $('.i-block').children('.ic-badge').remove();
            }, 3000);
        });
</script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/editors/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/core/app.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/scripts/pages/dashboard-crypto.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/scripts/forms/form-login-register.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/scripts/editors/editor-ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL . '/assets/dashboard/'; ?>js/scripts/tables/datatables/datatable-advanced.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->