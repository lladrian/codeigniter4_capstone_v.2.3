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

class CourseControllerREST extends ResourceController
{
    public function index()
    {
        $CourseModel = new CourseModel();

        $course = $CourseModel->findAll();
      
        $data = [
            'courses' => $course
        ];

        return $this->respond($data);
    }
    public function show($id = null)
    {
        $CourseModel = new CourseModel();
        $item = $CourseModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $CourseModel = new CourseModel();
        $data = $this->request->getPost();
        if (!$CourseModel->save($data)) {
            return $this->failValidationErrors($CourseModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $CourseModel = new CourseModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$CourseModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$CourseModel->update($id, $data)) {
            return $this->failValidationErrors($CourseModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $CourseModel = new CourseModel();

        if (!$CourseModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}
