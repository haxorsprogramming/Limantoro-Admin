<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_User;

class C_Auth extends Controller
{
    public function loginProses(Request $request)
    {
        /**
         * Get post variable
         */
        $username = $request -> username;
        $usernameCaps = Str::upper($username);
        /**
         * Check total user
         */
        $totalUserDb = M_User::where('username', $usernameCaps) -> count();
        /**
         * Check & give result if user total < 1
         */
        if($totalUserDb > 0){
            /**
             * Get password from database with model
             */
            $dataUserDb = M_User::where('username', $usernameCaps) -> first();
            $passwordUserDb = $dataUserDb -> password;
            $passwordInput = $request -> password;
            /**
             * Get password verify with native php
             */
            $cek_password = password_verify($passwordInput, $passwordUserDb);
            if($cek_password == true){
                /**
                 * if true, create session & status success of respond
                 */
                session(['userLogin' => $username]);
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

    public function logout(Request $request)
    {
        $request -> session() -> flush();
        return redirect('/');
    }
}
