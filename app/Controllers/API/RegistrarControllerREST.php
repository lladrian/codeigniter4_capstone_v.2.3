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



class RegistrarControllerREST extends ResourceController
{
    public function index()
    {
        $RegistrarModel = new RegistrarModel();

        $registrar = $RegistrarModel->select('registrars.*, roles.*')
        ->join('roles', 'roles.id = registrars.role_id')
        ->groupBy('registrars.id')
        ->findAll();
      
        $data = [
            'registrars' => $registrar
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $RegistrarModel = new RegistrarModel();
        $item = $RegistrarModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $RegistrarModel = new RegistrarModel();
        $data = $this->request->getPost();
        if (!$RegistrarModel->save($data)) {
            return $this->failValidationErrors($RegistrarModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $RegistrarModel = new RegistrarModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$RegistrarModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$RegistrarModel->update($id, $data)) {
            return $this->failValidationErrors($RegistrarModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $RegistrarModel = new RegistrarModel();

        if (!$RegistrarModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

