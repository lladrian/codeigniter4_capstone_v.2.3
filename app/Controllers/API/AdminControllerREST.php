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

use App\Controllers\BaseController;
use CodeIgniter\Controller;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;


class AdminControllerREST extends ResourceController
{
    public function index()
    {
        $AdminModel = new AdminModel();


        $admin = $AdminModel->select('admins.*, roles.*')
        ->join('roles', 'roles.id = admins.role_id')
        ->groupBy('admins.id')
        ->findAll();
      
        $data = [
            'admins' => $admin
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $AdminModel = new AdminModel();
        $item = $AdminModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $AdminModel = new AdminModel();
        $input = $this->request->getPost();

            $validationRules = [
                'email' => 'required|is_unique[registrars.email]|is_unique[cashiers.email]
                |is_unique[head_departments.email]|is_unique[instructors.email]|is_unique[admins.email]',
                'password' => 'required',
                'fullname' => 'required',
                'username' => 'required|is_unique[registrars.username]|is_unique[cashiers.username]
                |is_unique[head_departments.username]|is_unique[instructors.username]|is_unique[admins.username]',
                'role_id' => 'required'
            ];

       
    
            if (!$this->validate($validationRules)) {
                return $this->respond(['errors' =>  $this->validator->getErrors()]);
            }

            $userData = [
                'fullname' => trim($input['fullname']),
                'username' => trim($input['username']),
                'email'    => trim($input['email']),
                'role_id'  => $input['role_id'],
                'is_admin'  => 1,
                'password' => password_hash(trim($input['password']), PASSWORD_DEFAULT)
            ];

            if (!$AdminModel->save($userData)) {
                return $this->failValidationErrors($AdminModel->errors());
            }

        return $this->respond(['success1' =>  'Your account has been successfully created.']);
        //return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $AdminModel = new AdminModel();
         $data = $this->request->getPost();
        if (!$AdminModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$AdminModel->update($id, $data)) {
            return $this->failValidationErrors($AdminModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $AdminModel = new AdminModel();

        if (!$AdminModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}
