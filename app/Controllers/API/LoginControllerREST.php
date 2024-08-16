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

use CodeIgniter\Session\Session;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use App\Helpers\JwtHelper;


class LoginControllerREST extends ResourceController
{


    public function staff_authenticate()
    {
        $CashierModel = new CashierModel();
        $HeadDepartmentModel = new HeadDepartmentModel();
        $RegistrarModel = new RegistrarModel();
        $InstructorModel = new InstructorModel();

        $input = $this->request->getPost();


        $validationRules = [
            'email' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return $this->respond($this->validator->getErrors());

        }
        

        $instructor = $InstructorModel->select('instructors.*,roles.*,departments.*')
        ->join('roles', 'roles.id = instructors.role_id')
        ->join('departments', 'departments.id = instructors.department_id')
        ->where('instructors.email', $input['email'])   
        ->first();

        $cashier = $CashierModel->select('cashiers.*,roles.*,departments.*')
        ->join('roles', 'roles.id = cashiers.role_id')
        ->join('departments', 'departments.id = cashiers.department_id')
        ->where('cashiers.email', $input['email'])
        ->first();

        $head_department = $HeadDepartmentModel->select('head_departments.*,roles.*,departments.*')
        ->join('roles', 'roles.id = head_departments.role_id')
        ->join('departments', 'departments.id = head_departments.department_id')
        ->where('head_departments.email', $input['email'])
        ->first();

        $registrar = $RegistrarModel->select('registrars.*,roles.*,departments.*')
        ->join('roles', 'roles.id = registrars.role_id')
        ->join('departments', 'departments.id = registrars.department_id')
        ->where('registrars.email', $input['email'])
        ->first();

 


        if($cashier) {
            if ($cashier && password_verify($input['password'], $cashier['password'])) {
                $data = [
                    'user' => $cashier
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);

        }

        if($head_department) {
            if ($head_department && password_verify($input['password'], $head_department['password'])) {
                $data = [
                    'user' => $head_department
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);

        }

        if($registrar) {
            if ($registrar && password_verify($input['password'], $registrar['password'])) {
                $data = [
                    'user' => $registrar
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);

        }

        if($instructor) {
            if ($instructor && password_verify($input['password'], $instructor['password'])) {
                $data = [
                    'user' => $instructor
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);
        }

        
        $data = [
            'message' => 'Email not found.'
        ];

        return $this->respond($data);
    }



    public function admin_authenticate()
    {

        $AdminModel = new AdminModel();
        $input = $this->request->getPost();


        $validationRules = [
            'email' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return $this->respond($this->validator->getErrors());
        }


        $admin = $AdminModel->select('admins.*,roles.*')
        ->join('roles', 'roles.id = admins.role_id')
        ->where('email', $input['email'])
        ->first();


        if($admin) {
            if ($admin && password_verify($input['password'], $admin['password'])) {
                $data = [
                    'user' => $admin
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);
        }

        $data = [
            'message' => 'Email not found.'
        ];

        return $this->respond($data);
    }

    public function head_department_instructor_authenticate($head_department_email)
    {
        $InstructorModel = new InstructorModel();
       // $input = $this->request->getPost();

        $instructor = $InstructorModel->select('instructors.*,roles.*,departments.*')
        ->join('roles', 'roles.id = instructors.role_id')
        ->join('departments', 'departments.id = instructors.department_id')
        ->where('instructors.email', $head_department_email)
        ->first();


        if($instructor) {
            // if ($instructor && password_verify($input['password'], $instructor['password'])) {
            //     $data = [
            //         'user' => $instructor
            //     ];
            // } else {
            //     $data = [
            //         'message' => 'Password is incorrect.'
            //     ];
            // }
            $data = [
                'user' => $instructor
            ];

            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);
        }

        $data = [
            'message' => 'Email not found.'
        ];

        return $this->respond($data);
    }

    public function student_authenticate()
    {
        $StudentModel = new StudentModel();
        $input = $this->request->getPost();

        $validationRules = [
            'email' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return $this->respond($this->validator->getErrors());
        }

        $student = $StudentModel->select('students.*,roles.*,departments.*,courses.*')
        ->join('courses', 'courses.id = students.course_id')
        ->join('departments', 'departments.id = students.department_id')
        ->join('roles', 'roles.id = students.role_id')
        ->where('email', $input['email'])
        ->first();



        if($student) {
            if ($student && password_verify($input['password'], $student['password'])) {
                $data = [
                    'user' => $student
                ];
            } else {
                $data = [
                    'message' => 'Password is incorrect.'
                ];
            }
      
            // Generate JWT token with expiration
            $jwtToken = JwtHelper::generateToken($data, 3600); // 1 hour expiration
            return $this->respond([$jwtToken], 200);

           // return $this->respond(['token' => $jwtToken], 200);
        }

        $data = [
            'message' => 'Email not found.'
        ];

        return $this->respond($data);
    }
}
