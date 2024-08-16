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


class RoleControllerREST extends ResourceController
{
    public function index()
    {
        $RoleModel = new RoleModel();

        $role = $RoleModel->findAll();
      
        $data = [
            'roles' => $role
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $RoleModel = new RoleModel();
        $item = $RoleModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $RoleModel = new RoleModel();
        $data = $this->request->getPost();
        if (!$RoleModel->save($data)) {
            return $this->failValidationErrors($RoleModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $RoleModel = new RoleModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$RoleModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$RoleModel->update($id, $data)) {
            return $this->failValidationErrors($RoleModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $RoleModel = new RoleModel();

        if (!$RoleModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

