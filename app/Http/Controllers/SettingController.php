<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class SettingController extends Controller
{
    public function index_web(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $setting = DB::table('tglobalsetting')->get();
        return view('web_setting', compact('setting','nama_web'));
    }

    public function update(Request $request){
        $setting = DB::table('tglobalsetting')->get();
        foreach ($setting as $key => $value) {
            if($value->id_global == 1){
                DB::table('tglobalsetting')->where('id_global',$value->id_global)->update([
                    'dvalue' => $request->dvalue1 / 100,
                    'ivalue' => $request->ivalue1,
                ]);
            }
            if($value->id_global == 2){
                DB::table('tglobalsetting')->where('id_global',$value->id_global)->update([
                    'dvalue' => $request->dvalue2 / 100,
                    'ivalue' => $request->ivalue2,
                ]);
            }
            if($value->id_global == 3){
                DB::table('tglobalsetting')->where('id_global',$value->id_global)->update([
                    'vvalue' => $request->name,
                ]);
            }
        }
        Alert::Success('success', 'Data has been Deleted');
        return back();
    }
}
