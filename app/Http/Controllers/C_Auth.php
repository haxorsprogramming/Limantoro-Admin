<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_User;

class C_Auth extends Controller
{
    public function loginProses(Request $request)
    {
        $username = $request -> username;
        $usernameCaps = Str::upper($username);
        // cek total user 
        $totalUserDb = M_User::where('code', $usernameCaps) -> count();
        if($totalUserDb > 0){
            // cek user & password 
            $dataUserDb = M_User::where('code', $usernameCaps) -> first();
            $passwordUserDb = $dataUserDb -> password;
            $passwordInput = $request -> password;
            $cek_password = password_verify($passwordInput, $passwordUserDb);
            if($cek_password == true){
                /**
                 * if true, create session & status success of respond
                 */
                // session(['user_login' => $username]);
                $dr = ['status' => 'success'];
            }else{
                /**
                 * if false, create status error of respond
                 */
                $dr = ['status' => 'wrong_password'];
            }
        }else{
            $dr = ['status' => 'no_user'];
        }
        
        return \Response::json($dr);
    }
}
