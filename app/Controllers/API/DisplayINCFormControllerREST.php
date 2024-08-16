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



class DisplayINCFormControllerREST extends ResourceController
{

   
    public function show_cashier($cashier_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.cashier_id', $cashier_primary_id)
        ->where('request_inc_forms.cashier_status', 1)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }

    public function show_instructor($instructor_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.instructor_id', $instructor_primary_id)
        ->where('request_inc_forms.instructor_status', 1)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }

    public function show_registrar($registrar_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.registrar_id', $registrar_primary_id)
        ->where('request_inc_forms.registrar_status', 1)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }
    
    public function show_head_department($head_department_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.head_department_id', $head_department_primary_id)
        ->where('request_inc_forms.head_department_status', 1)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }


    public function show_pending_cashier($cashier_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.cashier_id', $cashier_primary_id)
        ->where('request_inc_forms.cashier_status', 0)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }

    public function show_pending_instructor($instructor_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.instructor_id', $instructor_primary_id)
        ->where('request_inc_forms.instructor_status', 0)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }

    public function show_pending_registrar($registrar_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.registrar_id', $registrar_primary_id)
        ->where('request_inc_forms.registrar_status', 0)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }
    
    public function show_pending_head_department($head_department_primary_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

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
        ->where('request_inc_forms.head_department_id', $head_department_primary_id)
        ->where('request_inc_forms.head_department_status', 0)
        ->findAll();

      
        $data = [
            'request_inc_forms' => $request_inc_form
        ];

        return $this->respond($data);
    }


  
 

  
}

