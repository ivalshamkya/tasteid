<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function login()
    {
        $usermodel = new UserModel();
        $email = $this->request->getPost("email");
        $pass = md5($this->request->getPost("pass"));
        $users = $usermodel->where('email_user',$email)->find();

        if(empty($users))
            return redirect()->to(base_url('home/login')); 

        foreach($users as $user){
            if($pass === $user['password_user']){
                $this->session->set(['user' => $user]);
                echo "mau";
            }
        }
        if(empty($this->session->user))
        return redirect()->to(base_url('home/login')); 
        else if($this->session->user["hak_akses"] == "user")
        return redirect()->to(base_url('home')); 
        else
        return redirect()->to(base_url('admin')); 
    }

    public function authenticate(){
        if(empty($this->session->user))
        return false;
        else
        return true;
    }

    public function logout(){
        $this->session->remove('user');
        return redirect()->to(base_url('home')); 
    }

    public function register()
    {
        $usermodel = new UserModel();
        $data = $this->request->getPost();
        $data['user_id'] = uniqid();
        $data['password_user'] = md5($data['password_user']);
        $data['hak_akses'] = "user";
        $data['img_user'] = "user.png";

        $insert = $usermodel->insert($data);
        var_dump($insert);
        if($insert === false)
        return redirect()->to(base_url('home/daftar')); 
        else
        return redirect()->to(base_url('home/login')); 
        
    }
}
