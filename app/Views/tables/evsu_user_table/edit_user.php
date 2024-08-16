<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>
    <form id="reg_form" method="post" action="<?= base_url('/dashboard/evsu_user/update/'.$user['id']) ?>">
    <?= csrf_field() ?>
        
        <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" id="fname" name="fname" value="<?= $user['firstname'] ?>" placeholder="Enter Firstname">
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
                <input type="text" id="lname" name="lname" value="<?= $user['lastname'] ?>" placeholder="Enter Lastname">
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
                <input class="default" type="text" id="uname" name="uname" value="<?= $user['username'] ?>" placeholder="Enter Username" readonly>
                <!-- <input type="text" id="uname" name="uname" value="<?= $user['username'] ?>" placeholder="Enter Username"> -->
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
                           
        <div class="form-group" style="width:100%; ">
                <label for="role"  style="width:100%;">Role:</label>
                <select id="role" name="category"  style="width:100%; padding:10px; text-transform: capitalize; ">
                    <?php foreach ($roles as $role): ?> 
                        <?php if ($role['id'] == $user['role_id']): ?>
                            <!-- <option value="<?= $user['role_id'] ?>" selected><?= $role['role_name'] ?></option> -->
                            <option value="<?= $user['role_id'] ?>" selected
                            style="<?= ($role['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($role['status'] == 1) ? $role['role_name'] : $role['role_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?>
                        <!-- <?php if ($role['id'] !== $user['role_id']): ?>
                            <option value="<?= $role['id'] ?>" 
                            style="<?= ($role['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($role['status'] == 1) ? $role['role_name'] : $role['role_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?> -->
                    <?php endforeach; ?>
                </select>
        </div>

        
        <div class="form-group" id="campusSelection" style="width:100%; display:none;">
                <label for="campus" style="width:100%;">EVSU Campus:</label>
                <select id="campus" name="campus" style="width:100%; padding:10px; text-transform: capitalize;"> 
                   <?php foreach ($campuses as $campus): ?> 
                        <?php if ($campus['id'] == $user['evsu_campus_id']): ?>
                            <option value="<?= $campus['id'] ?>" selected
                            style="<?= ($campus['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($campus['status'] == 1) ? $campus['campus_name'] : $campus['campus_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?>   
                        <!-- <?php if ($campus['id'] != $user['evsu_campus_id']): ?>
                            <option value="<?= $campus['id'] ?>" 
                            style="<?= ($campus['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($campus['status'] == 1) ? $campus['campus_name'] : $campus['campus_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?> -->
                    <?php endforeach; ?>
                </select>
        </div>

        <div class="form-group" id="departmentSelection" style="width:100%; display:none;">
                <label for="department" style="width:100%;">Department:</label>
                <select id="department" name="department" style="width:100%; padding:10px; text-transform: capitalize;"> 
                <?php foreach ($departments as $department): ?>  
                        <?php if ($department['id'] == $user['evsu_department_id']): ?>
                            <option value="<?= $department['id'] ?>" selected
                            style="<?= ($department['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($department['status'] == 1) ? $department['department_name'] : $department['department_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?> 
                        <!-- <?php if ($department['id'] != $user['evsu_department_id']): ?>
                            <option value="<?= $department['id'] ?>" 
                            style="<?= ($department['status'] == 1) ? 'color:black;' : 'color:red;' ?> font-size:18px;  text-transform: capitalize;"> 
                            <?= ($department['status'] == 1) ? $department['department_name'] : $department['department_name'] . ' (Inactive)' ?>
                            </option>
                        <?php endif; ?>  -->
                <?php endforeach; ?>
                </select>
        </div>


        <div class="form-group" style="width: 100%;">
            <input type="submit" value="UPDATE DATA "   >
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/evsu_users') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Update Form
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Update Form
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script>
        var role =   document.getElementById('role').value;
        var campusSelection = document.getElementById('campusSelection');
        var departmentSelection = document.getElementById('departmentSelection');

        if (role === '2') {
            campusSelection.style.display = 'block';
            departmentSelection.style.display = 'block';
        } else {
            campusSelection.style.display = 'none';
            departmentSelection.style.display = 'none';
        }


        document.getElementById('role').addEventListener('change', function() {
            var role =  this.value;
            var campusSelection = document.getElementById('campusSelection');
            var departmentSelection = document.getElementById('departmentSelection');

            if (role === '2') {
                campusSelection.style.display = 'block';
                departmentSelection.style.display = 'block';
            } else {
                campusSelection.style.display = 'none';
                departmentSelection.style.display = 'none';
            }
        });
    </script>
<?= $this->endSection() ?> 







