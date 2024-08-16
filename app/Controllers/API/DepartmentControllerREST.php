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

class DepartmentControllerREST extends ResourceController
{
    public function index()
    {
        $DepartmentModel = new DepartmentModel();

        $department = $DepartmentModel->findAll();
      
        $data = [
            'departments' => $department
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $DepartmentModel = new DepartmentModel();
        $item = $DepartmentModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $DepartmentModel = new DepartmentModel();
        $data = $this->request->getPost();
        if (!$DepartmentModel->save($data)) {
            return $this->failValidationErrors($DepartmentModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $DepartmentModel = new DepartmentModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$DepartmentModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$DepartmentModel->update($id, $data)) {
            return $this->failValidationErrors($DepartmentModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $DepartmentModel = new DepartmentModel();

        if (!$DepartmentModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}
