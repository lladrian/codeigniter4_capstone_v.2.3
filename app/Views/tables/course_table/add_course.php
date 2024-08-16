<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>

  
    <form id="reg_form" method="POST" action="<?= base_url('/dashboard/course/store') ?>">
        <?= csrf_field() ?>

        <div class="form-group" style="width:100%;">
                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="course_name" value="<?= old('course_name') ?>" placeholder="Enter Course Name">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'course_name') !== false) : ?>
                            <span class="text-danger"><?= esc($error) ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
        </div>

        <div class="form-group" style="width: 100%;">
            <!-- <input type="submit" value="Create Admin"> -->
            <input type="submit" style="text-transform:uppercase;" value="Create Course">
            <!-- <input type="submit" value="INSERT DATA"> -->
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/admins') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Create Course
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Create Course
<?= $this->endSection() ?>

<?= $this->section('script') ?>
   
<?= $this->endSection() ?>
