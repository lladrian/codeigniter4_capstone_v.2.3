<?php
namespace App\Controllers\API;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;



use App\Models\AdminModel;
use App\Models\CashierModel;
use App\Models\DepartmentModel;
use App\Models\HeadDepartmentModel;
use App\Models\StudentModel;
use App\Models\RegistrarModel;
use App\Models\CourseModel;
use App\Models\InstructorModel;
use App\Models\RoleModel;


class DashboardControllerREST extends ResourceController
{

        public function index()
    {
        $AdminModel = new AdminModel();
        $CashierModel = new CashierModel();
        $DepartmentModel = new DepartmentModel();
        $HeadDepartmentModel = new HeadDepartmentModel();
        $StudentModel = new StudentModel();
        $RegistrarModel = new RegistrarModel();
        $CourseModel = new CourseModel();
        $InstructorModel = new InstructorModel();
        $RoleModel = new RoleModel();


        $pending_head_departmentCount = $HeadDepartmentModel->where('status', 0)->countAllResults();
        $pending_cashierCount = $CashierModel->where('status', 0)->countAllResults();
        $pending_registrarCount = $RegistrarModel->where('status', 0)->countAllResults();
        $pending_instructorCount = $InstructorModel->where('status', 0)->countAllResults();

        $adminCount = $AdminModel->countAllResults();
        $studentCount = $StudentModel->countAllResults();
        $cashierCount = $CashierModel->where('status', 1)->countAllResults();
        $head_departmentCount = $HeadDepartmentModel->where('status', 1)->countAllResults();
        $registrarCount = $RegistrarModel->where('status', 1)->countAllResults();
        $instructorCount = $InstructorModel->where('status', 1)->countAllResults();

        $roleCount = $RoleModel->countAllResults();
        $departmentCount = $DepartmentModel->countAllResults();
        $courseCount = $CourseModel->countAllResults();

      
        $data = [
            'pending_head_departmentCount' => $pending_head_departmentCount,
            'pending_cashierCount' => $pending_cashierCount,
            'pending_registrarCount' => $pending_registrarCount,
            'pending_instructorCount' => $pending_instructorCount,
            'adminCount' => $adminCount,
            'studentCount' => $studentCount,
            'cashierCount' => $cashierCount,
            'head_departmentCount' => $head_departmentCount,
            'registrarCount' => $registrarCount,
            'instructorCount' => $instructorCount,
            'departmentCount' => $departmentCount,
            'courseCount' => $courseCount,
            'roleCount' => $roleCount
        ];

        return $this->respond($data);
    }

    public function show_profile($username)
    {  
        $AdminModel = new AdminModel();
        $CashierModel = new CashierModel();
        $HeadDepartmentModel = new HeadDepartmentModel();
        $InstructorModel = new InstructorModel();
        $StudentModel = new StudentModel();
        $RegistrarModel = new RegistrarModel();
       
        $admin = $AdminModel->where('username', $username)->first();
        $cashier = $CashierModel->where('username', $username)->first();
        $head_department = $HeadDepartmentModel->where('username', $username)->first();
        $instructor = $InstructorModel->where('username', $username)->first();
        $registrar = $RegistrarModel->where('username', $username)->first();
        $student = $StudentModel->where('username', $username)->first();

        if ($admin) {
            return $this->respond($admin);
        }
        
        if ($cashier) {
            return $this->respond($cashier);
        }
        if ($head_department) {
            return $this->respond($head_department);
        }
        
        if ($instructor) {
            return $this->respond($instructor);
        }
        if ($registrar) {
            return $this->respond($registrar);
        }
        if ($student) {
            return $this->respond($student);
        }

    }
    
    public function update_profile()
    {        
        $AdminModel = new AdminModel();
        $CashierModel = new CashierModel();
        $HeadDepartmentModel = new HeadDepartmentModel();
        $InstructorModel = new InstructorModel();
        $StudentModel = new StudentModel();
        $RegistrarModel = new RegistrarModel();


        $input = $this->request->getPost();

        $admin = $AdminModel->where('username', $input['username'])->first();
        $cashier = $CashierModel->where('username', $input['username'])->first();
        $head_department = $HeadDepartmentModel->where('username', $input['username'])->first();
        $instructor = $InstructorModel->where('username', $input['username'])->first();
        $registrar = $RegistrarModel->where('username', $input['username'])->first();

            if($input['password'] != NULL) {
                $userData = [
                    'fullname' => $input['fullname'],
                    'username' => $input['username'],
                    'email'    => $input['email'],
                    'password' => password_hash($input['password'], PASSWORD_DEFAULT)
                ];

                if ($admin) {
                    if (!$AdminModel->update($admin['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($AdminModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($cashier) {
                    if (!$CashierModel->update($cashier['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($CashierModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($head_department) {
                    if (!$HeadDepartmentModel->update($head_department['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($HeadDepartmentModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($instructor) {
                    if (!$InstructorModel->update($instructor['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($InstructorModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($registrar) {
                    if (!$RegistrarModel->update($registrar['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($RegistrarModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

            } else {
                $userData = [
                    'fullname' => $input['fullname'],
                    'username' => $input['username'],
                    'email'    => $input['email']
                ];

                if ($admin) {
                    if (!$AdminModel->update($admin['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($AdminModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($cashier) {
                    if (!$CashierModel->update($cashier['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($CashierModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($head_department) {
                    if (!$HeadDepartmentModel->update($head_department['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($HeadDepartmentModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($instructor) {
                    if (!$InstructorModel->update($instructor['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($InstructorModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }

                if ($registrar) {
                    if (!$RegistrarModel->update($registrar['id'], $userData)) {
                        // Handle validation errors
                        return $this->failValidationErrors($RegistrarModel->errors());
                    }
                    return $this->respondUpdated($userData);
                }
      
            } 
        }
    
}
