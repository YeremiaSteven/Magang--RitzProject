<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use DB;
use Alert;

class MemberController extends Controller
{
    public function index2(Request $request){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $member = DB::table('tmember')
                ->leftjoin('users', 'tmember.id_user', '=', 'users.id_user')
                ->get(['tmember.*', 'users.*']);
        return view ('member_list',compact('member','nama_web'));
    }

    public function index(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $table = DB::table('member_request')
                ->get();
        return view ('member', compact('table','nama_web'));
    }

    public function delete($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $table = DB::table('member_request')
                ->where('email',$id)
                ->first();
        return view('member_delete',compact('table','nama_web'));
    }

    public function accept($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $table = DB::table('member_request')
                ->where('email',$id)
                ->first();
        return view('member_accept',compact('table','nama_web'));
    }

    public function member_delete(Request $request){
        $table = DB::table('member_request')
        ->where(['email'=>$request->email])
        ->update([
            'istatus_request' => 2,
            // 'vmodi' => Auth::user()->email,
            // 'dmodi' => Carbon::now()
        ]);
        Alert::Success('success', 'Request has been Rejected');
        return redirect('member');
    }

    public function member_accept(Request $request){
        $showvar = DB::table('users')
                    ->where('users.email',$request->email)
                    ->select('users.id_user')->first();

        $insert_member = DB::table('tmember')
                        ->insert([
                        'id_user' => $showvar->id_user,
                        'istatus_member' => 1,
                        'vtipemem'=> 0,
                        'vcrea' => Auth::user()->email,
                        'dcrea' => Carbon::now(),
                        ]);

        $table = DB::table('member_request')
        ->where(['email'=>$request->email])
        ->delete();
        Alert::Success('success', 'Request has been Accept');
        return redirect('member');
    }
}
