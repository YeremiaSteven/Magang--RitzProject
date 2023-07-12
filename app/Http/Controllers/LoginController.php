<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use App\Models\User;
class LoginController extends Controller
{

    public function index(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view ('login', compact('nama_web'));
    }

    public function indextk(){
       //$nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view ('loginadmin');
    }

    public function authenticate(Request $request)
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
                 } elseif ($user->id_role == 44443){
                    return redirect()->intended('home');
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
        $user = User::join('trole', 'users.id_role', '=', 'trole.id_role')->get(['users.*', 'trole.vrole_name']);
        return view('admin',compact ('user','nama_web'));

    }

    public function dashboard_staff(Request $request)
    {

        return view('staff');

    }

    public function dashboard_home(Request $request)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();

        //count for displaying flashsale item (limit item = 4)
        $count = DB::table('titem_hdr')->where('iflashsale',1)->select('titem_hdr.*')->orderBy('dmodi', 'desc')->limit(4)->get();
        //count2 for displaying all item (limit item = 8)
        $count2 = DB::table('titem_hdr')->where('iflashsale',0)->select('titem_hdr.*')->orderBy('dmodi', 'asc')->limit(8)->get();

        //item is array for count
        $item = [];
        //item2 is array for count2
        $item2 = [];

        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();

        $disc = $tsetting->dvalue;


        foreach ($count as $i => $u){
            $item[$i]['index'] = $i;
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id_item'] = $u->id_item;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['id_category'] = $u->id_category;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;

            $item[$i]['iprice'] = $u->iprice;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc);
            $item[$i]['dexpired'] = $u->dexpired;
            $item[$i]['iflashsale'] = $u->iflashsale;
            $item[$i]['iactive'] = $u->iactive;
        }

        foreach ($count2 as $i => $u){
            $item2[$i]['index'] = $i;
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item2[$i]['picture'] = $picture->picture;
            } else {
                $item2[$i]['picture'] = null;
            }
            $item2[$i]['id_item'] = $u->id_item;
            $item2[$i]['vname_item'] = $u->vname_item;
            $item2[$i]['id_category'] = $u->id_category;
            $item2[$i]['vdescription'] = $u->vdescription;
            $item2[$i]['istock'] = $u->istock;
            $item2[$i]['iprice'] = $u->iprice;
            $item2[$i]['dexpired'] = $u->dexpired;
            $item2[$i]['iflashsale'] = $u->iflashsale;
            $item2[$i]['iactive'] = $u->iactive;
        }

        return view('home',compact ('item','item2','nama_web'));

    }
}
