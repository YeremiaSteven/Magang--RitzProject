<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PasswordController extends Controller
{
    public function index(){
        return view ('forgot_password');
    }

    public function sendResetLink(Request $request){
        $request->validate
        ([
            'email'=>'required|exists:users,email'
        ]);

        $token = Str::random(64);
        $check_variabel = DB::table('password_resets')->where('email',$request->email)->first();

            if ($check_variabel == null){
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
            } else if ($check_variabel != null){
                DB::table('password_resets')->update([
                    'token' => $token,
                ]);
            }


        $action_link = route('reset.password.form',['token'=>$token,'email'=>$request->email]);

        $body = "We have received a request to reset the password for <b>TokoBiru</b> account associated with ".$request->email.". You can reset your password by clicking the link below.";

        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com', 'TokoBiru App');
            $message->to($request->email, 'User')
                        ->subject('Reset Password');
        });
        return back()->with('success', 'We have e-mailed your password reset link');
    }

    public function index2(Request $request, $token = null){
        return view ('reset_password')->with(['token'=>$token,'email'=>$request->email]);;
    }

    public function resetPassword(Request $request){
        $request->validate([
             'email'=>'required|email|exists:users,email',
             'password'=>'required|min:5|confirmed',
             'password_confirmation'=>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
             'email'=>$request->email,
             'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            DB::table('users')->where(['email'=>$request->email])->update(['password'=>\Hash::make($request->password)]);
            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect('login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }

    public function index_password(){
        return view ('change_password');
    }

    public function resetPassword2(Request $request){
        $request->validate([
             'password'=>'required|min:5|confirmed',
             'password_confirmation'=>'required',
        ]);

        $query = DB::table('users')->where(['email'=>Auth::user()->email])->update(['password'=>\Hash::make($request->password)]);
        if (!$query){
            Alert::error('Error', 'Password cannot be change');
        } else {
            Alert::Success('success', 'Password has been change');
        }
        return redirect('profile_settings');
    }
}
