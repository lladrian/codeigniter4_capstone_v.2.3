<?= $this->extend('layout/permission_form_default') ?>

<?= $this->section('content') ?>
    <div>
        <div class="form-group" style="width:100%;">
                <label for="firstname">First Name:</label>
                <span style="text-transform:capitalize;"><?= $user['firstname'] ?></span>
        </div>

        <div class="form-group" style="width:100%;">
                <label for="role_name">Role Name:</label>
                <span style="text-transform:capitalize;"><?= $user['role_name'] ?></span>
        </div> 

        <div class="form-group" style="width:100%; ">
                <label  style="width:100%;">Role Permissions:</label>
                    <div  style="width:100%; display:inline-flex; flex-wrap: wrap; ">
                        <?php foreach ($permissions_2 as $key => $permission) : ?>
                            <?php  $found = 0; ?>
                            <?php foreach ($permissions_3 as $key => $permission3) : ?>
                                <?php if ($permission3 == $permission) : ?>
                                    <form method="POST" style="margin: 5px; color: white;" action="<?= base_url('/dashboard/evsu_user_permission/delete/'.$permission['id'].'/'.$user['id']) ?>">
                                        <?= csrf_field() ?>
                                        <button disabled type="submit" style="padding: 10px; background: gray; border-color: transparent;"><?= $permission['id'] ?>. <?= $permission['permission_name'] ?></button>
                                    </form> 
                                    <?php 
                                        $found = 1;
                                        break; 
                                    ?>
                                <?php endif ?>
                            <?php endforeach; ?>
                                <?php if ($found  != 1) : ?>
                                    <form method="POST" style="margin: 5px; color: white;" action="<?= base_url('/dashboard/evsu_user_permission/delete/'.$permission['id'].'/'.$user['id']) ?>">
                                        <?= csrf_field() ?>
                                        <button  type="submit" style="padding: 10px; background: red; border-color: transparent;"><?= $permission['id'] ?>. <?= $permission['permission_name'] ?></button>
                                    </form> 
                                <?php endif ?>
                        <?php endforeach; ?>
                </div>
        </div>  

        <div class="form-group" style="width:100%;">
                <label for="category"  style="width:100%;">Permissions:</label>
                <form id="assign_form" style="width:100%;"  method="POST" action="<?= base_url('/dashboard/evsu_user_permission/store/'.$user['id']) ?>">
                <?= csrf_field() ?>
                    <select id="category" name="category"  style="width:100%; padding:10px; text-transform: capitalize; ">
                        <?php if ($permissions_1) : ?>
                            <?php foreach ($permissions_1 as $permission) : ?>
                                <option value="<?= $permission['id'] ?>" 
                                style="font-size:18px;  text-transform: capitalize;"> 
                                <?= $permission['id'] ?>. <?= $permission['permission_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </select>
                    <div style="width:100%; margin-top:10px; "> 
                        <button style="width:100%; padding:10px; border-color:#4caf50; font-size:15px;  color:white;  background: #4caf50; " type="submit">Assign</button>
                    </div>                    
                </form>
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/evsu_users') ?>" style="font-size:20px;">BACK</a>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Users Permission
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Update User Permission
<?= $this->endSection() ?>
