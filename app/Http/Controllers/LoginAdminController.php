<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use App\Models\User;

class LoginAdminController extends Controller
{


    public function index(){
       $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view ('loginadmin', compact('nama_web'));
    }

    public function authenticateAdmin(Request $request)
    {
        request()->validate
        ([
            'email' => 'required',
            'password' => 'required',
        ]);
        $kredensil = $request->only('email', 'password');
       
        // $user=User::where('username',$request->username)->first();
        if(Auth::attempt($kredensil))
        {
            // Auth::guard('web')->login($user);
            $user = Auth::user();
            if ($user->istatus_user == 1){
                if ($user->id_role == 44441){
                    return redirect()->intended('admin');
                 } elseif ($user->id_role == 44442){
                    return redirect()->intended('staff');
                 } 
            } elseif ($user->istatus_user == 0) {

            }
            Alert::error('Error', 'Your account not active yet, please check your email for activation');
            return back();
        }
        Alert::error('Error', 'Invalid Email or Password');
        return back();
        
    }

    public function dashboard_admin(Request $request)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $user = User::join('trole', 'users.id_role', '=', 'trole.id_role')
                ->get(['users.*', 'trole.vrole_name'])->where('id_role', 44443);
        return view('admin',compact ('user','nama_web'));

    }
    public function dashboard_staff(Request $request)
    {

        return view('staff');

    }  
}
