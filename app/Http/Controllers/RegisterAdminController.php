<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Alert;

class RegisterAdminController extends Controller
{
    public function index(){
        return view ('registeradmin');
    }

    public function RegisterAdmin(Request $request)
    {
        $request->validate
        ([
            'storename'=>'required|max:25',
            'email'=>'required|unique:users,email',
            'notelp'=>'required|min:11',
            'address'=>'required',
            'password'=>'required|min:8',
        ]);

        $email = $request->email;

    // insert data ke table admin
        $check_insert = DB::table('admin')->insert([
            'vname' => $request->storename,
            'email_admin' => $request->email,
            'vno_telp' => $request->notelp,
            'password_admin' => bcrypt($request->password),
            'profile_picture' => 'blank_profilepicture.png',
            'istatus_admin' => 0,
            'id_role' => 44441,
            'vcrea' => $request->email,
            'dcrea' => Carbon::now(),
        ]);

        if (!$check_insert){
            Alert::error('Error', 'Data cannot be store to Database');
        } else {
            $token = Str::random(4);
            $register = DB::table('token_register')->insert([
                'email_admin' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            $action_link = route('admin.user',['token'=>$token,'email'=>$request->email,'address'=>$request->address]);

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

    public function RegisterLinkAdmin(Request $request, $token = null){

        $user = DB::table('admin')->where(['email_admin'=>$request->email])->first();
        $check_token = \DB::table('token_register')->where([
            'email_admin'=>$request->email,
            'token'=>$request->token,
        ])->first();


        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            DB::table('taddressadmin')->insert([
                'vreceiver_name' =>$user->vname,
                'vaddress'=>$request->address,
                'vcrea'=>$request->email,
                'dcrea'=>Carbon::now(),
                'id_admin'=>$user->id_admin,
                'istatus_address'=>1,
            ]);
            DB::table('admin')->where(['email_admin'=>$request->email])->update(['istatus_admin' => 1]);
            \DB::table('token_register')->where([
                'email_admin'=>$request->email
            ])->delete();

            return redirect('loginadmin')->with('info', 'Your account has been activated, you can login to our website')->with('verifiedEmail', $request->email);
        }
    }
}
