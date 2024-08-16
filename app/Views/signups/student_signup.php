<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>

  
    <form id="reg_form" method="POST" action="<?= base_url('/signup/student/store') ?>">
        <?= csrf_field() ?>

        <div class="form-group" style="width:100%;">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" value="<?= old('fullname') ?>" placeholder="Enter Fullname">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'fullname') !== false) : ?>
                            <span class="text-danger"><?= esc($error) ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
        </div>

        <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="uname" name="uname" value="<?= old('uname') ?>" placeholder="Enter Username">
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
                <input type="email" id="email" name="email" value="<?= old('email') ?>" placeholder="Enter Email Address">
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

       
       
 
        <div class="form-group" style="width: 100%;">
            <!-- <input type="submit" value="Create Admin"> -->
            <input type="submit" style="text-transform:uppercase;" value="Signup Student">
            <!-- <input type="submit" value="INSERT DATA"> -->
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/admins') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Signup Student
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Signup Student
<?= $this->endSection() ?>

<?= $this->section('script') ?>
   
<?= $this->endSection() ?>
