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
use App\Models\RequestINCFormModel;



class RequestINCFormControllerREST extends ResourceController
{

    public function index()
    {
        $RequestINCFormModel = new RequestINCFormModel();
       // $request_inc_form = $RequestINCFormModel->findAll();

       // $request_inc_form = $RequestINCFormModel->select('request_inc_forms.*, students.*, 
      //  subjects.*, instructors.*, head_departments.*, cashiers.*, registrars.*')
        $request_inc_form = $RequestINCFormModel->select('request_inc_forms.*,    
        students.student_id_number, subjects.subject_code, subjects.subject_units, 
        subjects.description, 
        subjects.semester, subjects.student_year, 
        students.fullname as student_fullname,
        instructors.fullname as instructor_fullname,
        head_departments.fullname as head_department_fullname,
        cashiers.fullname as cashier_fullname,
        registrars.fullname as registrar_fullname')
        ->join('students', 'students.id = request_inc_forms.student_id')
        ->join('subjects', 'subjects.id = request_inc_forms.subject_id')
        ->join('instructors', 'instructors.id = request_inc_forms.instructor_id')
        ->join('head_departments', 'head_departments.id = request_inc_forms.head_department_id')
        ->join('cashiers', 'cashiers.id = request_inc_forms.cashier_id')
        ->join('registrars', 'registrars.id = request_inc_forms.registrar_id')
        //->join('comments', 'comments.id = request_inc_forms.comment_id')
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }


  

    public function show($id = null)
    {
        $RequestINCFormModel = new RequestINCFormModel();
        $item = $RequestINCFormModel->find($id);
        if (!$item) {
            return $this->failNotFound('Item not found');
        }
        return $this->respond($item);
    }

    public function create()
    {
        $RequestINCFormModel = new RequestINCFormModel();
        $data = $this->request->getPost();
        if (!$RequestINCFormModel->save($data)) {
            return $this->failValidationErrors($RequestINCFormModel->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $RequestINCFormModel = new RequestINCFormModel();
       // $data = $this->request->getRawInput();
        $data = $this->request->getPost();

        if (!$RequestINCFormModel->find($id)) {
            return $this->failNotFound('Item not found');
        }

        if (!$RequestINCFormModel->update($id, $data)) {
            return $this->failValidationErrors($RequestINCFormModel->errors());
        }
       return $this->respondUpdated($data);
    }

    public function delete($id = null)
    {
        $RequestINCFormModel = new RequestINCFormModel();

        if (!$RequestINCFormModel->delete($id)) {
            return $this->failNotFound('Item not found');
        }
        return $this->respondDeleted(['status' => 'Item deleted']);
    }
}

