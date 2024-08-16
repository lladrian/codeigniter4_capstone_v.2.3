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

class StudentController extends BaseController
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

        
        $db = $this->service->initializeDatabase('students', 'id');

        $query = [
            'select' => '*',
            'from'   => 'students'
        ];

       // $data['users'] = $db->fetchAll()->getResult(); //fetch all products
        $data['users']  = $db->createCustomQuery($query)->getResult();
        $data['users'] = json_decode(json_encode($data['users']), true);
//         print_r( $data['users']);
// exit;

       return view('/tables/student_table/students_table', $data);
    }


 
  


    
    public function edit_student($id) {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        $query = [
            'select' => '*',
            'from' => 'students',
            'where' => [
                'id' => 'eq.' . $id
            ]
        ];
        $db = $this->service->initializeDatabase('students', 'id');
        $data['user'] = $db->createCustomQuery($query)->getResult();
   
        $data['user'] = json_decode(json_encode($data['user'][0]), true);

        // print_r($data['user']);
        // exit;
   
        if ($data['user']) {
           return view('/tables/student_table/edit_student',$data);
        } else {
            return redirect()->to('/tables/dashboard/students')->with('error', 'User not found.');
        }
    }

    public function add_student()
    {
        // Check if user is logged in
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
   
        // Load dashboard view
        return view('/tables/student_table/add_student');
    }
    
    
    public function store()
    {
        $validation = \Config\Services::validation();
        $request = service('request');

        $validation->setRules([
            'fullname' => 'required|max_length[255]',
            'uname' => 'required|max_length[255]',
            'email' => 'required|valid_email',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]'
        ]);
      
 //print_r($request->getPost());
 //exit;
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $userData = [
                'fullname' => $request->getPost('fullname'),
                'username' => $request->getPost('uname'),
                'email' => $request->getPost('email'),
                'role_id' => 2,
                'role_name' => 'Student',
                'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $db = $this->service->initializeDatabase('students', 'id');
          
            if ($db->insert($userData)) {
                return redirect()->to('/dashboard/students')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->to('/dashboard/students')->with('error', 'Failed to add feature.');
            }
        }
    }

    
    public function update_student($id)
    {
        $validation = \Config\Services::validation();
        $request = service('request');

       
        $validation->setRules([
                    'fullname' => 'required|min_length[5]|max_length[255]',
                    'uname' => 'required|min_length[5]|max_length[255]',
                    'email' => 'required|valid_email'
        ]);

       

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {

            $userData = [
                'fullname' => $request->getPost('fullname'),
                'username' => $request->getPost('uname'),
                'email' => $request->getPost('email')
            ];

            $db = $this->service->initializeDatabase('students', 'id');
        

            if ($db->update($id, $userData)) {
                return redirect()->to('/dashboard/students')->with('success', 'Feature updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', ['Failed to update feature.']);
            }
            
        }
        return redirect()->to('/dashboard/students')->with('errors', ['Failed to update feature.']);
    }

    public function delete_student($id) {


        $query = [
            'select' => 'count',
            'from'   => 'students',
            'where' => 
            [
                'id' => 'eq.' . $id //"gt" means "greater than" (>)
            ],
            'limit' => 1 
        ];

        $db = $this->service->initializeDatabase('students', 'id');
        $countResult = $db->createCustomQuery($query)->getResult();

         if ($countResult[0]->count == 0) {
            // Feature not found, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/students')->with('error', 'Feature not found.');
        }

        if ($db->delete($id)) {
            // Deletion successful, redirect with success message
            return redirect()->to('/dashboard/students')->with('success', 'Feature deleted successfully.');
        } else {
            // Deletion failed, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/students')->with('error', 'Failed to delete feature.');
        }   
    }

  
}


