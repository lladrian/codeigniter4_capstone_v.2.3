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


class HeadDepartmentControllerREST extends ResourceController
{
    public function index()
    {
        $HeadDepartmentModel = new HeadDepartmentModel();

        $head_department = $HeadDepartmentModel->select('head_departments.*, roles.*')
        ->join('roles', 'roles.id = head_departments.role_id')
        ->groupBy('head_departments.id')
        ->findAll();
      
        $data = [
            'head_departments' => $head_department
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $HeadDepartmentModel = new HeadDepartmentModel();
        $item = $HeadDepartmentModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $HeadDepartmentModel = new HeadDepartmentModel();
        $data = $this->request->getPost();
        if (!$HeadDepartmentModel->save($data)) {
            return $this->failValidationErrors($HeadDepartmentModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $HeadDepartmentModel = new HeadDepartmentModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$HeadDepartmentModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$HeadDepartmentModel->update($id, $data)) {
            return $this->failValidationErrors($HeadDepartmentModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $HeadDepartmentModel = new HeadDepartmentModel();

        if (!$HeadDepartmentModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

