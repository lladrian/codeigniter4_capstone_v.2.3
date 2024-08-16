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

class RoleController extends BaseController
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

        
        $db = $this->service->initializeDatabase('roles', 'id');

        $query = [
            'select' => '*',
            'from'   => 'roles'
        ];

       // $data['users'] = $db->fetchAll()->getResult(); //fetch all products
        $data['roles']  = $db->createCustomQuery($query)->getResult();
        $data['roles'] = json_decode(json_encode($data['roles']), true);
//         print_r( $data['users']);
// exit;

       return view('/tables/role_table/roles_table', $data);
    }


 
  


    
    public function edit_role($id) {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        $query = [
            'select' => '*',
            'from' => 'roles',
            'where' => [
                'id' => 'eq.' . $id
            ]
        ];
        $db = $this->service->initializeDatabase('roles', 'id');
        $data['role'] = $db->createCustomQuery($query)->getResult();
   
        $data['role'] = json_decode(json_encode($data['role'][0]), true);

        // print_r($data['user']);
        // exit;
   
        if ($data['role']) {
           return view('/tables/role_table/edit_role',$data);
        } else {
            return redirect()->to('/tables/dashboard/roles')->with('error', 'Role not found.');
        }
    }

    public function add_role()
    {
        // Check if user is logged in
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
   
        // Load dashboard view
        return view('/tables/role_table/add_role');
    }
    
    
    public function store()
    {
        $validation = \Config\Services::validation();
        $request = service('request');

        $validation->setRules([
            'role_name' => 'required|max_length[255]'
        ]);
      
 //print_r($request->getPost());
 //exit;
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $roleData = [
                'role_name' =>  $request->getPost('role_name')
            ];

            $db = $this->service->initializeDatabase('roles', 'id');
          
            if ($db->insert($roleData)) {
                return redirect()->to('/dashboard/roles')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->to('/dashboard/roles')->with('error', 'Failed to add feature.');
            }
        }
    }

    
    public function update_role($id)
    {
        $validation = \Config\Services::validation();
        $request = service('request');

       
        $validation->setRules([
            'role_name' => 'required|max_length[255]'
        ]);

       
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {

            $roleData = [
                'role_name' =>  $request->getPost('role_name')
            ];

            $db = $this->service->initializeDatabase('roles', 'id');
        

            if ($db->update($id, $roleData)) {
                return redirect()->to('/dashboard/roles')->with('success', 'Feature updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', ['Failed to update feature.']);
            }
            
        }
        return redirect()->to('/dashboard/roles')->with('errors', ['Failed to update feature.']);
    }

    public function delete_role($id) {


        $query = [
            'select' => 'count',
            'from'   => 'roles',
            'where' => 
            [
                'id' => 'eq.' . $id //"gt" means "greater than" (>)
            ],
            'limit' => 1 
        ];

        $db = $this->service->initializeDatabase('roles', 'id');
        $countResult = $db->createCustomQuery($query)->getResult();

         if ($countResult[0]->count == 0) {
            // Feature not found, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/roles')->with('error', 'Feature not found.');
        }

        if ($db->delete($id)) {
            // Deletion successful, redirect with success message
            return redirect()->to('/dashboard/roles')->with('success', 'Feature deleted successfully.');
        } else {
            // Deletion failed, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/roles')->with('error', 'Failed to delete feature.');
        }   
    }

  
}



