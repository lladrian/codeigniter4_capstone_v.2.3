<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>

  
    <form id="reg_form" method="POST" action="<?= base_url('/dashboard/department/store') ?>">
        <?= csrf_field() ?>

        <div class="form-group" style="width:100%;">
                <label for="department_name">Department Name:</label>
                <input type="text" id="department_name" name="department_name" value="<?= old('department_name') ?>" placeholder="Enter Department Name">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'department_name') !== false) : ?>
                            <span class="text-danger"><?= esc($error) ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
        </div>

        <div class="form-group" style="width: 100%;">
            <!-- <input type="submit" value="Create Admin"> -->
            <input type="submit" style="text-transform:uppercase;" value="Create Department">
            <!-- <input type="submit" value="INSERT DATA"> -->
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/admins') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Create Department
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Create Department
<?= $this->endSection() ?>

<?= $this->section('script') ?>
   
<?= $this->endSection() ?>
