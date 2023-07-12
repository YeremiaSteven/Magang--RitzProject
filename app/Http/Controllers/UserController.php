<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use Alert;
use Illuminate\Http\Request;


class UserController extends Controller
{

    // ------------------- Admin ---------------------
    public static $rules = [
        'email' => 'required|unique:users,email'
  ];

    public function store(Request $request)
    {
        //check and prepare general data
        $picture = "blank_profilepicture.jpg";
        // $request->validate([
        //     'email' => 'required|unique:users',
        //     'password' => 'required',
        // ]);

        $data = $request->all(); // This will get all the request data.
        $userCount = User::where('email', $data['email']);
        if ($userCount->count()) {
            Alert::error('Error', 'That email address is already registered. You sure you don\'t have an account?');
            return redirect("/admin");
        }else {
            // insert data ke table users
            $check_insert = DB::table('users')->insert([
                'vname' => $request->nama,
                'email' => $request->email,
                'vno_telp' => $request->notelp,
                'password' => bcrypt($request->password),
                'istatus_user' => 1,
                'profile_picture' => $picture,
                'id_role' => $request->role,
                'vcrea' => Auth::user()->email,
                'dcrea' => Carbon::now()
            ]);

            if (!$check_insert){
            Alert::error('Error', 'Data cannot be store');
            } else {
            Alert::Success('success', 'Data has been Store');
            }
            // alihkan halaman ke halaman pegawai
            return redirect("/admin");

        }
    }


    public function edit($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $admin = DB::table('users')->where('id_user',$id)->first();
        return view('edit_account',compact('admin','nama_web'));
    }

    public function delete($id)
    {
        $admin = DB::table('users')->where('id_user',$id)->first();
        return view('delete_account',compact('admin'));
    }

    public function update_delete(Request $request)
    {
        $delete = DB::table('users')->where('id_user', $request->id)->first();
        if (!$delete){
            Alert::error('Error', 'Data cannot be delete');
        } else{
            DB::table('users')->where('id_user', $request->id)->delete();
            Alert::Success('success', 'Data has been Deleted');
        }
        return redirect("/admin");
    }

    public function update(Request $request)
    {
        $check = DB::table('users')->where(['id_user'=>$request->id])->first();
        if (!$check){
            Alert::error('Error', 'Data cannot be change');
        } else{
            DB::table('users')->where(['id_user'=>$request->id])
            ->update([
                'vname' => $request->name,
                'vno_telp' => $request->no_telp,
                'istatus_user' => $request->status,
                'id_role' => $request->role,
                'vmodi' => Auth::user()->id_role,
                'dmodi' => Carbon::now()
            ]);
            Alert::Success('success', 'Data has been Updated');

        }
        return redirect('admin');
    }

    // ---------------------------------------------

    // --------------------User---------------------

    public function usersettings()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view('profile_settings', compact('nama_web'));
    }

    public function address_list()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $address = DB::table('taddress')->where('id_user',Auth::user()->id_user)->orderBy('istatus_address', 'desc')->get();
        return view('address_list',compact('address','nama_web'));
    }

    public function address_edit_form($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $address = DB::table('taddress')->where('id_table',$id)->first();
        return view('address_edit',compact('address','nama_web'));
    }

    public function address_edit(Request $request)
    {
        $query = DB::table('taddress')->where('id_table',$request->id)
                ->update([
                    'vreceiver_name' =>$request->name,
                    'vaddress'=>$request->address,
                    'vmodi'=>Auth::user()->email,
                    'dmodi'=>Carbon::now(),
                ]);
        if(!$query){
            Alert::error('Error', 'Data cannot be change');
        } else {
            Alert::Success('success', 'Data has been Updated');
        }

        return redirect('address/list');
    }

    public function address_delete(Request $request)
    {
        $query = DB::table('taddress')->where('id_table',$request->id)
                ->delete();
        if(!$query){
            Alert::error('Error', 'Data cannot be delete');
        } else {
            Alert::Success('success', 'Data has been Deleted');
        }

        return redirect('address/list');
    }

    public function address_add(Request $request){
        $query = DB::table('taddress')->insert([
            'vreceiver_name' =>$request->name,
            'vaddress'=>$request->address,
            'vcrea'=>Auth::user()->email,
            'dcrea'=>Carbon::now(),
            'id_user'=>Auth::user()->id_user,
            'istatus_address'=>0,
        ]);
        if(!$query){
            Alert::error('Error', 'Data cannot be store');
        } else {
            Alert::Success('success', 'Data has been Stored');
        }

        return redirect('address/list');
    }

    public function address_select(Request $request)
    {
        DB::table('taddress')->where('istatus_address',1)
                ->update([
                    'istatus_address' => 0
                ]);

        DB::table('taddress')->where('id_table',$request->id)
                ->update([
                    'istatus_address' => 1
                ]);

        return redirect('address/list');
    }


    public function member_request(){
        $email = Auth::user()->email;
        $id = Auth::user()->id_user;
        $query2 = DB::table('tmember')->where('id_user',$id)->first();
        // $query = DB::table('member_request')->where('email',$email)->first();
        if ($query2){
            Alert::error('Error', 'You are already a member');
        } else {
            // if($query->email == $email){
            //     Alert::error('Error', 'Your Request has been duplicate');
            // } else {
                $check_query = DB::table('member_request')->insert([
                    'email' => $email,
                    'istatus_request' => 0,
                    'created_at' => Carbon::now(),
                ]);
                if(!$check_query){
                    Alert::error('Error', 'Your Request have trouble');
                } else {
                    Alert::Success('success', 'Your request has been entered');

            }
        }

        return redirect('profile_settings');
    }

    public function editprofile_update(Request $request){
        $delete = DB::table('users')->where('id_user', Auth::user()->id_user)->first();
        if (file_exists(public_path('assets\picture'.'/'.$delete->profile_picture))){
            if($delete->profile_picture != 'blank_profilepicture.png'){
                unlink(public_path('assets\picture'.'/'.$delete->profile_picture));
            }
        }
        $update =  [];
        $update['vname'] = $request->name;
        $update['vmodi'] = Auth::user()->email;
        $update['dmodi'] = Carbon::now();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->move(public_path('assets/picture'), $file);
            $update['profile_picture']=$file;
        }

        $query_update =DB::table('users')->where('id_user', Auth::user()->id_user)->update($update);
        if (!$query_update){
            Alert::error('Error', 'Data cannot change');
        } else{
            Alert::Success('success', 'Data has been change');
        }

        return redirect('profile_settings');
    }

    public function editprofile_show()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        // $profile = DB::table('users')->where('id_user',Auth::user()->id_user)->get();
        // return view('profileform_edit',compact('profile'));
        return view('profile_edit', compact('nama_web'));
    }

}
