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
                        <div style="margin-bottom:5px;">
                  
                        
                                <form method="get" style="width:100%;" action="<?= base_url('/dashboard/course/add_course') ?>">
                                    <button type="submit" style="width:100%;" class="btn  btn-success ">CREATE COURSE</button>
                                </form>
                     
                        </div>

                   
                        <!-- Button to trigger the modal -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">INSERT DATA </button> -->
                        <table border ="1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th>Course Name</th>
                                    <th>Course Abbreviation</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="EVSUUserBody">
                                <?php foreach ($courses as $course): ?> 
                                        <td style="text-align: center;"><?= $count ?></td>
                                        <td><?= $course['course_name'] ?></td>
                                        <td><?= $course['course_abbreviation'] ?></td>

                                        <td style="width:10%;">
                                            <div style="display:inline-flex; width:100%;">
                                                     
                                                        <form method="get" style="width:100%;" action="<?= base_url('/dashboard/course/edit/'.$course['id']) ?>">
                                                            <button type="submit" class="btn  btn-primary deletebtn">EDIT</button>
                                                        </form>  
                                                

                                                        <form method="POST" action="<?= base_url('/dashboard/course/delete/'.$course['id']) ?>">
                                                            <?= csrf_field() ?>   
                                                            <button type="submit" class="btn btn-danger deletebtn">DELETE</button>
                                                        </form>     
                                                 
                                            </div>                            
                                        </td>
                                    </tr>      
                                <?php  $count++; endforeach; ?>
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
                    <form method="POST" style="margin: 5px; color: white;" action="<?= base_url('/dashboard/logout') ?>">
                    <?= csrf_field() ?>
                            <button   class="btn btn-primary"  type="submit">Logout</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function AllDataForm() {
            fetch('<?= base_url("/dashboard/admin/showAllData") ?>', {
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
                    '<td>' + user.role_name + '</td>' +
                    '<td>' + user.campus_name + '</td>' +
                    '<td>' + (user.max_login_time != 'not yet' ? formattedMaxLoginTime : "NOT YET") + '</td>' +
                    '<td>' + (user.min_login_time != 'not yet' ? formattedMinLoginTime : "NOT YET") + '</td>' +
                    '<td style="width:10%;">' +
                    '<div style="display:inline-flex; width:100%;">';
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/admin_permission/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                     

                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/admin/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                   

                            row += '<form method="POST" action="<?= base_url('/dashboard/admin/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                     
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
            fetch('<?= base_url("/dashboard/admin/filterData") ?>', {
                method: 'POST',
                body: JSON.stringify(data) 
            })
            .then(response => response.json())
            .then(data => {
            // alert(1);
                let count = 1;

                document.getElementById('EVSUUserBody').innerHTML = '';
                data.forEach(function(user) {
               // alert(user);
                    let formattedMaxLoginTime = formatDate(user.max_login_time);
                    let formattedMinLoginTime = formatDate(user.min_login_time);

                    let row = '<tr>' +
                    '<td style="text-align:center;">' + count + '</td>' +
                    '<td>' + user.firstname + '</td>' +
                    '<td>' + user.lastname + '</td>' +
                    '<td>' + user.username + '</td>' +
                    '<td>' + user.email + '</td>' +
                    '<td>' + user.role_name + '</td>' +
                    '<td>' + user.campus_name + '</td>' +
                    '<td>' + (user.max_login_time != 'not yet' ? formattedMaxLoginTime : "NOT YET") + '</td>' +
                    '<td>' + (user.min_login_time != 'not yet' ? formattedMinLoginTime : "NOT YET") + '</td>' +
                    '<td style="width:10%;">' +
                    '<div style="display:inline-flex; width:100%;">';
                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/admin_permission/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-secondary">ROLES</button>' +
                                '</form>';
                      

                            row += '<form method="get" style="width:100%;" action="<?= base_url('/dashboard/admin/edit/') ?>' + user.user_id + '">' +
                                '<button type="submit" class="btn  btn-primary deletebtn">EDIT</button>' +
                                '</form>';
                       

                            row += '<form method="POST" action="<?= base_url('/dashboard/admin/delete/') ?>' + user.user_id + '">' +
                                '<?= csrf_field() ?>' +
                                '<button type="submit" class="btn btn-danger deletebtn">DELETE</button>' +
                                '</form>';
                        
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
            document.getElementById('coa_admin').addEventListener('click', function() {
                let coaAdmin  = DataForm(7);
            });
            
        });
    </script>


    <script src="<?= base_url('jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('jquery-easing/jquery.easing.min.js') ?>"></script>
<?= $this->endSection() ?>


<?= $this->section('table_name') ?>
    Course Table
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
    Course Table
<?= $this->endSection() ?>