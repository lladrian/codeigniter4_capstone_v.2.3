<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminController::index');


$routes->group('', ['filter' => 'apikeyauth'], function ($routes) {


    $routes->get('/secure', 'API\SecureControllerREST::index');


    $routes->post('/login/staff', 'API\LoginControllerREST::staff_authenticate');
    $routes->post('/login/admin', 'API\LoginControllerREST::admin_authenticate');
    $routes->post('/login/student', 'API\LoginControllerREST::student_authenticate');
    $routes->post('/login/head_department_instructor', 'API\LoginControllerREST::head_department_instructor_authenticate');

    $routes->get('/signup/staff', 'API\SignUpControllerREST::add_staff');
    $routes->get('/signup/student', 'API\SignUpControllerREST::add_student');
    $routes->post('/signup/staff', 'API\SignUpControllerREST::staff_create');
    $routes->post('/signup/student', 'API\SignUpControllerREST::student_create');

    $routes->get('/dashboard/academic_year', 'API\AcademicYearControllerREST::index');

    $routes->get('/dashboard', 'API\DashboardControllerREST::index');
    $routes->get('/dashboard/profile/(:any)', 'API\DashboardControllerREST::show_profile/$1');
    $routes->post('/dashboard/profile', 'API\DashboardControllerREST::update_profile');


    $routes->get('/dashboard/admins', 'API\AdminControllerREST::index');
    $routes->get('/dashboard/admin/(:num)', 'API\AdminControllerREST::show/$1');
    $routes->post('/dashboard/add_admin', 'API\AdminControllerREST::create');
    $routes->post('/dashboard/update_admin/(:num)', 'API\AdminControllerREST::update/$1');
    $routes->post('/dashboard/delete_admin/(:num)', 'API\AdminControllerREST::delete/$1');


    $routes->get('/dashboard/cashiers', 'API\CashierControllerREST::index');
    $routes->get('/dashboard/cashier/(:num)', 'API\CashierControllerREST::show/$1');
    $routes->post('/dashboard/add_cashier', 'API\CashierControllerREST::create');
    $routes->post('/dashboard/update_cashier/(:num)', 'API\CashierControllerREST::update/$1');
    $routes->post('/dashboard/delete_cashier/(:num)', 'API\CashierControllerREST::delete/$1');


    $routes->get('/dashboard/head_departments', 'API\HeadDepartmentControllerREST::index');
    $routes->get('/dashboard/head_department/(:num)', 'API\HeadDepartmentControllerREST::show/$1');
    $routes->post('/dashboard/add_head_department', 'API\HeadDepartmentControllerREST::create');
    $routes->post('/dashboard/update_head_department/(:num)', 'API\HeadDepartmentControllerREST::update/$1');
    $routes->post('/dashboard/delete_head_department/(:num)', 'API\HeadDepartmentControllerREST::delete/$1');

    $routes->get('/dashboard/instructors', 'API\InstructorControllerREST::index');
    $routes->get('/dashboard/head_instructor/(:num)', 'API\InstructorControllerREST::show/$1');
    $routes->post('/dashboard/add_instructor', 'API\InstructorControllerREST::create');
    $routes->post('/dashboard/update_instructor/(:num)', 'API\InstructorControllerREST::update/$1');
    $routes->post('/dashboard/delete_instructor/(:num)', 'API\InstructorControllerREST::delete/$1');

    $routes->get('/dashboard/registrars', 'API\RegistrarControllerREST::index');
    $routes->get('/dashboard/head_registrar/(:num)', 'API\RegistrarControllerREST::show/$1');
    $routes->post('/dashboard/add_registrar', 'API\RegistrarControllerREST::create');
    $routes->post('/dashboard/update_registrar/(:num)', 'API\RegistrarControllerREST::update/$1');
    $routes->post('/dashboard/delete_registrar/(:num)', 'API\RegistrarControllerREST::delete/$1');



    $routes->get('/dashboard/students', 'API\StudentControllerREST::index');
    $routes->get('/dashboard/head_student/(:num)', 'API\StudentControllerREST::show/$1');
    $routes->post('/dashboard/add_student', 'API\StudentControllerREST::create');
    $routes->post('/dashboard/update_student/(:num)', 'API\StudentControllerREST::update/$1');
    $routes->post('/dashboard/delete_student/(:num)', 'API\StudentControllerREST::delete/$1');


    $routes->get('/dashboard/courses', 'API\CourseControllerREST::index');
    $routes->get('/dashboard/course/(:num)', 'API\CourseControllerREST::show/$1');
    $routes->post('/dashboard/add_course', 'API\CourseControllerREST::create');
    $routes->post('/dashboard/update_course/(:num)', 'API\CourseControllerREST::update/$1');
    $routes->post('/dashboard/delete_course/(:num)', 'API\CourseControllerREST::delete/$1');



    $routes->get('/dashboard/departments', 'API\DepartmentControllerREST::index');
    $routes->get('/dashboard/department/(:num)', 'API\DepartmentControllerREST::show/$1');
    $routes->post('/dashboard/add_department', 'API\DepartmentControllerREST::create');
    $routes->post('/dashboard/update_department/(:num)', 'API\DepartmentControllerREST::update/$1');
    $routes->post('/dashboard/delete_department/(:num)', 'API\DepartmentControllerREST::delete/$1');


    $routes->get('/dashboard/roles', 'API\RoleControllerREST::index');
    $routes->get('/dashboard/head_role/(:num)', 'API\RoleControllerREST::show/$1');
    $routes->post('/dashboard/add_role', 'API\RoleControllerREST::create');
    $routes->post('/dashboard/update_role/(:num)', 'API\RoleControllerREST::update/$1');
    $routes->post('/dashboard/delete_role/(:num)', 'API\RoleControllerREST::delete/$1');


    $routes->get('/dashboard/subjects', 'API\SubjectControllerREST::index');
    $routes->get('/dashboard/subject/(:num)', 'API\SubjectControllerREST::show/$1');
    $routes->post('/dashboard/add_subject', 'API\SubjectControllerREST::create');
    $routes->post('/dashboard/update_subject/(:num)', 'API\SubjectControllerREST::update/$1');
    $routes->post('/dashboard/delete_subject/(:num)', 'API\SubjectControllerREST::delete/$1');


    $routes->get('/dashboard/inc_form_request/cashier/(:num)', 'API\DisplayINCFormControllerREST::show_cashier/$1');
    $routes->get('/dashboard/inc_form_request/registrar/(:num)', 'API\DisplayINCFormControllerREST::show_registrar/$1');
    $routes->get('/dashboard/inc_form_request/head_department/(:num)', 'API\DisplayINCFormControllerREST::show_head_department/$1');
    $routes->get('/dashboard/inc_form_request/instructor/(:num)', 'API\DisplayINCFormControllerREST::show_instructor/$1');
    $routes->get('/dashboard/inc_form_request/pending_cashier/(:num)', 'API\DisplayINCFormControllerREST::show_pending_cashier/$1');
    $routes->get('/dashboard/inc_form_request/pending_registrar/(:num)', 'API\DisplayINCFormControllerREST::show_pending_registrar/$1');
    $routes->get('/dashboard/inc_form_request/pending_head_department/(:num)', 'API\DisplayINCFormControllerREST::show_pending_head_department/$1');
    $routes->get('/dashboard/inc_form_request/pending_instructor/(:num)', 'API\DisplayINCFormControllerREST::show_pending_instructor/$1');


    $routes->get('/dashboard/inc_form_requests', 'API\RequestINCFormControllerREST::index');
    $routes->get('/dashboard/inc_form_request/(:num)', 'API\RequestINCFormControllerREST::show/$1');
    $routes->get('/dashboard/inc_form_request/(:num)/(:num)', 'API\RequestINCFormControllerREST::inc_form/$1/$2');
    $routes->post('/dashboard/add_inc_form_request', 'API\RequestINCFormControllerREST::create');
    $routes->post('/dashboard/update_inc_form_request/(:num)', 'API\RequestINCFormControllerREST::update/$1');
    $routes->post('/dashboard/delete_inc_form_request/(:num)', 'API\RequestINCFormControllerREST::delete/$1');


    $routes->get('/dashboard/payments', 'API\PaymentControllerREST::index');
    $routes->get('/dashboard/webhook', 'API\PaymentControllerREST::create_webhook');

    $routes->post('/dashboard/payment/(:num)/(:num)', 'API\PaymentControllerREST::payment_online/$1/$2');
    $routes->post('/dashboard/payment/webhook', 'API\PaymentControllerREST::webhook');
});





























