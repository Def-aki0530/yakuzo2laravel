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
}
