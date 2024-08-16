<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\AdminModel;

class AdminController extends BaseController
{

    protected $service;
    protected $modelName = 'App\Models\AdminModel';
    protected $format    = 'json';

//     public function __construct()
//    {
//        $this->service = new Service(
//            "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh2cWxwdGxiZWdveHFqdWN4dHBsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTk0NTI0OTUsImV4cCI6MjAzNTAyODQ5NX0.U54TZVXt1-qjKqDK6f05aCbiKfpGHAVbMBW4Wk-boRU", 
//            "https://hvqlptlbegoxqjucxtpl.supabase.co"
//        );
//    }
public function index2()
{   
     $AdminModel = new AdminModel();
    $data = $this->request->getPost();
    if (!$AdminModel->save($data)) {
        return $this->failValidationErrors($AdminModel->errors());
    }

    return $this->respondCreated($data);

}




    public function index()
    {  
        // $user = session()->get('user');
        //  // Check if user is logged in
        //  if (!session()->get('user')) {
        //     return redirect()->to('/'); // Redirect to login page if user is not logged in
        // }
        // if($user['is_super_admin'] == 1) {
        //     return redirect()->to('/dashboard'); 
        // }
      
        $adminModel = new AdminModel();
        $data['users'] = $adminModel->findAll();
        $data['users'] = $adminModel->select('admins.*, roles.*')
        ->join('roles', 'roles.id = admins.role_id')
        ->groupBy('admins.id')
        ->findAll();
      
        // $data = [
        //     'message' => 'success',
        //     'data' =>   $this->modelName->findAll()
        // ];
        // return $this->respond($data, 200);

       return view('welcome_message');
      // return view('/tables/admin_table/admins_table', $data);
    }


 
  


    
    public function edit_admin($id) {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }

        $query = [
            'select' => '*',
            'from' => 'admins',
            'where' => [
                'id' => 'eq.' . $id
            ]
        ];
        $db = $this->service->initializeDatabase('admins', 'id');
        $data['user'] = $db->createCustomQuery($query)->getResult();
   
        $data['user'] = json_decode(json_encode($data['user'][0]), true);

        // print_r($data['user']);
        // exit;
   
        if ($data['user']) {
           return view('/tables/admin_table/edit_admin',$data);
        } else {
            return redirect()->to('/tables/dashboard/admins')->with('error', 'User not found.');
        }
    }

    public function add_admin()
    {
        // Check if user is logged in
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
   
        // Load dashboard view
        return view('/tables/admin_table/add_admin');
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
      
 
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $userData = [
                'fullname' => $request->getPost('fullname'),
                'username' => $request->getPost('uname'),
                'email' => $request->getPost('email'),
                'is_admin' => 1,
                'role_id' => 1,
                'role_name' => 'Admin',
                'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $db = $this->service->initializeDatabase('admins', 'id');
          
            if ($db->insert($userData)) {
                return redirect()->to('/dashboard/admins')->with('success', 'Feature added successfully.');
            } else {
                return redirect()->to('/dashboard/admins')->with('error', 'Failed to add feature.');
            }
        }
    }

    
    public function update_admin($id)
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

            $db = $this->service->initializeDatabase('admins', 'id');
        

            if ($db->update($id, $userData)) {
                return redirect()->to('/dashboard/admins')->with('success', 'Feature updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', ['Failed to update feature.']);
                //return redirect()->to('/dashboard/admins')->with('error', 'Failed to update feature.');
            }
            
        }
        return redirect()->to('/dashboard/admins')->with('errors', ['Failed to update feature.']);
    }

    public function delete_admin($id) {
        // // Fetch the product from the database
        // $adminModel = new AdminModel();
        //  // Validate the ID

        $query = [
            'select' => 'count',
            'from'   => 'admins',
            'where' => 
            [
                'id' => 'eq.' . $id //"gt" means "greater than" (>)
            ],
            'limit' => 1 
        ];

        $db = $this->service->initializeDatabase('admins', 'id');
        $countResult = $db->createCustomQuery($query)->getResult();

         if ($countResult[0]->count == 0) {
            // Feature not found, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/admins')->with('error', 'Feature not found.');
        }

        if ($db->delete($id)) {
            // Deletion successful, redirect with success message
            return redirect()->to('/dashboard/admins')->with('success', 'Feature deleted successfully.');
        } else {
            // Deletion failed, handle error (e.g., show an error message)
            return redirect()->to('/dashboard/admins')->with('error', 'Failed to delete feature.');
        }   
    }

  
}
