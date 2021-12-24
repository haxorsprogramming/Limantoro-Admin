<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\M_User;
use App\Models\M_Profile_Karyawan;
use App\Models\M_Reset_Password;

use App\Mail\LimantoroMail;

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
                $key = env('JWT_KEY');
                $role = $dataUserDb -> role;
                $payload = array(
                    "username" => $username,
                    "role" => $role
                );
                $jwt = JWT::encode($payload, $key, 'HS256');
                session(['userLogin' => $username]);
                $dr = ['status' => 'success', 'token' => $jwt];
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
        unset($_COOKIE['K_TOKEN']); 
        $request -> session() -> flush();
        return redirect('/');
    }

    public function forgotPasswordProses(Request $request)
    {
        $email = $request -> email;
        $jlhKaryawan = M_Profile_Karyawan::where('email', $email) -> count();
        if($jlhKaryawan < 1){
            $status = 'no_email';
        }else{
            $token = Str::uuid();
            $fToken = Str::replace('-', '', $token);
            $rp = new M_Reset_Password();
            $rp -> token = $fToken;
            $rp -> email = $email;
            $rp -> status = "NOT_RESSETED";
            $rp -> save();
            $dre = ['email' => $email, 'token' => $fToken];
            Mail::to($email) -> send(new LimantoroMail($dre));
            $status = 'sukses';
        }
        $dr = ['status' => $status];
        return \Response::json($dr);
    }

    public function resetPasswordAction(Request $request, $token)
    {
        $jlhToken = M_Reset_Password::where('token', $token) -> where('status', 'NOT_RESSETED') -> count();
        if($jlhToken < 1){
            echo "Token reset password tidak valid !!!";
        }else{
            // cari data email 
            $dataReset = M_Reset_Password::where('token', $token) -> first();
            $dr = ['token' => $token, 'dataUser' => $dataReset];
            return view('login.resetPasswordActionPage', $dr);
        }
    }

    public function resetPasswordProses(Request $request)
    {
        // {'token':token, 'pass':pass1}
        $token = $request -> token;
        $password = $request -> pass;
        // ambil data user 
        $dataReset = M_Reset_Password::where('token', $token) -> first();
        $username = $dataReset -> userData -> username;
        // update password 
        $paswordHash = password_hash($password, PASSWORD_DEFAULT);
        M_User::where('username', $username) -> update([
            'password' => $paswordHash
        ]);
        // update status token 
        M_Reset_Password::where('token', $token) -> update([
            'status' => 'SUCCESS'
        ]);
        $dr = ['status' => 'sukses', 'username' => $username];
        return \Response::json($dr);
    }

}
