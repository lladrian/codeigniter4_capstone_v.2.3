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

class CashierControllerREST extends ResourceController
{
    public function index()
    {
        $CashierModel = new CashierModel();

        $cashier = $CashierModel->select('cashiers.*, roles.*')
        ->join('roles', 'roles.id = cashiers.role_id')
        ->groupBy('cashiers.id')
        ->findAll();
      
        $data = [
            'cashiers' => $cashier
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $CashierModel = new CashierModel();
        $item = $CashierModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $CashierModel = new CashierModel();
        $data = $this->request->getPost();
        if (!$CashierModel->save($data)) {
            return $this->failValidationErrors($CashierModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $CashierModel = new CashierModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$CashierModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$CashierModel->update($id, $data)) {
            return $this->failValidationErrors($CashierModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $CashierModel = new CashierModel();

        if (!$CashierModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}
