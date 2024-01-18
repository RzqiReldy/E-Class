<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function proseslogin( Request $request )
    {
        if (Auth::guard('karyawan')->attempt(['nik' =>  $request->nik, 'password' =>  $request->password])){
            echo "Berhasil Login";
        }else{
            return redirect('/')->with(['warning'=>'Nik / Password Salah']);
        }
    }

    public function proseslogout(){
        if(Auth::guard('karyawan')->check()){
            Auth::guard( 'karyawan')->logout();
            return redirect('/');
        }
    }
}
