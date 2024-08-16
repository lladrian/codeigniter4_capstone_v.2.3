<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Controller;
use Config\Services; // Add this line
use CodeIgniter\HTTP\Request;


use PHPSupabase\Service;

class LoginController extends Controller
{

    protected $supabaseService;


     public function __construct()
    {
        $this->supabaseService = new Service(
            "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh2cWxwdGxiZWdveHFqdWN4dHBsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTk0NTI0OTUsImV4cCI6MjAzNTAyODQ5NX0.U54TZVXt1-qjKqDK6f05aCbiKfpGHAVbMBW4Wk-boRU", 
            "https://hvqlptlbegoxqjucxtpl.supabase.co"
        );
    }

    public function student_login()
    {
        return view('logins/student_user_login');
    }


    public function admin_login()
    {
        return view('logins/admin_login');
    }

    public function staff_login()
    {
        return view('logins/staff_login');
    }

    public function staff_authenticate()
    {

        $query = $this->supabaseService->initializeQueryBuilder();

        $session = \Config\Services::session();
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $request = service('request');

            $user1 = $query->select('*')
            ->from('instructors')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
            ->execute()
            ->getResult();
            $user2 = $query->select('*')
            ->from('cashiers')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
            ->execute()
            ->getResult();
            $user3 = $query->select('*')
            ->from('head_departments')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
            ->execute()
            ->getResult();
            $user4 = $query->select('*')
            ->from('registrars')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
            ->execute()
            ->getResult();
            
            $user1 = json_decode(json_encode($user1), true);
            $user2 = json_decode(json_encode($user2), true);
            $user3 = json_decode(json_encode($user3), true);
            $user4 = json_decode(json_encode($user4), true);


            if($user1) {
               if(!$user1 || !password_verify($request->getPost('password'), $user1[0]['password']) ) {
                    return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
               }
             
               if(password_verify($request->getPost('password'), $user1[0]['password']) ) {
                   session()->set('user', $user1[0]);
                   return redirect()->to('/dashboard');
               }  
            }
            if($user2) {
                if(!$user2 || !password_verify($request->getPost('password'), $user2[0]['password']) ) {
                     return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
                }
              
                if(password_verify($request->getPost('password'), $user2[0]['password']) ) {
                    session()->set('user', $user2[0]);
                    return redirect()->to('/dashboard');
                }  
             }
             if($user3) {
                if(!$user3 || !password_verify($request->getPost('password'), $user3[0]['password']) ) {
                     return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
                }
              
                if(password_verify($request->getPost('password'), $user3[0]['password']) ) {
                    session()->set('user', $user3[0]);
                    return redirect()->to('/dashboard');
                }  
             }
             if($user4) {
                if(!$user4 || !password_verify($request->getPost('password'), $user4[0]['password']) ) {
                     return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
                }
              
                if(password_verify($request->getPost('password'), $user4[0]['password']) ) {
                    session()->set('user', $user4[0]);
                    return redirect()->to('/dashboard');
                }  
             }
     
            return redirect()->back()->withInput()->with('errors', ['It seems that you didnn`t register yet.']);
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }



