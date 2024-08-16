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



class StudentControllerREST extends ResourceController
{
    public function index()
    {
        $StudentModel = new StudentModel();

        $student = $StudentModel->select('students.*, roles.*')
        ->join('roles', 'roles.id = students.role_id')
        ->groupBy('students.id')
        ->findAll();
      
        $data = [
            'students' => $student
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $StudentModel = new StudentModel();
        $item = $StudentModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $StudentModel = new StudentModel();
        $data = $this->request->getPost();
        if (!$StudentModel->save($data)) {
            return $this->failValidationErrors($StudentModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $StudentModel = new StudentModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$StudentModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$StudentModel->update($id, $data)) {
            return $this->failValidationErrors($StudentModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $StudentModel = new StudentModel();

        if (!$StudentModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

