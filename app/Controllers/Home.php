<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BookmarkModel;
use App\Models\EventModel;
use App\Models\ResepModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $session;


    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $bmk = new BookmarkModel();
        $rspm = new ResepModel();
        $usr = new UserModel();
        $artm = new ArtikelModel();
        $evm = new EventModel();
        $artikel = $artm->findAll(10);
        foreach($artikel as $i => $art) {
            $user = $usr->find($art["id_user"]);
            $artikel[$i]["user"] = $user;
        }

        $resep = $rspm->find();
        foreach($resep as $i => $rsp) {
            $user = $usr->find($rsp["id_user"]);
            $resep[$i]["user"] = $user;
            if($this->session->user){
                $bm = $bmk->where("id_resep",$rsp["id_resep"])->where("user_id",$this->session->user["user_id"])->find();
                if(!empty($bm)) $resep[$i]["bookmark"] = true;
                else $resep[$i]["bookmark"] = false;
            }
        }
        return view('home',["resep" => $resep, "artikel" => $artikel, "events" => $evm->findAll()]);
    }

    public function poin()
    {
        return view('voucher');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function login()
    {
        return view('login');
    }
}
