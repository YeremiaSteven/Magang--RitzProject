<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Alert;

class RegisterController extends Controller
{
    public function index(){
        return view ('register');
    }

    public function Register(Request $request)
    {
        $request->validate
        ([
            'nama'=>'required|max:25',
            'email'=>'required|unique:users,email',
            'notelp'=>'required|min:11',
            'address'=>'required',
            'password'=>'required|min:8',
        ]);

        $email = $request->email;

    // insert data ke table users
        $check_insert = DB::table('users')->insert([
            'vname' => $request->nama,
            'email' => $request->email,
            'vno_telp' => $request->notelp,
            'password' => bcrypt($request->password),
            'profile_picture' => 'blank_profilepicture.png',
            'istatus_user' => 0,
            'id_role' => 44443,
            'vcrea' => $request->email,
            'dcrea' => Carbon::now(),
        ]);

        
        
        if (!$check_insert){
            Alert::error('Error', 'Data cannot be store to Database');
        } else {
            $token = Str::random(4);
            $register = DB::table('token_register_1')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            $action_link = route('store.user',['token'=>$token,'email'=>$request->email,'address'=>$request->address]);

            $body = "We have received a request to verify this account for <b>TokoBiru</b> account associated with ".$request->email.". You can active this account by clicking the link below.";

            Mail::send('email-verify',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
                $message->from('noreply@example.com', 'TokoBiru App');
                $message->to($request->email, 'User')
                            ->subject('Verification');
            });

            return back()->with('success', 'We have e-mailed your activation account link');
        }
     
	// alihkan halaman ke halaman pegawai
    }

    public function RegisterLink(Request $request, $token = null){

        $user = DB::table('users')->where(['email'=>$request->email])->first();
        $check_token = \DB::table('token_register_1')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();


        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            DB::table('taddress')->insert([
                'vreceiver_name' =>$user->vname,
                'vaddress'=>$request->address,
                'vcrea'=>$request->email,
                'dcrea'=>Carbon::now(),
                'id_user'=>$user->id_user,
                'istatus_address'=>1,
            ]);
            DB::table('users')->where(['email'=>$request->email])->update(['istatus_user' => 1]);
            \DB::table('token_register_1')->where([
                'email'=>$request->email
            ])->delete();

            return redirect('login')->with('info', 'Your account has been activated, you can login to our website')->with('verifiedEmail', $request->email);
        }
    }

}
