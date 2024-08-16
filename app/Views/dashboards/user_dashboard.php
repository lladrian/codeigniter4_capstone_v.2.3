<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    TOTAL PENDING FILES</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $upload_file_count; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-file fa-2x"></i>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                    TOTAL APPROVED FILES</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $storage_file_count; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-file fa-2x"></i>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                TOTAL PENDING STORAGE SIZE
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $upload_folder_size; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-database fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                TOTAL FINAL STORAGE SIZE
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $storage_folder_size; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-database fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!--  container-fluid -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#content-wrapper">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('/dashboard/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('jquery-easing/jquery.easing.min.js') ?>"></script>
<?= $this->endSection() ?>


<?= $this->section('table_name') ?>
    Dashboard
    <!-- User Dashboard -->
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
    Dashboard
<?= $this->endSection() ?>