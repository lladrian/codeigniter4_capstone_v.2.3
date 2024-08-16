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

class SignUpControllerREST extends ResourceController
{


    public function add_staff()
    {
        $RoleModel = new RoleModel();
        $DepartmentModel = new DepartmentModel();

        $role = $RoleModel->findAll();
        $department = $DepartmentModel->findAll();

      
        $data = [
            'departments' => $department,
            'roles' => $role
        ];

        return $this->respond($data);
    }

    public function add_student()
    {
        
        $CourseModel = new CourseModel();
        $DepartmentModel = new DepartmentModel();

        $course = $CourseModel->findAll();
        $department = $DepartmentModel->findAll();

      
        $data = [
            'departments' => $department,
            'courses' => $course
        ];

        return $this->respond($data);
    }
    

    public function staff_create()
    {
        $HeadDepartmentModel = new HeadDepartmentModel();
        $CashierModel = new CashierModel();
        $RegistrarModel = new RegistrarModel();
        $InstructorModel = new InstructorModel();
       // $AdminModel = new AdminModel();


        $input = $this->request->getPost();


      //  return $this->respond(trim($input['role_id']));

        // if($input['role_id'] == 1) {
        //     $validationRules = [
        //         'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
        //         |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
        //         'password' => 'required',
        //         'fullname' => 'required',
        //         'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
        //         |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
        //         'role_id' => 'required',
        //     ];

        //     $userData = [
        //         'fullname' => $input['fullname'],
        //         'username' => $input['username'],
        //         'email'    => $input['email'],
        //         'role_id'  => $input['role_id'],
        //         'password' => password_hash($input['password'], PASSWORD_DEFAULT)
        //     ];
    
        //     if (!$this->validate($validationRules)) {
        //         return $this->respond(['errors' =>  $this->validator->getErrors()]);
        //     }
        //     if (!$AdminModel->save($userData)) {
        //         return $this->failValidationErrors($AdminModel->errors());
        //     }
        //     return $this->respondCreated($userData);

        // }


        if($input['role_id'] == 2) {

            return $this->respond($input['role_id']);

            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'department_id' => 'required'
            ];

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];
    
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }
            if (!$InstructorModel->save($userData)) {
                return $this->failValidationErrors($InstructorModel->errors());
            }

            return $this->respond(['success' =>  'Your account has been successfully created.']);

           // return $this->respondCreated($userData);

        }

        if($input['role_id'] == 3) {

            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'is_head' => 'required',
                'head_id' => 'required',
                'department_id' => 'required'
            ];

            
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'is_head'  => 0,
                'head_id'  => 0,
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];
    

            if (!$CashierModel->save($userData)) {
                return $this->failValidationErrors($CashierModel->errors());
            }
            return $this->respond(['success' =>  'Your account has been successfully created.']);

            //return $this->respondCreated($userData);

        }

        if($input['role_id'] == 4) {
            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'department_id' => 'required'
            ];

     
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

            if (!$HeadDepartmentModel->save($userData)) {
                return $this->failValidationErrors($HeadDepartmentModel->errors());
            }

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];
    
            
            if ($input['is_instructor'] == 1) {
                if (!$InstructorModel->save($userData)) {
                    return $this->failValidationErrors($InstructorModel->errors());
                }
            }
            return $this->respond(['success' =>  'Your account has been successfully created.']);

            //return $this->respondCreated($userData);

         
        }
       
        if($input['role_id'] == 5) {
            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'is_head' => 'required',
                'head_id' => 'required',
                'department_id' => 'required'
            ];


      
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'is_head'  => 0,
                'head_id'  => 0,
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];


            if (!$RegistrarModel->save($userData)) {
                return $this->failValidationErrors($RegistrarModel->errors());
            }
            return $this->respond(['success' =>  'Your account has been successfully created.']);
           // return $this->respondCreated($userData);
        }

        if($input['role_id'] == 6) {
            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'is_head' => 'required',
                'head_id' => 'required',
                'department_id' => 'required'
            ];

        
    
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'is_head'  => 1,
                'head_id'  => 0,
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];


            if (!$RegistrarModel->save($userData)) {
                return $this->failValidationErrors($RegistrarModel->errors());
            }

            return $this->respond(['success' =>  'Your account has been successfully created.']);
            //return $this->respondCreated($userData);

        }

        if($input['role_id'] == 7) {
            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required',
                'is_head' => 'required',
                'head_id' => 'required',
                'department_id' => 'required'
            ];

       
    
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

                 
            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'is_head'  => 1,
                'head_id'  => 0,
                'department_id'  => $input['department_id'],
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];
            
            if (!$CashierModel->save($userData)) {
                return $this->failValidationErrors($CashierModel->errors());
            }
            return $this->respond(['success' =>  'Your account has been successfully created.']);
           // return $this->respondCreated($userData);

        }
  
        return $this->fail('Failed to signup. Please try again.');
     
    }


    public function student_create()
    {
        $StudentModel = new StudentModel();
        $input = $this->request->getPost();

        $validationRules = [
            'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
            |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
            'password' => 'required',
            'fullname' => 'required',
            'student_id_number' => 'required',
            'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
            |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
            'course_id' => 'required',
            'department_id' => 'required'
        ];

             
 

        if (!$this->validate($validationRules)) {
            return $this->respond(['errors' =>  $this->validator->getErrors()]);
        }

        $userData = [
            'fullname' => trim($input['fullname']),
            'username' => trim($input['username']),
            'email'    => trim($input['email']),
            'student_id_number'  => trim($input['student_id_number']),
            'role_id'  => 8,
            'course_id'  => $input['course_id'],
            'department_id'  => $input['department_id'],
            'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
        ];

        if (!$StudentModel->save($userData)) {
            return $this->failValidationErrors($StudentModel->errors());
        }

        return $this->respond(['success' =>  'Your account has been successfully created.']);
       // return $this->respondCreated($userData);
    }

}
