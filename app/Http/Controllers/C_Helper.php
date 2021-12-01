<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class C_Helper extends Controller
{
    public function getUserData()
    {
        $key = env('JWT_KEY');
        $jwt = $_COOKIE['K_TOKEN'];
        $data = JWT::decode($jwt, new Key($key, 'HS256'));
        return $data;
    }
    public function convertRole($role)
    {
        if($role == '1'){
            $caps = "Owner";
        }elseif($role == '2'){
            $caps = "Manager";
        }elseif($role == '3'){
            $caps = "Manager Lapangan";
        }else{
            $caps = "Purchasing";
        }
        return $caps;
    }
}