//$routes->get('/login/admin', 'AdminController::index');

$routes->get('/', 'LoginController::index'); // classic

$routes->get('/login/student', 'LoginController::student_login');
$routes->get('/login/admin', 'LoginController::admin_login');
$routes->get('/login/staff', 'LoginController::staff_login');


$routes->get('/signup/student', 'SignUpController::add_student');
$routes->get('/signup/staff', 'SignUpController::add_staff');
$routes->post('/signup/student/store', 'SignUpController::student_store');
$routes->post('/signup/staff/store', 'SignUpController::staff_store');



$routes->post('/login/student', 'LoginController::student_authenticate');
$routes->post('/login/admin', 'LoginController::admin_authenticate');
$routes->post('/login/staff', 'LoginController::staff_authenticate');



$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard/profile', 'DashboardController::edit_profile');
$routes->post('/dashboard/logout', 'DashboardController::logout');
$routes->post('/dashboard/profile/update/(:any)/(:num)', 'DashboardController::update_profile/$1/$2'); //update of data


$routes->get('/dashboard/admins', 'AdminController::index');
$routes->get('/dashboard/admin/add_admin', 'AdminController::add_admin');
$routes->get('/dashboard/admin/edit/(:num)', 'AdminController::edit_admin/$1');//show and about to update
$routes->post('/dashboard/admin/store', 'AdminController::store');//store of insert data
$routes->post('/dashboard/admin/update/(:num)', 'AdminController::update_admin/$1'); //update of data
$routes->post('/dashboard/admin/delete/(:num)', 'AdminController::delete_admin/$1');//delete


