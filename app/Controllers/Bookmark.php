<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use App\Models\ResepModel;
use App\Models\UserModel;

class Bookmark extends BaseController
{
    protected $session;

    function __construct()
    {
        $auth = new Auth();
        $this->session = \Config\Services::session();
        $this->session->start();
        if(!$auth->authenticate()) redirect()->to(base_url('home/login')); 
    }

    public function index($ctg = ""){
        $bmk = new BookmarkModel();
        $rsp = new ResepModel();
        $usr = new UserModel();
        $data = $bmk->where("user_id",$this->session->user["user_id"])->find();
        if(empty($data)){
            return view("bookmark", ["resep" => []]);
        }
        $id = [];
        $i = 0;
        foreach($data as $dt) $id[$i++] = $dt["id_resep"];
        $resep = $rsp->find($id);

        foreach($resep as $i => $rsp) {
            $user = $usr->find($rsp["id_user"]);
            $resep[$i]["user"] = $user;
        }
        
        return view("bookmark", ["resep" => $resep]);
    }

    public function remove($id){
        $model = new BookmarkModel();
        $model->where("id_resep",$id)->where("user_id",$this->session->user["user_id"])->delete();
        return redirect()->to(base_url('resep/view/'.$id));
    }

    public function add($id){
        $model = new BookmarkModel();
        $userid = $this->session->user["user_id"];
        $model->insert(["user_id" => $userid, "id_resep" => $id]);
        return redirect()->to(base_url('resep/view/'.$id));
    }
}