    public function admin_authenticate()
    {

//         $db =  $this->supabaseService->initializeDatabase('admins', 'id');
//         $data = [
//             'password' => password_hash('password', PASSWORD_DEFAULT),
//         ];
//         $data = $db->update('2', $data); //the first parameter ('1') is the product id

// exit;
     //  $bearerToken = 'sbp_98008965256652cac3f1c542ab650d5f25ab3518'; // Replace with your actual access token
       $query = $this->supabaseService->initializeQueryBuilder();
      

        
    //$db = $this->supabaseService->initializeDatabase('admins', 'id');
       //   $data['users'] = $db->fetchAll()->getResult(); //fetch all products


        try{

    //    $listProducts = $query->select('*')
    //    ->from('admins')
    //    ->where('email', 'eq.JohnDo123e@gmail.com') 
    //    ->execute()
    //    ->getResult();

    // $query = [
    //     'select' => 'id,email,name',
    //     'from'   => 'admins',
    //     'where' => 
    //     [
    //         'email' => 'eq.JohnDo123e@gmail.com', 
    //     ]
    // ];

    //    $listProducts = $db->createCustomQuery($query)->getResult();

       //  print_r($data['users'] = json_decode(json_encode($listProducts), true));
        }
        catch(Exception $e){
            echo $db->getError();
        }

        $session = \Config\Services::session();
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $request = service('request');

         //   $admin =  $db->findBy('email', 'JohnDo123e@gmail.com')->getResult();
            $admin = $query->select('*')
            ->from('admins')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
           // ->where('password', 'eq.'. password_hash($request->getPost('password'), PASSWORD_DEFAULT)) 
            ->execute()
            ->getResult();
            
            $admin = json_decode(json_encode($admin), true);
           // print_r($admin);
           // exit;

            if(!$admin || !password_verify($request->getPost('password'), $admin[0]['password']) ) {
                 return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
            }
          
            if(password_verify($request->getPost('password'), $admin[0]['password']) ) {
                // Insert login history into the database
                // $loginHistoryModel->insert([
                //     'user_id' => $admin['id'],
                //     'username' => $admin['username'],
                //     'ip_address' => $this->request->getIPAddress()
                // ]);
                // Retrieve the latest login history data
               // $latest_login = $loginHistoryModel->orderBy('login_time', 'DESC')->first();

             
       
              session()->set('user', $admin[0]);
             //   session()->set('latest_login', $latest_login);
                return redirect()->to('/dashboard');
            }  

        } else {
            // Validation failed, show validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function student_authenticate()
    {

        $query = $this->supabaseService->initializeQueryBuilder();

        $session = \Config\Services::session();
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $request = service('request');

            $student = $query->select('*')
            ->from('students')
            ->where('email', 'eq.'.$request->getPost('email')) 
            ->limit(1)
           // ->where('password', 'eq.'. password_hash($request->getPost('password'), PASSWORD_DEFAULT)) 
            ->execute()
            ->getResult();
            
            $student = json_decode(json_encode($student), true);

            if(!$student || !password_verify($request->getPost('password'), $student[0]['password']) ) {
                 return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
            }
          
            if(password_verify($request->getPost('password'), $student[0]['password']) ) {
                session()->set('user', $student[0]);
                return redirect()->to('/dashboard');
            }  
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function coa_user_authenticate()
    {

        $loginHistoryModel = new LoginHistoryModel();
        $userModel = new COAUserModel(); // Change \App\Models\UserModel() to UserModel()

        $session = \Config\Services::session();
        // $validationRules = [
        //     'email' => 'required|valid_email',
        //     'password' => 'required'
        // ];
        $validationRules = [
            'email' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $request = service('request');
            $user =  $userModel->getUserByEmail($request->getPost('email'));
       
            if(!$user || !password_verify($request->getPost('password'), $user['password']) ) {
                 return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
            }
         
            if(password_verify($request->getPost('password'), $user['password']) ) {
                $loginHistoryModel->insert([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'ip_address' => $this->request->getIPAddress()
                ]);
                session()->set('user', $user);
                return redirect()->to('/dashboard');
            }  
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }



    public function evsu_user_authenticate()
    {

        $loginHistoryModel = new LoginHistoryModel();
        $userModel = new EVSUUserModel(); // Change \App\Models\UserModel() to UserModel()

        $session = \Config\Services::session();
        // $validationRules = [
        //     'email' => 'required|valid_email',
        //     'password' => 'required'
        // ];
        $validationRules = [
            'email' => 'required',
            'password' => 'required'
        ];

        // if (!$validation->withRequest($this->request)->run()) {
        //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        // }
        if ($this->validate($validationRules)) {
            $request = service('request');
            // Check if the user exists
           // $user = $userModel->where('email', $request->getPost('email'))->first();
            $user =  $userModel->getUserByEmail($request->getPost('email'));
       
            if(!$user || !password_verify($request->getPost('password'), $user['password']) ) {
                 return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
            }
         
            if(password_verify($request->getPost('password'), $user['password']) ) {
                // Insert login history into the database
                $loginHistoryModel->insert([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'ip_address' => $this->request->getIPAddress()
                ]);
                session()->set('user', $user);
                return redirect()->to('/dashboard');
            }  
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
