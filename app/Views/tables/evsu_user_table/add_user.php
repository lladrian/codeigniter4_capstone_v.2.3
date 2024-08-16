<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>
    <form id="reg_form" method="POST" action="<?= base_url('/dashboard/evsu_user/store') ?>">
    <?= csrf_field() ?>
       
        <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" id="fname" name="fname" value="<?= old('fname') ?>" placeholder="Enter Firstname">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'fname') !== false) : ?>
                            <span class="text-danger"><?= esc($error) ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
        </div>

        <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" id="lname" name="lname" value="<?= old('lname') ?>" placeholder="Enter Lastname">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'lname') !== false) : ?>
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
                <label for="role"  style="width:100%;">Role:</label>
                <select id="role" name="category"  style="width:100%; padding:10px; text-transform: capitalize; ">
                    <?php foreach ($roles as $role): ?>        
                        <?php $selected = old('category') == $role['id'] ? 'selected' : ''; ?>
                        <option value="<?= $role['id'] ?>" <?= ($role['status'] == 1) ? $selected : 'disabled' ?> style="<?= ($role['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"><?= ($role['status'] == 1) ? $role['role_name'] : $role['role_name'] . ' (Inactive)' ?></option>
                    <!-- <option value="<?= $role['id'] ?>" <?= ($role['status'] == 1) ? $role['role_name'] : ' (Inactive)' ?> style="<?= ($role['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> <?= ($role['status'] == 1) ? $role['role_name'] : $role['role_name'] . ' (Inactive)' ?></option> -->
                    <?php endforeach; ?>
                </select>
        </div>
    
        <div class="form-group" id="campusSelection" style="width:100%; display:none;">
                <label for="campus" style="width:100%;">EVSU Campus:</label>
                <select id="campus" name="campus" style="width:100%; padding:10px; text-transform: capitalize;"> 
                   <?php foreach ($campuses as $campus): ?>        
                        <?php $selected = old('campus') == $campus['id'] ? 'selected' : ''; ?>
                        <option value="<?= $campus['id'] ?>" <?= ($campus['status'] == 1) ? $selected : 'disabled' ?> style="<?= ($campus['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"><?= ($campus['status'] == 1) ? $campus['campus_name'] : $campus['campus_name'] . ' (Inactive)' ?></option>
                    <!-- <option value="<?= $campus['id'] ?>" <?= ($campus['status'] == 1) ? $campus['campus_name'] : ' (Inactive)' ?> style="<?= ($campus['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> <?= ($campus['status'] == 1) ? $campus['campus_name'] : $campus['campus_name'] . ' (Inactive)' ?></option> -->
                    <?php endforeach; ?>
                </select>
        </div>

        <div class="form-group" id="departmentSelection" style="width:100%; display:none;">
                <label for="department" style="width:100%;">Department:</label>
                <select id="department" name="department" style="width:100%; padding:10px; text-transform: capitalize;"> 
                <?php foreach ($departments as $department): ?>  
                        <?php $selected = old('department') == $department['id'] ? 'selected' : ''; ?>
                        <option value="<?= $department['id'] ?>" <?= ($department['status'] == 1) ? $selected : 'disabled' ?> style="<?= ($department['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"><?= ($department['status'] == 1) ? $department['department_name'] : $department['department_name'] . ' (Inactive)' ?></option>      
                <!-- <option value="<?= $department['id'] ?>" <?= ($department['status'] == 1) ? $department['department_name'] : ' (Inactive)' ?> style="<?= ($department['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> <?= ($department['status'] == 1) ? $department['department_name'] : $department['department_name'] . ' (Inactive)' ?></option> -->
                <?php endforeach; ?>
                </select>
        </div>

        <div class="form-group" style="width: 100%;">
            <input type="submit" style="text-transform:uppercase;" value="Create User"> 
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/evsu_users') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Create User 
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Create User
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var role =   document.getElementById('role').value;
    var departmentSelection = document.getElementById('departmentSelection');
    var campusSelection = document.getElementById('campusSelection');
    if (role === '2') {
        campusSelection.style.display = 'block';
        departmentSelection.style.display = 'block';
    } else {
        campusSelection.style.display = 'none';
        departmentSelection.style.display = 'none';
    }

    document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    var campusSelection = document.getElementById('campusSelection');
    var departmentSelection = document.getElementById('departmentSelection');
    if (role === '2') {
        campusSelection.style.display = 'block';
        departmentSelection.style.display = 'block';
    } else {
        departmentSelection.style.display = 'none';
        campusSelection.style.display = 'none';
    }
    });
</script>
<?= $this->endSection() ?>






