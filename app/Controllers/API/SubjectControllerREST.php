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
use App\Models\SubjectModel;


class SubjectControllerREST extends ResourceController
{
    public function index()
    {
        $SubjectModel = new SubjectModel();

        $subject = $SubjectModel->findAll();
      
        $data = [
            'subjects' => $subject
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $SubjectModel = new SubjectModel();
        $item = $SubjectModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $SubjectModel = new SubjectModel();
        $data = $this->request->getPost();
        if (!$SubjectModel->save($data)) {
            return $this->failValidationErrors($SubjectModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $SubjectModel = new SubjectModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$SubjectModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$SubjectModel->update($id, $data)) {
            return $this->failValidationErrors($SubjectModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $SubjectModel = new SubjectModel();

        if (!$SubjectModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

