<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw fa-2x"></i>
            <!-- Counter - Alerts -->
            <?php if (isset($unread_notification)): ?>
                <span class="badge badge-danger badge-counter"><?= $unread_notification;?></span>
            <?php else :?>
                <span class="badge badge-danger badge-counter">0</span>
            <?php endif; ?>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <?php if (isset($notifications)): ?>
            <?php foreach ($notifications as $notification): ?>
                <?php   $formatted_date = date('F j, Y - g:i A', strtotime($notification['notification_time']));?>
            <!-- <a class="dropdown-item d-flex align-items-center" style=" background-color: <?php echo $notification['status_read'] != 1 ? 'none' : ' #47080826';?>;" -->
             <!-- <a class="dropdown-item d-flex align-items-center" style=" background-color: <?php echo $notification['status_read'] != 1 ? 'none' : 'none';?>;" -->
             <?php $userIdsArray = json_decode($notification['user_id']); ?>
             <a class="dropdown-item d-flex align-items-center" style=" background-color: <?php echo $userIdsArray !== null && in_array($user['id'], $userIdsArray) ? 'none' : ' #47080826';?>;"
             href="<?php echo $result = $notification['upload_id'] != 0 ?  base_url('/dashboard/upload/comment/'.$notification['upload_id'].'/'.$notification['id'])  : "#";?>">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-bell fa-fw fa-2x"></i>  
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
            <img class="img-profile rounded-circle"
                src="<?= base_url('img/undraw_profile.svg') ?>">
                
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