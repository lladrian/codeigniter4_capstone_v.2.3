<?php
    // Retrieve the 'user' session variable
    $user = session('user');        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="short cut icon" types="x-icon" href="<?= base_url('/assets/computer_studies.png') ?>"/>


    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/sb-admin-2.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/bf7d389ac4.js" crossorigin="anonymous"></script>
    <title>COA Document Tracking System</title>
    <!-- <title><?= $this->renderSection('page_title', true) ?></title> -->
    <!-- Include your CSS and other meta tags here -->
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: wheat; */
        }
        .wrapper-registration-form {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }
        .registration-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .registration-form > form {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .registration-form > form > div {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            width: 48%;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            color: #fff;
            cursor: pointer;
            background-color: #4caf50;
        }

        .form-group input[type="submit"]:hover {
            color: #fff;
        }



        .form-group .checkbox-group {
            display: flex;
            align-items: center;
        }

        .form-group input[type="checkbox"] {
            margin-right: 5px;
        }
        button:disabled {
            opacity: 0.5; /* Example: Reduce opacity to visually indicate disabled state */
            cursor: not-allowed; /* Example: Change cursor to indicate non-interactivity */
        }
        .default {
            cursor: default;
        }
        .modal-header.text-center {
            text-align: center;
        }
        .btn-container {
            display: inline-flex;
            width: 100%;
            margin-bottom: 15px;
        }
        .logo img {
    width: 60px; /* Adjust the width of the logo as needed */
}
</style>
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('layout/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
           <!-- Topbar -->
            <nav  style="display: flex; justify-content:space-between;    align-items:center; " class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div style="background:none; min-width:475px;">
                <h1 style="font-weight:bold; color:black;">
                    <?= $this->renderSection('table_name') ?>
                </h1>
            </div>

            <!-- <div style="background:none; min-width:130px;"><h1 style="font-weight:bold; color:black;">Role Table</h1></div> -->
            <div style="width:60%; height:100%;   display:inline-flex; justify-content:center; align-items:center;">
            <?php if(session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
            <div id="error-container">
                <?php if(session()->getFlashdata('success')): ?>
                    <!-- Display the success message -->
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('error')): ?>
                    <!-- Display the success message -->
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <script>
                    // Automatically close the error message after 5 seconds (adjust as needed)
                    setTimeout(function() {
                        document.getElementById('error-container').style.display = 'none';
                    }, 4000); // 5000 milliseconds = 5 seconds
                </script>
            </div>
            <?php endif; ?>
            </div>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ">
            <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw fa-2x"></i>
                        <?php if (isset($unread_notification)): ?>
                            <span class="badge badge-danger badge-counter"><?= $unread_notification;?></span>
                        <?php else :?>
                            <span class="badge badge-danger badge-counter">0</span>
                        <?php endif; ?>
                        <!-- Counter - Alerts -->
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>         
                        <?php if (isset($notifications)): ?>
                        <?php foreach ($notifications as $notification): ?>
                        <?php       
                            $formatted_date = date('F j, Y - g:i A', strtotime($notification['notification_time']));          
                            $usersArrayString = $notification['username'];
                            $usersArrayString = preg_replace('/(\w+)/', '"$1"', $usersArrayString);
                            $userIdsArray = json_decode($usersArrayString, true); // true for associative arra
                        ?>
                        <a class="dropdown-item d-flex align-items-center" style=" background-color: <?php echo $userIdsArray !== null && in_array($user['username'], $userIdsArray) ? '#47080826' : 'none';?>;"
                        href="<?php echo $result = $notification['upload_id'] != 0 ?  base_url('/dashboard/upload/comment/'.$notification['upload_id'].'/'.$notification['id'])  : "#";?>">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <!-- <i class="fas fa-bell fa-fw fa-2x"></i>   -->
                                    <i class="fas fa-bell fa-fw fa-2x"
                                                style="<?php echo $result = $notification['is_deleted'] != 0 ? "text-decoration: line-through;   text-decoration-color: red;"  : "";?>"></i>  
                                       
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500" style="<?php echo $result = $notification['is_deleted'] != 0 ? "text-decoration: line-through;"  : "";?>"><?= $formatted_date ?></div>
                                <span class="font-weight-bold" style="<?php echo $result = $notification['is_deleted'] != 0 ? "text-decoration: line-through;"  : "";?>"><?= $notification['content']; ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?> 
                        <?php endif; ?>
                        <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('notifications') ?>">Show All Alerts</a>
                    </div>
                </li>    



                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username'] ?? '' ?></span>                           
                        <img class="img-profile rounded-circle"  src="<?= base_url('/assets/coa_icon.png') ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('/dashboard/profile') ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <!-- <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a> -->
                        <a class="dropdown-item" href="<?= base_url('/login_history') ?>">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Main Content -->
            <div id="content">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layout/footer') ?>
            <!-- End of Footer -->
           
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?= $this->renderSection('script') ?>

</body>
</html>
