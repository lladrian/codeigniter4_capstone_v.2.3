<?= $this->extend('layout/form_default') ?>

<?= $this->section('content') ?>
<!-- <div style="text-align: start; color:red;">  
                     <?php if (session()->has('errors')) : ?>
                        <div id="error-container">  
                        <ul>
                             <?php foreach (session('errors') as $error) : ?>
                                 <li><?= esc($error) ?></li>
                             <?php endforeach ?>
                      
                        </ul>
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('error-container').style.display = 'none';
                            }, 5000); 
                        </script>
                     <?php endif ?>
         </div> -->

    <form id="reg_form" method="post" action="<?= base_url('/dashboard/registrar/update/'.$user['id']) ?>">
    <?= csrf_field() ?>
    
        <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" value="<?= $user['fullname'] ?>" placeholder="Enter Fullname">
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

        <div class="form-group">
                <label for="role_name">Role Name:</label>
                <input class="default" readonly type="text" id="role_name" name="role_name" value="<?= $user['role_name'] ?>" placeholder="Enter Role Name">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'role_name') !== false) : ?>
                            <span class="text-danger"><?= esc($error) ?></span>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
        </div>
       


        <div class="form-group" style="width: 100%;">
            <input type="submit" value="UPDATE DATA "   >
        </div>

        <div class="form-group" style="width: 100%;">
            <a href="<?= base_url('/dashboard/admins') ?>" style="font-size:20px;">BACK</a>
        </div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Update Registrar
<?= $this->endSection() ?>

<?= $this->section('form-title') ?>
    Update Form
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var role =   document.getElementById('role').value;
    var campusSelection = document.getElementById('campusSelection');
    if (role === '3') {
        campusSelection.style.display = 'block';
    } else {
        campusSelection.style.display = 'none';
    }

    document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    var campusSelection = document.getElementById('campusSelection');
    if (role === '3') {
        campusSelection.style.display = 'block';
    } else {
        campusSelection.style.display = 'none';
    }
    });
</script>
<?= $this->endSection() ?>
