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

    <form id="reg_form" method="post" action="<?= base_url('/dashboard/department/update/'.$department['id']) ?>">
    <?= csrf_field() ?>
    
        <div class="form-group" style="width:100%;">
                <label for="department_name">Department Name:</label>
                <input    type="text" id="department_name" name="department_name" value="<?= $department['department_name'] ?>" placeholder="Enter Department Name">
                <?php if (session()->has('errors')) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?php if (strpos($error, 'department_name') !== false) : ?>
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
    Update Department
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
