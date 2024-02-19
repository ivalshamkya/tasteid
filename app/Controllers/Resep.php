<?php

namespace App\Controllers;

use App\Models\BahanResepModel;
use App\Models\BookmarkModel;
use App\Models\InstruksiModel;
use App\Models\KategoriModel;
use App\Models\ResepModel;
use App\Models\UserModel;

class Resep extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(){
        return view('upload_resep');
    }

    public function search(){
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
            if($this->session->user){
                $bm = $bmk->where("id_resep",$rsp["id_resep"])->where("user_id",$this->session->user["user_id"])->find();
                if(!empty($bm)) $resep[$i]["bookmark"] = true;
                else $resep[$i]["bookmark"] = false;
            }
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
        
        return view('hasil_pencarian',["resep"=>$resep, "query" => $query, "kategori" => $ctgm->findAll()]);
    }

    public function view($id){
        $bahanm = new BahanResepModel();
        $resepm = new ResepModel();
        $instrm = new InstruksiModel();
        $userm = new UserModel();
        $bookmarkm = new BookmarkModel();

        $resep = $resepm->find($id);
        $bahan = $bahanm->where("id_resep",$id)->find();
        $instruksi = $instrm->where("id_resep",$id)->find();
        $user = $userm->find($resep["id_user"]);
        if($this->session->user)
        $bookmark = $bookmarkm->where("id_resep",$resep["id_resep"])->where("user_id",$this->session->user["user_id"])->find();
        else
        $bookmark = null;
        
        $data = [
            "resep" => $resep,
            "bahan" => $bahan,
            "instruksi" => $instruksi,
            "user" => $user,
            "bookmark" => $bookmark
        ];
        return view('detail_resep',$data);
    }

    public function upload(){
        $model = new KategoriModel();
        $kategori = $model->findAll();
        return view('upload_resep',['category' => $kategori]);
    }

    public function add(){
        $bahanm = new BahanResepModel();
        $resepm = new ResepModel();
        $instrm = new InstruksiModel();

        $data = $this->request->getPost();
        $bahan = $data['bahan'];
        $langkah = $data['langkah'];
        
        $files = $this->request->getFiles(); 

        if($file = $files['gambar_resep']){
            $newName = $file->getRandomName();
            $data['gambar_resep'] = $newName;
            $file->move('assets/images/resep', $newName);  
        }
        else $data['gambar_resep'] = "noimg.png";

        foreach($files['langkah'] as $idx => $f){
            $newName = $f['gambar']->getRandomName();
            $langkah[$idx]['gambar'] = $newName;
            $f['gambar']->move('assets/images/resep', $newName);
        }

        $data['id_user'] = $this->session->user['user_id'];
        var_dump($data);
        $resepm->insert($data);
        $id = $resepm->getInsertID();
        foreach($bahan as $b) {
            $d = [
                "id_resep" => $id,
                "nama_bahan" => $b
            ];
            $bahanm->insert($d);
        }
        foreach($langkah as $l) {
            $d = [
                "id_resep" => $id,
                "detail_instruksi" => $l["detail_instruksi"],
                "gambar" => $l["gambar"],
            ];
            $instrm->insert($d);
        }
        
        return redirect()->to(base_url('home')); ;
    }
}
