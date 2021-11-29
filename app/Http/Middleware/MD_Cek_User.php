<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MD_Cek_User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $key = env('JWT_KEY');
        if(isset($_COOKIE['KACTUS_LIMANTORO_TOKEN'])){
            $jwt = $_COOKIE['KACTUS_LIMANTORO_TOKEN'];
            $data = JWT::decode($jwt, new Key($key, 'HS256'));
            return \Response::json($data);
        }else{
            return redirect('/');
        }
    }
}
