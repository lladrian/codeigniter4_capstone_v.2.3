<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>

  
    <form id="reg_form" method="POST" action="<?= base_url('/signup/staff/store') ?>">
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

        <div class="form-group" style="width:100%; ">
                <label for="department_id"  style="width:100%;">Department:</label>
                <select id="department_id" name="department_id"  style="width:100%; padding:10px; text-transform: capitalize; ">
                    <?php foreach ($departments as $department): ?>        
                        <?php $selected = old('department_id') == $department['id'] ? 'selected' : ''; ?>
                        <option value="<?= $department['id'] ?>"  <?= $selected ?> style="font-size:18px;  text-transform: capitalize;"> <?=$department['department_name']?></option>
                    <?php endforeach; ?>
                </select>
        </div>


        <div class="form-group" style="width:100%; ">
                <label for="role_id"  style="width:100%;">Role:</label>
                <select id="role_id" name="role_id"  style="width:100%; padding:10px; text-transform: capitalize; ">
                    <?php foreach ($roles as $role): ?>        
                        <?php $selected = old('role_id') == $role['id'] ? 'selected' : ''; ?>
                        <option value="<?= $role['id'] ?>"  <?= $selected ?> style="font-size:18px;  text-transform: capitalize;"> <?=$role['role_name']?></option>
                    <?php endforeach; ?>
                </select>
        </div>

        <!-- Checkbox for Instructor -->
        <div  id="instructorSelection"  style="display: flex; align-items:center; justify-content:center; height:30px; width:100%;">
            <input type="checkbox" id="instructor" name="instructor" value="1" <?= old('instructor') ? 'checked' : '' ?> style="margin-right: 2px;">
            <label for="instructor">Are you also an instructor?</label>
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
    Signup Staff
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Signup Staff
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
        var roleSelect = document.getElementById('role_id');
        var instructorSelection = document.getElementById('instructorSelection');

        function toggleInstructorSelection() {
            var role = roleSelect.value;
            if (role === '4') {  // Replace '4' with the appropriate value for the instructor role
                instructorSelection.style.display = 'block';
            } else {
                instructorSelection.style.display = 'none';
            }
        }

        // Initial check
        toggleInstructorSelection();

        // Add event listener
        roleSelect.addEventListener('change', toggleInstructorSelection);
    });

    // var role =   document.getElementById('role_id').value;
    // var instructorSelection = document.getElementById('instructorSelection');
    // if (role === '4') {
    //     instructor.style.display = 'block';
    //     departmentSelection.style.display = 'block';
    // } else {
    //     instructor.style.display = 'none';
    //     departmentSelection.style.display = 'none';
    // }

    // document.getElementById('role_id').addEventListener('change', function() {
    //     var role = this.value;
    //     var instructorSelection = document.getElementById('instructorSelection');
    //     if (role === '4') {
    //         instructorSelection.style.display = 'block';
    //         departmentSelection.style.display = 'block';
    //     } else {
    //         departmentSelection.style.display = 'none';
    //         instructorSelection.style.display = 'none';
    //     }
    // });
    </script>
<?= $this->endSection() ?>
