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
        $totalUserDb = M_User::where('code', $usernameCaps) -> count();
        if($totalUserDb > 0){
            $dr = ['status' => 'more'];
        }else{
            $dr = ['status' => 'no_user'];
        }
        
        return \Response::json($dr);
    }
}
