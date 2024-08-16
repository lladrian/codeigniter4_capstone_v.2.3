<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Controller;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;
use Config\Services;
use App\Helpers\CaptchaHelper;


use PHPSupabase\Service;

class DepartmentController extends BaseController
{

    protected $service;

    public function __construct()
   {
       $this->service = new Service(
           "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh2cWxwdGxiZWdveHFqdWN4dHBsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTk0NTI0OTUsImV4cCI6MjAzNTAyODQ5NX0.U54TZVXt1-qjKqDK6f05aCbiKfpGHAVbMBW4Wk-boRU", 
           "https://hvqlptlbegoxqjucxtpl.supabase.co"
       );
   }

    public function index()
    {  
        $user = session()->get('user');
         // Check if user is logged in
         if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        
        $db = $this->service->initializeDatabase('departments', 'id');

        $query = [
            'select' => '*',
            'from'   => 'departments'
        ];

       // $data['users'] = $db->fetchAll()->getResult(); //fetch all products
        $data['departments']  = $db->createCustomQuery($query)->getResult();
        $data['departments'] = json_decode(json_encode($data['departments']), true);
//         print_r( $data['users']);
// exit;

       return view('/tables/department_table/departments_table', $data);
    }


 
  


    
    public function edit_department($id) {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        $query = [
            'select' => '*',
            'from' => 'departments',
            'where' => [
                'id' => 'eq.' . $id
            ]
        ];
        $db = $this->service->initializeDatabase('departments', 'id');
        $data['department'] = $db->createCustomQuery($query)->getResult();
   
        $data['department'] = json_decode(json_encode($data['department'][0]), true);

        // print_r($data['user']);
        // exit;
   
        if ($data['department']) {
           return view('/tables/department_table/edit_department',$data);
        } else {
            return redirect()->to('/tables/dashboard/departments')->with('error', 'Department not found.');
        }
    }

    public function add_department()
    {
        // Check if user is logged in
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
   
        // Load dashboard view
        return view('/tables/department_table/add_department');
    }
    
    
    public function store()
    {
        $validation = \Config\Services::validation();
        $request = service('request');

        $validation->setRules([
            'department_name' => 'required|max_length[255]'
        ]);
      
 //print_r($request->getPost());
 //exit;
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $departmentData = [
                'department_name' =>  $request->getPost('department_name')
            ];

            $db = $this->service->initializeDatabase('departments', 'id');
          
            if ($db->insert($departmentData)) {
                return redirect()->to('/dashboard/departments')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->to('/dashboard/departments')->with('error', 'Failed to add feature.');
            }
        }
    }

    
    public function update_department($id)
    {
        $validation = \Config\Services::validation();
        $request = service('request');

       
        $validation->setRules([
            'department_name' => 'required|max_length[255]'
        ]);

       
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {

            $departmentData = [
                'department_name' =>  $request->getPost('department_name')
            ];

            $db = $this->service->initializeDatabase('departments', 'id');
        

            if ($db->update($id, $departmentData)) {
                return redirect()->to('/dashboard/departments')->with('success', 'Feature updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', ['Failed to update feature.']);
            }
            
        }
        return redirect()->to('/dashboard/departments')->with('errors', ['Failed to update feature.']);
    }

    public function delete_department($id) {


        $query = [
            'select' => 'count',
            'from'   => 'departments',
            'where' => 
            [
                'id' => 'eq.' . $id //"gt" means "greater than" (>)
            ],
            'limit' => 1 
        ];

        $db = $this->service->initializeDatabase('departments', 'id');
        $countResult = $db->createCustomQuery($query)->getResult();

         if ($countResult[0]->count == 0) {
            // Feature not found, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/departments')->with('error', 'Feature not found.');
        }

        if ($db->delete($id)) {
            // Deletion successful, redirect with success message
            return redirect()->to('/dashboard/departments')->with('success', 'Feature deleted successfully.');
        } else {
            // Deletion failed, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/departments')->with('error', 'Failed to delete feature.');
        }   
    }

  
}



