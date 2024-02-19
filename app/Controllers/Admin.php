<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        if(empty($this->session->user) )
        redirect()->to(base_url("home"));
        if($this->session->user["hak_akses"] != "admin")
        redirect()->to(base_url("home"));
        
    }

    public function simpanevent(){
        $model = new EventModel();
        $data = $this->request->getPost();
        if($file = $this->request->getFile('gambar')){
            $newName = $file->getRandomName();
            $data['gambar'] = $newName;
            $file->move('assets/images/', $newName);  
        }
        else $data['gambar'] = "noimg.png";
        $model->insert($data);
        return redirect()->to(base_url("admin/event"));
    }

    public function editevent($id){
        $model = new EventModel();
        $event = $model->find($id);
        return view("admin/backendtemplate",["page" => "admin/editevent", "data" => ["event" => $event]]);
    }

    public function updateevent(){
        $model = new EventModel();
        $data = $this->request->getPost();
        if($file = $this->request->getFile('gambar')){
            $newName = $file->getRandomName();
            $data['gambar'] = $newName;
            $file->move('assets/images/', $newName);  
        }
        else $data['gambar'] = "noimg.png";
        var_dump($data);
        $model->update($data["id"], $data);
        return redirect()->to(base_url("admin/event"));
    }

    public function deleteevent($id){
        $model = new EventModel();
        $model->delete($id);
        return redirect()->to(base_url("admin/event"));
    }

    public function addevent(){
        return view("admin/backendtemplate",["page" => "admin/addevent", "data" => []]);
    }

    public function event(){
        $model = new EventModel();
        $event = $model->findAll();
        return view("admin/backendtemplate",["page" => "admin/event", "data" => ["events" => $event]]);
    }

    public function index(){
        $usm = new UserModel();
        $user = $usm->where("hak_akses","user")->find();
        return view("admin/backendtemplate",["page" => "admin/user", "data" => ["users" => $user]]);
    }    

    public function resep(){
        $ctm = new KategoriModel();
        return view("admin/backendtemplate",["page" => "admin/upload_resep", "data" => ["category" => $ctm->findAll()]]);
    } 
    
    public function artikel(){
        return view("admin/backendtemplate",["page" => "admin/upload_artikel", "data" => []]);
    } 
    
    
}
