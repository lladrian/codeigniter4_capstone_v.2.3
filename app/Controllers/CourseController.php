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

class CourseController extends BaseController
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
        
        
        $db = $this->service->initializeDatabase('courses', 'id');

        $query = [
            'select' => '*',
            'from'   => 'courses'
        ];

       // $data['users'] = $db->fetchAll()->getResult(); //fetch all products
        $data['courses']  = $db->createCustomQuery($query)->getResult();
        $data['courses'] = json_decode(json_encode($data['courses']), true);
//         print_r( $data['users']);
// exit;

       return view('/tables/course_table/courses_table', $data);
    }


 
  


    
    public function edit_course($id) {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        $query = [
            'select' => '*',
            'from' => 'courses',
            'where' => [
                'id' => 'eq.' . $id
            ]
        ];
        $db = $this->service->initializeDatabase('courses', 'id');
        $data['course'] = $db->createCustomQuery($query)->getResult();
        $data['course'] = json_decode(json_encode($data['course'][0]), true);

        // print_r($data['user']);
        // exit;
   
        if ($data['course']) {
           return view('/tables/course_table/edit_course',$data);
        } else {
            return redirect()->to('/tables/dashboard/courses')->with('error', 'Course not found.');
        }
    }

    public function add_course()
    {
        // Check if user is logged in
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
   
        // Load dashboard view
        return view('/tables/course_table/add_course');
    }
    
    
    public function store()
    {
        $validation = \Config\Services::validation();
        $request = service('request');

        $validation->setRules([
            'course_name' => 'required|max_length[255]'
        ]);
      
 //print_r($request->getPost());
 //exit;
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $courseData = [
                'course_name' =>  $request->getPost('course_name')
            ];

            $db = $this->service->initializeDatabase('courses', 'id');
          
            if ($db->insert($courseData)) {
                return redirect()->to('/dashboard/courses')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->to('/dashboard/courses')->with('error', 'Failed to add feature.');
            }
        }
    }

    
    public function update_course($id)
    {
        $validation = \Config\Services::validation();
        $request = service('request');

       
        $validation->setRules([
            'course_name' => 'required|max_length[255]'
        ]);

       
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {

            $courseData = [
                'course_name' =>  $request->getPost('course_name')
            ];

            $db = $this->service->initializeDatabase('courses', 'id');
        

            if ($db->update($id, $courseData)) {
                return redirect()->to('/dashboard/courses')->with('success', 'Feature updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', ['Failed to update feature.']);
            }
            
        }
        return redirect()->to('/dashboard/courses')->with('errors', ['Failed to update feature.']);
    }

    public function delete_course($id) {


        $query = [
            'select' => 'count',
            'from'   => 'courses',
            'where' => 
            [
                'id' => 'eq.' . $id //"gt" means "greater than" (>)
            ],
            'limit' => 1 
        ];

        $db = $this->service->initializeDatabase('courses', 'id');
        $countResult = $db->createCustomQuery($query)->getResult();

         if ($countResult[0]->count == 0) {
            // Feature not found, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/courses')->with('error', 'Feature not found.');
        }

        if ($db->delete($id)) {
            // Deletion successful, redirect with success message
            return redirect()->to('/dashboard/courses')->with('success', 'Feature deleted successfully.');
        } else {
            // Deletion failed, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/courses')->with('error', 'Failed to delete feature.');
        }   
    }

  
}




