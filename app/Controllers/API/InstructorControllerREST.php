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


class InstructorControllerREST extends ResourceController
{
    public function index()
    {
        $InstructorModel = new InstructorModel();

        $instructor = $InstructorModel->select('instructors.*, roles.*')
        ->join('roles', 'roles.id = instructors.role_id')
        ->groupBy('instructors.id')
        ->findAll();
      
        $data = [
            'instructors' => $instructor
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $InstructorModel = new InstructorModel();
        $item = $InstructorModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $InstructorModel = new InstructorModel();
        $data = $this->request->getPost();
        if (!$InstructorModel->save($data)) {
            return $this->failValidationErrors($InstructorModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $InstructorModel = new InstructorModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$InstructorModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$InstructorModel->update($id, $data)) {
            return $this->failValidationErrors($InstructorModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $InstructorModel = new InstructorModel();

        if (!$InstructorModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