$routes->get('/dashboard/instructors', 'InstructorController::index');
$routes->get('/dashboard/instructor/add_instructor', 'InstructorController::add_instructor');
$routes->get('/dashboard/instructor/edit/(:num)', 'InstructorController::edit_instructor/$1');//show and about to update
$routes->post('/dashboard/instructor/store', 'InstructorController::store');//store of insert data
$routes->post('/dashboard/instructor/update/(:num)', 'InstructorController::update_instructor/$1'); //update of data
$routes->post('/dashboard/instructor/delete/(:num)', 'InstructorController::delete_instructor/$1');//delete

$routes->get('/dashboard/cashiers', 'CashierController::index');
$routes->get('/dashboard/cashier/add_cashier', 'CashierController::add_cashier');
$routes->get('/dashboard/cashier/edit/(:num)', 'CashierController::edit_cashier/$1');//show and about to update
$routes->post('/dashboard/cashier/store', 'CashierController::store');//store of insert data
$routes->post('/dashboard/cashier/update/(:num)', 'CashierController::update_cashier/$1'); //update of data
$routes->post('/dashboard/cashier/delete/(:num)', 'CashierController::delete_cashier/$1');//delete

$routes->get('/dashboard/registrars', 'RegistrarController::index');
$routes->get('/dashboard/registrar/add_registrar', 'RegistrarController::add_registrar');
$routes->get('/dashboard/registrar/edit/(:num)', 'RegistrarController::edit_registrar/$1');//show and about to update
$routes->post('/dashboard/registrar/store', 'RegistrarController::store');//store of insert data
$routes->post('/dashboard/registrar/update/(:num)', 'RegistrarController::update_registrar/$1'); //update of data
$routes->post('/dashboard/registrar/delete/(:num)', 'RegistrarController::delete_registrar/$1');//delete


$routes->get('/dashboard/head_departments', 'HeadDepartmentController::index');
$routes->get('/dashboard/head_department/add_head_department', 'HeadDepartmentController::add_head_department');
$routes->get('/dashboard/head_department/edit/(:num)', 'HeadDepartmentController::edit_head_department/$1');//show and about to update
$routes->post('/dashboard/head_department/store', 'HeadDepartmentController::store');//store of insert data
$routes->post('/dashboard/head_department/update/(:num)', 'HeadDepartmentController::update_head_department/$1'); //update of data
$routes->post('/dashboard/head_department/delete/(:num)', 'HeadDepartmentController::delete_head_department/$1');//delete




$routes->get('/dashboard/students', 'StudentController::index');
$routes->get('/dashboard/student/add_student', 'StudentController::add_student');
$routes->get('/dashboard/student/edit/(:num)', 'StudentController::edit_student/$1');//show and about to update
$routes->post('/dashboard/student/store', 'StudentController::store');//store of insert data
$routes->post('/dashboard/student/update/(:num)', 'StudentController::update_student/$1'); //update of data
$routes->post('/dashboard/student/delete/(:num)', 'StudentController::delete_student/$1');//delete

$routes->get('/dashboard/roles', 'RoleController::index');
$routes->get('/dashboard/role/add_role', 'RoleController::add_role');
$routes->get('/dashboard/role/edit/(:num)', 'RoleController::edit_role/$1');//show and about to update
$routes->post('/dashboard/role/store', 'RoleController::store');//store of insert data
$routes->post('/dashboard/role/update/(:num)', 'RoleController::update_role/$1'); //update of data
$routes->post('/dashboard/role/delete/(:num)', 'RoleController::delete_role/$1');//delete

$routes->get('/dashboard/departments', 'DepartmentController::index');
$routes->get('/dashboard/department/add_department', 'DepartmentController::add_department');
$routes->get('/dashboard/department/edit/(:num)', 'DepartmentController::edit_department/$1');//show and about to update
$routes->post('/dashboard/department/store', 'DepartmentController::store');//store of insert data
$routes->post('/dashboard/department/update/(:num)', 'DepartmentController::update_department/$1'); //update of data
$routes->post('/dashboard/department/delete/(:num)', 'DepartmentController::delete_department/$1');//delete


$routes->get('/dashboard/courses', 'CourseController::index');
$routes->get('/dashboard/course/add_course', 'CourseController::add_course');
$routes->get('/dashboard/course/edit/(:num)', 'CourseController::edit_course/$1');//show and about to update
$routes->post('/dashboard/course/store', 'CourseController::store');//store of insert data
$routes->post('/dashboard/course/update/(:num)', 'CourseController::update_course/$1'); //update of data
$routes->post('/dashboard/course/delete/(:num)', 'CourseController::delete_course/$1');//delete