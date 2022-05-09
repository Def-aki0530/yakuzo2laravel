<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shain extends Model
{
    protected $table = 'mst_shain';
    protected $primaryKey = 'shain_code';
    public $incrementing = false;
    public $timestamps = false;

    public $data = array(
        "shain" => "",
        "login_flg" => "",
        "kengen_list" => array(),
        "kengen_code" => "",
        "delete_flg" => "",
        "list" => array()
    );

    public function makeKengenList(){
            $this->data['kengen_list'] = Kengen::select('kengen_code','kengen_name')
            ->where('delete_flg','0')->get();
    }

    public function getList(){
        $result = DB::table("mst_shain as ms")
                    ->join("mst_kengen as mk","ms.kengen_code","mk.kengen_code")
                    ->select("ms.shain_code","ms.shain_name","ms.login_flg","ms.mail_address","mk.kengen_name","ms.delete_flg");
                    
        if($this->data["shain"] != ""){
            where(function($result){
                $result->where("ms.shain_code",$this->data["shain"])
                ->orWhere("ma.shain_name", "like", "%" . $this->data["shain"] . "%")
                ->orWhere("ms.shain_name_kana", "like", "%" . $this->data["shain"] . "%");
            });
        }
        if($this->data["login_flg"] != ""){
            $result->where("ms.login_flg",$this->data["login_flg"]);
        }
        if($this->data["kengen_code"] != ""){
            $result->where("ms.kengen_code",$this->data["kengen_code"]);
        }
        if($this->data["delete_flg"] != ""){
            $result->where("ms.delete_flg",$this->data["delete_flg"]);
        }
        $result->orderBy("ms.shain_code");

        $this->data["list"] = $result->paginate(25);

    }
}