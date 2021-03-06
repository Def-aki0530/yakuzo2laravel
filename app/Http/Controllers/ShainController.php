<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shain;

class ShainController extends Controller
{
    public function index(Request $request){
        $shain = new Shain();
        $shain->makeKengenList();

        return view('shain',$shain->data);
    }

    public function kensaku(Request $request){
        $session = $request->getSession();
        $shain = new Shain();

        if(!empty($_GET["page"])){
            $shain->data = $session->get("shain_data");
        }
        else{
            $shain->data['shain'] = $request->get('shain');
            $shain->data['login_flg'] = $request->get('login_flg');
            $shain->data['kengen_code'] = $request->get('kengen_code');
            $shain->data['delete_flg'] = $request->get('selete_flg');
            $shain->makeKengenList();
            $session->put("shain_data",$shain->data);
        }
        
        
        $shain->getList();
        return view('shain',$shain->data);
    }

    public function dispNewRegist(Request $request)
    {
        $shain = new Shain();
        $shain->makeKengenList();

        $shain->data["title"] = "社員マスタ新規登録";
        $shain->data["action"] = "checkshaindata";

        return view("shainRegist", $shain->data);
    }

    public function dispEditRegist(Request $request){
        //Shainのインスタンス化
        $shain = new Shain();
        $shain->makeKengenList();

        //該当データを取得
        $shain->data['shain_code'] = $request->get('shain_code');
        $shain->getShainData();

        //動的項目を設定して登録画面を表示
        $shain->data['title'] = "社員マスタ編集登録";
        $shain->data['action'] = "checkshaindata/edit";

        return view('shainRegist', $shain->data);

    }

    public function checkShainData($edit = "",Request $request)
    {
        //echo $edit;
        
        //modelのインスタンス化と権限マスタのList保持
        $shain = new Shain();
        $shain->makeKengenList();
        
        //画面データの継承
        $shain->data["shain_code"] = $request->get("shain_code");
        $shain->data["shain_name"] = $request->get("shain_name");
        $shain->data["shain_name_kana"] = $request->get("shain_name_kana");
        $shain->data["password"] = $request->get("password");
        $shain->data["password2"] = $request->get("password2");
        $shain->data["login_flg"] = $request->get("login_flg");
        $shain->data["mail_address"] = $request->get("mail_address");
        $shain->data["kengen_code"] = $request->get("kengen_code");
        $shain->data["delete_flg"] = $request->get("delete_flg");
        $shain->data["edit"] = $edit;

        //チェックとエラー処理
        if (!$shain->check()) {
            $shain->data["title"] = "社員マスタ新規登録";
            $shain->data["action"] = "checkshaindata";
            return view('shainRegist', $shain->data);
        }
        
        //確認画面へ遷移
        if($edit == ""){
            $shain->data["title"] = "社員データ登録確認";
            $shain->data["action"] = "exeinstshain";
        }
        else{
            $shain->data["title"] = "社員データ編集登録確認";
            $shain->data["action"] = "/exeupdshain";
        }
        

        return view("shainConfilm",$shain->data);
    }

    public function exeInstShain(Request $request) {
        $session = $request->getSession();
        //shainモデルのインスタンス化
        $shain = new Shain();
        //画面データをモデルに継承
        $shain->shain_code = $request->get("shain_code");
        $shain->shain_name = $request->get("shain_name");
        $shain->shain_name_kana = $request->get("shain_name_kana");
        $shain->password = $request->get("password");
        $shain->login_flg = $request->get("login_flg");
        $shain->mail_address = $request->get("mail_address");
        $shain->kengen_code = $request->get("kengen_code");
        $shain->biko = "";
        $shain->delete_flg = $request->get("delete_flg");
        $shain->created_on = date('Y-m-d H:i:s');        
        $shain->created_by = $session->get("login_shain_code");
        $shain->updated_on = date('Y-m-d H:i:s');
        $shain->updated_by = $session->get("login_shain_code");

        //実際の登録処理
        $shain->save();

        //完了画面の表示
        return view("shainComplete");
    }

    public function exeUpdShain(Request $request) {
        // session
        $session = $request->getSession();
        // 画面データをモデルに継承
        $param['shain_name'] = $request->get("shain_name");
        $param['shain_name_kana'] = $request->get("shain_name_kana");
        $param['password'] = $request->get("password");
        $param['login_flg'] = $request->get("login_flg");
        $param['mail_address'] = $request->get("mail_address");
        $param['kengen_code'] = $request->get("kengen_code");
        $param['delete_flg'] = $request->get("delete_flg");
        $param['updated_on'] = date("Y-m-d H:i:s");
        $param['updated_by'] = $session->get("login_shain_code");

        Shain::where("shain_code",$request->get("shain_code"))->update($param);

        //完了画面の表示
        return view("shainComplete");
    }
}
