<?php
    // Retrieve the 'user' session variable
    $user = session('user');     
    $count = 1;   
?>
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

     <!-- Begin Page Content -->
     <div class="container-fluid" style="padding:20px;">
                    <!-- Content Row -->
                    
                    <div class="row">
                        <div style="width:100%;">
                        <div style="margin-bottom:30px; background:red; width:100%;">
                            <!-- <a class="btn btn-success btn-block" 
                            style="width:100%;" 
                            href="<?= base_url('/dashboard/evsu_user/add_user') ?>">
                            INSERT DATA</a>         -->
                    
                            <?php if($can_create_user == 1): ?>
                                <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/add_user') ?>">
                                    <button type="submit" style="width:100%;" class="btn  btn-success ">CREATE USER</button>
                                </form>
                           <?php else: ?>
                                <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/add_user') ?>">
                                    <button disabled type="submit" style="width:100%;" class="btn  btn-success ">CREATE USER</button>
                                </form>
                           <?php endif; ?>
                        </div>

                        <?php if ($user['is_super_admin'] == 1): ?>
                        <div class="btn-container">
                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="allCampus" style="width:100%;">
                                         All
                                    </button>
                            </div>
                            <!-- <div style="margin: 0px 10px 0px 0px;">
                                    <form method="post" action="<?= base_url('/dashboard/showAllData') ?>">
                                     <button  type="submit"  class="btn  btn-info " id="allCampus" style="width:100%;">
                                         All Form
                                    </button>
                                    </form>
                            </div> -->
                           
                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="ormocCampus" style="width:100%;">
                                         Ormoc Campus
                                    </button>
                            </div>

                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="carigaraCampus" style="width:100%;">
                                        Carigara Campus
                                    </button>
                            </div>

                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="dulagCampus" style="width:100%;">
                                        Dulag Campus
                                    </button>
                            </div>

                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="burauenCampus" style="width:100%;">
                                        Burauen Campus
                                    </button>
                            </div>

                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="tanauanCampus" style="width:100%;">
                                        Tanauan Campus
                                    </button>
                            </div>

                            <div style="margin: 0px 10px 0px 0px;">
                                    <button  type="submit"  class="btn  btn-info " id="taclobanCampus" style="width:100%;">
                                        Tacloban Campus
                                    </button>
                            </div>
                        </div>
                        <?php endif; ?>
                            <!-- <div style="margin: 0px 10px 0px 0px;">
                                    <form method="post" action="<?= base_url('/dashboard/evsu_user/filterData') ?>">
                                    <input type="text" name="campus_id" value="1">
                                    <button  type="submit"  class="btn  btn-info " id="allCampus" style="width:100%;">
                                         Ormoc Campus 2
                                    </button>
                                    </form>
                            </div>   -->

                            <!-- <form action="/dashboard/evsu_user/filterData" method="post">
        <input type="submit" value="Submit">
    </form> -->
                        <table border="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <!-- <th>Role Name</th> -->
                                    <th>Campus Name</th>
                                    <th>Department Name</th>
                                    <th>Latest Login</th>
                                    <th>First Login</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="EVSUUserBody">
                                  <?php foreach ($users as $user): ?>
                                        <?php
                                            if($user['max_login_time'] != "not yet") {
                                                $latest_login = date('F j, Y - h:i A', strtotime($user['max_login_time']));
                                            } else {
                                                $latest_login = "NOT YET";
                                            }
                                            if($user['min_login_time'] != "not yet") {
                                                $first_login = date('F j, Y - h:i A', strtotime($user['min_login_time']));
                                            } else {
                                                $first_login = "NOT YET";
                                            }
                                        ?>
                                        <td style="text-align: center;"><?= $count ?></td>
                                        <td><?= $user['firstname'] ?></td>
                                        <td><?= $user['lastname'] ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <!-- <td style=" text-transform: capitalize;"><?= $user['role_name'] ?></td> -->
                                        <td><?= $user['campus_name'] ?></td>
                                        <td><?= $user['department_name'] ?></td>
                                        <td><?= $latest_login?></td>
                                        <td><?= $first_login?></td>
                                        <td style="width:10%;">
                                            <div style="display:inline-flex; width:100%;">
                                                    <?php if($add_roles_user == 1): ?>
                                                        <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user_permission/edit/'.$user['user_id']) ?>">
                                                            <button type="submit" class="btn  btn-secondary">ROLES</button>
                                                        </form>  
                                                    <?php else: ?>
                                                        <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_ser_permission/edit/'.$user['user_id']) ?>">
                                                            <button disabled type="submit" class="btn  btn-secondary">ROLES</button>
                                                        </form> 
                                                    <?php endif; ?>

                                                    <?php if($can_update_user == 1): ?>
                                                        <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/'.$user['user_id']) ?>">
                                                            <button type="submit" class="btn  btn-primary deletebtn">EDIT</button>
                                                        </form>  
                                                    <?php else: ?>
                                                        <form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/'.$user['user_id']) ?>">
                                                            <button disabled type="submit" class="btn  btn-primary deletebtn">EDIT</button>
                                                        </form>  
                                                    <?php endif; ?>
                                                   

                                                    <?php if($can_delete_user == 1): ?>
                                                        <form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/'.$user['user_id']) ?>">
                                                            <?= csrf_field() ?>   
                                                            <button type="submit" class="btn btn-danger deletebtn">DELETE</button>
                                                        </form>     
                                                    <?php else: ?>
                                                        <form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/'.$user['user_id']) ?>">
                                                            <?= csrf_field() ?>
                                                            <button disabled type="submit" class="btn btn-danger deletebtn">DELETE</button>
                                                        </form>   
                                                    <?php endif; ?>
                                                  
                                                   
                                            </div>                            
                                        </td>
                                    </tr>         
                                <?php $count++; endforeach; ?>  
                            </tbody>
                        </table>
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
        
    
    <!-- jQuery CDN (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function AllDataForm() {
            fetch('<?= base_url("/dashboard/evsu_user/showAllData") ?>', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
            let count = 1;
       
                document.getElementById('EVSUUserBody').innerHTML = '';
                data.forEach(function(user) {
              
                    // Now you can use this function to format both max_login_time and min_login_time
                    let formattedMaxLoginTime = formatDate(user.max_login_time);
                    let formattedMinLoginTime = formatDate(user.min_login_time);

                    let row = '<tr>' +
                    '<td style="text-align:center;">' + count + '</td>' +
                    '<td>' + user.firstname + '</td>' +
                    '<td>' + user.lastname + '</td>' +
                    '<td>' + user.username + '</td>' +
                    '<td>' + user.email + '</td>' +
                    // '<td>' + user.role_name + '</td>' +
                    '<td>' + user.campus_name + '</td>' +
                    '<td>' + user.department_name + '</td>' +
                    '<td>' + (user.max_login_time != 'not yet' ? formattedMaxLoginTime : "NOT YET") + '</td>' +
                    '<td>' + (user.min_login_time != 'not yet' ? formattedMinLoginTime : "NOT YET") + '</td>' +
                    '<td style="width:10%;">' +
                    '<div style="display:inline-flex; width:100%;">';
                        <?php if($add_roles_user == 1): ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user_permission/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user_permission/edit/') ?>' + user.user_id + '">' +
                                '<button disabled type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                        <?php endif; ?>

                        <?php if($can_update_user == 1): ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/') ?>' + user.user_id + '">' +
                                '<button disabled type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                        <?php endif; ?>

                        <?php if($can_delete_user == 1): ?>
                            row += '<form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button disabled type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                        <?php endif; ?>
                    row += '</div>' +
                        '</td>' +
                        '</tr>';
                    document.getElementById('EVSUUserBody').insertAdjacentHTML('beforeend', row);
                    count++;
                });
            })
            .catch(error => {
                alert('Error fetching upload history.');
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('allCampus').addEventListener('click', function() {
                let allCampus = AllDataForm();
            });
        });
    </script>
   

    <script>

        function formatDate(dateString) {
                        let inputDate = new Date(dateString);
                        // Define months array for month name mapping
                        const months = [
                            "January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                        ];

                        // Get month, day, year, hour, and minutes
                        let month = months[inputDate.getMonth()];
                        let day = inputDate.getDate();
                        let year = inputDate.getFullYear();
                        let hour = inputDate.getHours();
                        let minutes = inputDate.getMinutes();

                        // Format hour into 12-hour format and append AM/PM
                        let period = hour >= 12 ? 'PM' : 'AM';
                        hour = hour % 12;
                        hour = hour ? hour : 12; // Handle midnight (0 hours)

                        // Pad minutes with leading zero if necessary
                        minutes = minutes < 10 ? '0' + minutes : minutes;

                        // Construct the formatted date string
                        let formattedDate = month + ' ' + day + ', ' + year + ' - ' + hour + ':' + minutes + ' ' + period;
                        
                        return formattedDate;
        }

        function DataForm(campus_id) {
            const data = {
                campus_id: campus_id
            };
            fetch('<?= base_url("/dashboard/evsu_user/filterData") ?>', {
                method: 'POST',
                body: JSON.stringify(data) 
            })
            .then(response => response.json())
            .then(data => {
            // alert(1);
            let count = 1;
                document.getElementById('EVSUUserBody').innerHTML = '';
                data.forEach(function(user) {
                
                    let formattedMaxLoginTime = formatDate(user.max_login_time);
                    let formattedMinLoginTime = formatDate(user.min_login_time);

                    let row = '<tr>' +
                    '<td style="text-align:center;">' +  count + '</td>' +
                    '<td>' + user.firstname + '</td>' +
                    '<td>' + user.lastname + '</td>' +
                    '<td>' + user.username + '</td>' +
                    '<td>' + user.email + '</td>' +
                    // '<td>' + user.role_name + '</td>' +
                    '<td>' + user.campus_name + '</td>' +
                    '<td>' + user.department_name + '</td>' +
                    '<td>' + (user.max_login_time != 'not yet' ? formattedMaxLoginTime : "NOT YET") + '</td>' +
                    '<td>' + (user.min_login_time != 'not yet' ? formattedMinLoginTime : "NOT YET") + '</td>' +
                    '<td style="width:10%;">' +
                    '<div style="display:inline-flex; width:100%;">';
                        <?php if($add_roles_user == 1): ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user_permission/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user_permission/edit/') ?>' + user.user_id + '">' +
                                '<button disabled type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                        <?php endif; ?>

                        <?php if($can_update_user == 1): ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/evsu_user/edit/') ?>' + user.user_id + '">' +
                                '<button disabled type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                        <?php endif; ?>

                        <?php if($can_delete_user == 1): ?>
                            row += '<form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                        <?php else: ?>
                            row += '<form method="POST" action="<?= base_url('/dashboard/evsu_user/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button disabled type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                        <?php endif; ?>
                    row += '</div>' +
                        '</td>' +
                        '</tr>';
                    document.getElementById('EVSUUserBody').insertAdjacentHTML('beforeend', row);
                    count++;
                });
            })
            .catch(error => {
                alert('Error fetching.'+error);
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('ormocCampus').addEventListener('click', function() {
                let ormocCampus  = DataForm(1);
            });
            document.getElementById('carigaraCampus').addEventListener('click', function() {
                let carigaraCampus  = DataForm(2);
            });
            document.getElementById('dulagCampus').addEventListener('click', function() {
                let dulagCampus  = DataForm(3);
            });
            document.getElementById('burauenCampus').addEventListener('click', function() {
                let burauenCampus  = DataForm(4);
            });
            document.getElementById('tanauanCampus').addEventListener('click', function() {
                let tanauanCampus  = DataForm(5);
            });
            document.getElementById('taclobanCampus').addEventListener('click', function() {
                let taclobanCampus  = DataForm(6);
            });
        });
    </script>

    <script src="<?= base_url('jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('jquery-easing/jquery.easing.min.js') ?>"></script>
<?= $this->endSection() ?>


<?= $this->section('table_name') ?>
    EVSU User Table
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
    EVSU User Table
<?= $this->endSection() ?>