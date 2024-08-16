<?php
    // Retrieve the 'user' session variable
    $user = session('user'); 
    helper('inflector');       
?>
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <?php if (isset($user['campus_name']) && $user['role_id'] == 3): ?>
        <div>
            <a class=" d-flex align-items-center justify-content-center" style="background:none;   text-transform: uppercase;  padding: 2px 0px;
            color:white;  letter-spacing: 0.05rem;  text-align: center;   font-weight: 800;
            min-height:10px;  text-decoration: none;
            font-size: 1rem;" href="#">
                <div class="sidebar-brand-text"><?= humanize($user['campus_name'], '-'); ?></div>
            </a>  
         </div>

        <hr class="sidebar-divider my-0"> 
        <?php endif; ?> 

        <!-- Sidebar - Brand -->
        <?php if (isset($user['department_name'])): ?>
        <div>
            <a class=" d-flex align-items-center justify-content-center" style="background:none;   text-transform: uppercase;  padding: 2px 0px;
            color:white;  letter-spacing: 0.05rem;  text-align: center;   font-weight: 800;
            min-height:10px;  text-decoration: none;
            font-size: 1.5rem;" href="#">
                <div class="sidebar-brand-text">
                     <?= $user['department_name']; ?> 
                </div>
            </a>  
         </div>
            	
        <hr class=" sidebar-divider my-0"> 
        <?php endif; ?>

        <div>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text">
                    <?= $user['role_name']; ?> 
                </div>
            </a>
        </div>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <i class="fas fa-fw fa-table"></i>
                <span>Other Tables</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('dashboard/courses') ?>">
                            <span>Academic Courses</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/roles') ?>">
                            <span>Roles</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/departments') ?>">
                            <span>Departments</span>
                        </a>  
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <i class="fas fa-fw fa-table"></i>
                <span>User Tables</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                        <?php if (isset($user['is_super_admin'])): ?>
                        <?php if ($user['is_super_admin'] == 1): ?>
                            <a class="collapse-item" href="<?= base_url('dashboard/admins') ?>">
                                <span>Admins</span>
                            </a>
                        <?php endif; ?>
                        <?php endif; ?>
                        <a class="collapse-item" href="<?= base_url('dashboard/students') ?>">
                            <span>Students</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/instructors') ?>">
                            <span>Instructors</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/cashiers') ?>">
                            <span>Cashiers</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/registrars') ?>">
                            <span>Registrars</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/head_departments') ?>">
                            <span>Head Departments</span>
                        </a>  
                </div>
            </div>
        </li>
      

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <!-- <i class="fas fa-fw fa-table"></i> -->
                <i class="fas   fa-fw fa-solid fa-file"></i>
                <span>Pending Users</span>
            </a>
      
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">                
                        <a class="collapse-item" href="<?= base_url('dashboard/evsu_users') ?>">
                            <span>Pending Instructor</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/evsu_users') ?>">
                            <span>Pending Cashier</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/evsu_users') ?>">
                            <span>Pending Registrar</span>
                        </a>  
                        <a class="collapse-item" href="<?= base_url('dashboard/evsu_users') ?>">
                            <span>Pending Head Department</span>
                        </a> 
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <!-- <i class="fas fa-fw fa-folder"></i> -->
                <i class="fas fa-fw  fa-cogs "></i>

                <span>Storage INFO</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                    <!-- <a class="collapse-item" href="<?= base_url('/login') ?>">Login</a> -->
                    <!-- <a class="collapse-item" href="<?= base_url('/register') ?>">Register</a> -->
                    <!-- <a class="collapse-item" href="<?= base_url('/recovery_account') ?>">Forgot Password</a>
                    <a class="collapse-item" href="<?= base_url('/dashboard/profile') ?>">Profile</a> -->
                    <div class="collapse-divider"></div>
                    <!-- <h6 class="collapse-header">Other Pages:</h6> -->
                        <a class="collapse-item" href="<?= base_url('temp_storage_info') ?>">Pending Storage</a>
                        <a class="collapse-item" href="<?= base_url('final_storage_info') ?>">Final Storage</a>
                    <!-- <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a> -->
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->