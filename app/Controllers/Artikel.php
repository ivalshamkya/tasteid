<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BahanResepModel;
use App\Models\BookmarkModel;
use App\Models\InstruksiModel;
use App\Models\KategoriModel;
use App\Models\ResepModel;
use App\Models\UserModel;

class Artikel extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(){
        return view('upload_artikel');
    }

    public function add(){
        $data = $this->request->getPost();
        if($file = $this->request->getFile('gambar')){
            $newName = $file->getRandomName();
            $data['gambar'] = $newName;
            $file->move('assets/images/artikel', $newName);  
        }
        else $data['gambar'] = "noimg.png";
        $data["id_user"] = $this->session->user["user_id"];
        var_dump($data);
        $model = new ArtikelModel();
        $insert = $model->insert($data);
        return redirect()->to(base_url("home"));
    }

    public function view($id){
        $model = new ArtikelModel();
        $usrm = new UserModel();
        $data = $model->find($id);
        return view("detail_artikel",["artikel" => $data, "user" => $usrm->find($data["id_user"])]);
    }
}
