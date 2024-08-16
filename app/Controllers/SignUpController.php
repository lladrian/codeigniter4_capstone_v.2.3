<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PHPSupabase\Service;

class SignUpController extends BaseController
{

    protected $service;

    public function __construct()
   {
       $this->service = new Service(
           "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh2cWxwdGxiZWdveHFqdWN4dHBsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTk0NTI0OTUsImV4cCI6MjAzNTAyODQ5NX0.U54TZVXt1-qjKqDK6f05aCbiKfpGHAVbMBW4Wk-boRU", 
           "https://hvqlptlbegoxqjucxtpl.supabase.co"
       );
   }

    public function add_student()
    {
   
        // Load dashboard view
        return view('/signups/student_signup');
    }

    public function add_staff()
    {

         
        $db1 = $this->service->initializeDatabase('roles', 'id');
        $db2 = $this->service->initializeDatabase('departments', 'id');


        $query1 = [
            'select' => '*',
            'from'   => 'roles'
        ];
        $query2 = [
            'select' => '*',
            'from'   => 'departments'
        ];


        $data['roles']  = $db1->createCustomQuery($query1)->getResult();
        $data['departments']  = $db2->createCustomQuery($query2)->getResult();
        $data['roles'] = json_decode(json_encode($data['roles']), true);
        $data['departments'] = json_decode(json_encode($data['departments']), true);
   
        // Load dashboard view
        return view('/signups/staff_signup', $data);
    }


    
    

    public function staff_store()
    {
        $validation = \Config\Services::validation();
        $request = service('request');

        $validation->setRules([
            'fullname' => 'required|max_length[255]',
            'uname' => 'required|max_length[255]',
            'email' => 'required|valid_email',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]',
            'role_id'=> 'required',
            'department_id'=> 'required'
        ]);
      

        if (!$validation->withRequest($this->request)->run()) {
            //echo "success";
           // print_r($request->getPost());
           // exit;
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            echo "success";
            print_r($request->getPost());
            exit;
            // $userData = [
            //     'fullname' => $request->getPost('fullname'),
            //     'username' => $request->getPost('uname'),
            //     'email' => $request->getPost('email'),
            //     'role_id' => 2,
            //     'role_name' => 'Student',
            //     'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT)
            // ];

            // $db = $this->service->initializeDatabase('students', 'id');
          
            // if ($db->insert($userData)) {
            //     return redirect()->back()->withInput()->with('success', 'Feature added successfully.');
            //     //return redirect()->to('/signup/student')->with('success', 'Feature added successfully.');
            // } else {
            //     return redirect()->back()->withInput()->with('error', 'Failed to add feature.');
            //    // return redirect()->to('/signup/student')->with('error', 'Failed to add feature.');
            // }
        }
    }

    
    

    public function student_store()
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
                return redirect()->back()->withInput()->with('success', 'Feature added successfully.');
                //return redirect()->to('/signup/student')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to add feature.');
               // return redirect()->to('/signup/student')->with('error', 'Failed to add feature.');
            }
        }
    }

}
