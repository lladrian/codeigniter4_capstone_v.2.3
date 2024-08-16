<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;
use Config\Services;

use PHPSupabase\Service;

class DashboardController extends Controller
{

    protected $supabaseService;

     public function __construct()
    {
        $this->supabaseService = new Service(
            "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh2cWxwdGxiZWdveHFqdWN4dHBsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTk0NTI0OTUsImV4cCI6MjAzNTAyODQ5NX0.U54TZVXt1-qjKqDK6f05aCbiKfpGHAVbMBW4Wk-boRU", 
            "https://hvqlptlbegoxqjucxtpl.supabase.co"
        );
    }

        public function index()
    {
        // Check if user is logged in
        if (!$user = session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }


        
        $query1 = [
            'select' => 'count',
            'from' => 'admins'
        ];
        $query2 = [
            'select' => 'count',
            'from' => 'instructors'
        ];

        $query3 = [
            'select' => 'count',
            'from' => 'cashiers'
        ];

        $query4 = [
            'select' => 'count',
            'from' => 'head_departments'
        ];

        $query5 = [
            'select' => 'count',
            'from' => 'registrars'
        ];

        $query6 = [
            'select' => 'count',
            'from' => 'students'
        ];
        $query7 = [
            'select' => 'count',
            'from' => 'courses'
        ];
        $query8 = [
            'select' => 'count',
            'from' => 'departments'
        ];
        $query9 = [
            'select' => 'count',
            'from' => 'roles'
        ];


        $db1 = $this->supabaseService->initializeDatabase('admins', 'id');
        $db2 = $this->supabaseService->initializeDatabase('instructors', 'id');
        $db3 = $this->supabaseService->initializeDatabase('cashiers', 'id');
        $db4 = $this->supabaseService->initializeDatabase('head_departments', 'id');
        $db5 = $this->supabaseService->initializeDatabase('registrars', 'id');
        $db6 = $this->supabaseService->initializeDatabase('students', 'id');
        $db7 = $this->supabaseService->initializeDatabase('courses', 'id');
        $db8 = $this->supabaseService->initializeDatabase('departments', 'id');
        $db9 = $this->supabaseService->initializeDatabase('roles', 'id');







        $adminCount = $db1->createCustomQuery($query1)->getResult();
        $instructorCount = $db2->createCustomQuery($query2)->getResult();
        $cashierCount = $db3->createCustomQuery($query3)->getResult();
        $head_departmentCount = $db4->createCustomQuery($query4)->getResult();
        $registrarCount = $db5->createCustomQuery($query5)->getResult();
        $studentCount = $db6->createCustomQuery($query6)->getResult();
        $courseCount = $db7->createCustomQuery($query7)->getResult();
        $departmentCount = $db8->createCustomQuery($query8)->getResult();
        $roleCount = $db9->createCustomQuery($query9)->getResult();






     
        $data['adminCount'] = $adminCount[0]->count;
        $data['instructorCount'] = $adminCount[0]->count;
        $data['cashierCount'] = $cashierCount[0]->count;
        $data['head_departmentCount'] = $head_departmentCount[0]->count;
        $data['registrarCount'] = $registrarCount[0]->count;
        $data['studentCount'] = $studentCount[0]->count;
        $data['courseCount'] = $courseCount[0]->count;
        $data['departmentCount'] = $departmentCount[0]->count;
        $data['roleCount'] = $roleCount[0]->count;






        $data['user'] = $user;
        return view('dashboards/admin_dashboard',$data);
    }

    
    public function edit_profile() {
        if (!session()->get('user')) {
            return redirect()->to('/'); // Redirect to login page if user is not logged in
        }
        $user = session()->get('user');
     

        // $db = $this->supabaseService->initializeDatabase('admins', 'id');

        // $updateAdmin= [
        //  'email' => 'adrianmanatad5182@gmail.com',
        //  'name'  => 'Adrian Manatad'
        //  ];
 
        // $data['user'] = $db->update('11', $updateAdmin); //the first parameter ('1') is the product id
       // print_r( $data['user']);
        // exit;
     
        return view('profiles/edit_profile');
    }

    
    public function update_profile($user_username, $user_id)
    {        
        $request = service('request');
        $validation = \Config\Services::validation();

        $validation->setRules([
            'fullname' => 'required|min_length[5]|max_length[255]',
            'uname' => 'required|min_length[5]|max_length[255]',
            'email' => 'required|valid_email',
            'confirm_password' => 'matches[password]'
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
  
            if($request->getPost('password') != NULL) {
                $userData = [
                    'fullname' => $request->getPost('fullname'),
                    'username' => $user_username,
                    'email' => $request->getPost('email'),
                    'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT)
                ];

                $db = $this->supabaseService->initializeDatabase('admins', 'id');
            
 
                if ($db->update($user_id, $userData)) {
                    session()->destroy();
                    return redirect()->to('/dashboard/profile')->with('success', 'Feature updated successfully.');
                    //$this->logout();   
                } else {
                    return redirect()->to('/dashboard/profile')->with('error', 'Failed to update feature.');
                }
            } else {
                $userData = [
                    'fullname' => $request->getPost('fullname'),
                    'username' => $user_username,
                    'email' => $request->getPost('email')
                ];

                $db = $this->supabaseService->initializeDatabase('admins', 'id');
              
                if ($db->update($user_id, $userData)) {
                    session()->destroy();
                    return redirect()->to('/dashboard/profile')->with('success', 'Feature updated successfully.');
                   //$this->logout();   
                } else {
                    return redirect()->to('/dashboard/profile')->with('error', 'Failed to update feature.');
                }
            } 
        }
    }

    public function logout()
    {
        // Destroy the session

        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}
