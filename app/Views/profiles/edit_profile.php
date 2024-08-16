<?php
    // Retrieve the 'user' session variable
    $user = session('user');        
?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
   <!-- Begin Page Content -->
   <div class="container-fluid">
                    <!-- Content Row -->
                    
                    <div class="row" style="display:flex;  flex-direction: column;  justify-content:center; align-items:center;  width:100%;">
                        <div style="width:100%;">
                        <div class="wrapper-registration-form">
                        <div class="registration-form">
                            <h1 style="margin-bottom: 30px;">Update Profile</h1>
                            
                            <form id="reg_form" method="post" action="<?= base_url('/dashboard/profile/update/'.$user['username'].'/'.$user['id']) ?>">
                            <div class="form-group">
                                        <label for="fullname">Fullname:</label>
                                        <input type="text" id="fullname" name="fullname" value="<?= $user['fullname'] ?>" placeholder="Enter Fullname">
                                        <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?php if (strpos($error, 'fname') !== false) : ?>
                                                    <span class="text-danger"><?= esc($error) ?></span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                <div>
                                    
                            
                                    <div class="form-group">
                            
                                        <label for="username">Username:</label>
                                        <input class="default" type="text" id="uname" name="uname" value="<?= $user['username'] ?>" placeholder="Enter Username" readonly>
                                        <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?php if (strpos($error, 'uname') !== false) : ?>
                                                    <span class="text-danger"><?= esc($error) ?></span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Enter Email Address">
                                        <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?php if (strpos($error, 'email') !== false) : ?>
                                                    <span class="text-danger"><?= esc($error) ?></span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" value="<?= old('password') ?>" name="password" placeholder="Enter Password">
                                        <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?php if (strpos($error, 'password') !== false) : ?>
                                                    <span class="text-danger"><?= esc($error) ?></span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Confirm Password:</label>
                                        <input type="password" name="confirm_password" id="confirm_password" value="<?= old('confirm_password') ?>" placeholder="Enter Confirm Password">
                                        <?php if (session()->has('errors')) : ?>
                                            <?php foreach (session('errors') as $error) : ?>
                                                <?php if (strpos($error, 'confirm_password') !== false) : ?>
                                                    <span class="text-danger"><?= esc($error) ?></span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    
    
                                </div>

                                <div class="form-group" style="width: 100%;">
                                    <input type="submit" value="UPDATE"   >
                                </div>
                                <!-- <div class="form-group" style="width: 100%;">
                                    <a href="<?= base_url('/dashboard/users') ?>" style="font-size:20px;">BACK</a>
                                </div> -->
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
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

<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
    Update Profile
<?= $this->endSection() ?>

