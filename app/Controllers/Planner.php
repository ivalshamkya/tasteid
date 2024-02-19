<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BahanResepModel;
use App\Models\BookmarkModel;
use App\Models\InstruksiModel;
use App\Models\KategoriModel;
use App\Models\PlanModel;
use App\Models\ResepModel;
use App\Models\UserModel;

class Planner extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function addmeal(){
        $data = $this->request->getPost();
        var_dump($data);
        if(null == $this->request->getPost('waktu') || null == $this->request->getPost('hari'))
        return redirect()->to(base_url("planner"));

        $waktu = $this->request->getPost('waktu');
        $hari = $this->request->getPost('hari');
        
        $query = null != $this->request->getPost("query") ? $this->request->getPost("query") : "";
        $resepm = new ResepModel();
        $userm = new UserModel();
        $bahanm = new BahanResepModel();
        $bmk = new BookmarkModel();
        $ctgm =  new KategoriModel();
        
        if($query != "")
        $resep = $resepm->like("nama_resep",$query)->find();
        else
        $resep = $resepm->findAll();
        
        if(empty($resep))
        return view('hasil_pencarian',["resep"=>[], "query" => $query, "kategori" => $ctgm->findAll()]);

        foreach($resep as $i => $rsp){
            $resep[$i]["user"] = $userm->find($rsp["id_user"]);
            $resep[$i]["bahan"] = $bahanm->where("id_resep", $rsp["id_resep"])->find();
        }
        
        if( $this->request->getPost("kategori") != ""){
            $resep = array_filter($resep, function($val) { return $val["id_kategori"] == $this->request->getPost("kategori");});
        }
        if($this->request->getPost("lokasi")  != ""){
            $resep = array_filter($resep, function($val) { return $val["user"]["provinsi"] == $this->request->getPost("lokasi") || $val["user"]["kota"] == $this->request->getPost("lokasi");});
        }

        helper('array');
        
        if($bahan = $this->request->getPost("bahan")){
            $resep = array_filter($resep, function($val) { return in_array($this->request->getPost("bahan"), array_map (function($value){
                return $value['nama_bahan'];
            } , $val["bahan"]));});
        }
        
        return view("add_plan",["resep"=>$resep, "query" => $query, "kategori" => $ctgm->findAll(), "waktu" => $waktu, "hari"=>$hari]);
    }

    public function add(){
        $model = new PlanModel();
        $data = $this->request->getPost();
        $data["user_id"] = $this->session->user["user_id"];
        $model->insert($data);

        return redirect()->to(base_url("planner"));
    }

    public function delete($id){
        $model = new PlanModel();
        $model->delete($id);
        return redirect()->to(base_url("planner"));
    }

    public function index(){
        $plm = new PlanModel();
        $rsm = new ResepModel();

        $hari = null != $this->request->getPost('hari') ? $this->request->getPost('hari') : date('Y-m-d');

        $breakfast = $plm->where(['waktu' => 'breakfast', 'hari' => $hari])->first();
        if(!empty($breakfast))
        $breakfast["resep"] = $rsm->find($breakfast["id_resep"]);
        
        $lunch = $plm->where(['waktu' => 'lunch', 'hari' => $hari])->first();
        if(!empty($lunch))
        $lunch["resep"] = $rsm->find($lunch["id_resep"]);
        
        $dinner = $plm->where(['waktu' => 'dinner', 'hari' => $hari])->first();
        if(!empty($dinner))
        $dinner["resep"] = $rsm->find($dinner["id_resep"]);
        

        $data = [
            "hari" => $hari,
            "breakfast" => $breakfast,
            "lunch" => $lunch,
            "dinner" => $dinner
        ];
        
        return view('meal_planner',$data);
    }

}
