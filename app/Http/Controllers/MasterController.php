<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Alert;
use Storage;
use DB;

class MasterController extends Controller
{
 
    public function index_header(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $master = DB::table('titem_hdr')
            ->join('tcategory' , 'titem_hdr.id_category', '=', 'tcategory.id_category')
            ->join('users', 'titem_hdr.id_user', '=', 'users.id_user' )
            ->select('titem_hdr.*', 'tcategory.vcategory', 'users.vname')
            ->get();
        $category = DB::table('tcategory')
            ->select('tcategory.id_category','tcategory.vcategory')->get();
        $store = DB::table('users')
            ->select('users.id_user','users.vname')->where('id_user', Auth::user()->id_user)->get(); 
        return view('masterheader',compact ('master','category','store','nama_web'));
    }

    public function store_header(Request $request){
        if (strlen($request->barcode) <=20){
            $query = DB::table('titem_hdr')
                -> insert([
                    'vname_item' => $request->nama,
                    'id_category' => $request->category,
                    'id_user'=>$request->id_user,
                    'vdescription' => $request->desc,
                    'vbarcode' => $request->barcode,
                    'istock' => $request->stock,
                    'iprice' => $request->price,
                    'dexpired' => $request->expired,
                    'iactive' => 1,
                    'iflashsale' => 0,
                    'vcrea' => Auth::user()->email,
                    'dcrea' => Carbon::now()
                ]);
            if (!$query){
                Alert::error('Error', 'Data cannot be store');
            } else {
                Alert::Success('success', 'Data has been Store');
            }
        } else {
            Alert::error('Error', 'The barcode you entered is too long');
        }

        return redirect('master/header');
    }

    public function index_delete($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view('masterheader_delete',compact('id','nama_web'));
    }

    public function delete_header(Request $request){
        // select titem_dtl.id_item from titem_hdr join titem_dtl on titem_hdr.id_item = titem_hdr.id_item where titem_hdr.id_item = 33332;

        $detail = DB::table('titem_hdr')->where('titem_hdr.id_item',$request->id)
        ->join('titem_dtl' , 'titem_dtl.id_item', '=', 'titem_hdr.id_item')
        ->select('titem_dtl.id_item')->first();
        
        $cart = DB::table('titem_hdr')->where('titem_hdr.id_item',$request->id)
        ->join('tcart' , 'tcart.id_item', '=', 'titem_hdr.id_item')
        ->select('tcart.id_item')->first();


        if (is_null($detail) && is_null($cart)){
            $query = DB::table('titem_hdr')->where('id_item',$request->id)->delete();
            Alert::Success('success', 'Data has been deleted');

        }else{
            Alert::error('Error', 'Data cannot be delete, detail item and customer cart must be delete first!');
        }


        return redirect('master/header');
    }

    public function index_update($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $category = DB::table('tcategory')->select('tcategory.id_category','tcategory.vcategory')->get();
        $store = DB::table('users')->select('users.id_user','users.vname')->get();
        $master = DB::table('titem_hdr')->where('id_item',$id)->first();
        return view('masterheader_edit',compact('master','category','store','nama_web'));
    }

    public function update_header(Request $request){
        $query = DB::table('titem_hdr')->where('id_item',$request->id)->update([
            'vname_item' => $request->name,
            'id_category' => $request->category,
            'id_user' => $request->store,
            'vdescription' => $request->desc,
            'vbarcode' => $request->barcode,
            'istock' => $request->stock,
            'iprice' => $request->price,
            'dexpired' => $request->expired,
            'iactive' => $request->itemactive,
            'iflashsale' => $request->flashsale,
            'vmodi' => Auth::user()->email,
            'dmodi' => Carbon::now()
        ]);

        if (!$query){
            Alert::error('Error', 'Data cannot be update');
        } else {
            Alert::Success('success', 'Data has been updated');
        }

        return redirect('master/header');
    }

    public function index_detail($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $detail = DB::table('titem_dtl')->where('titem_dtl.id_item',$id)
            ->join('titem_hdr' , 'titem_dtl.id_item', '=', 'titem_hdr.id_item')
            ->select('titem_dtl.*', 'titem_hdr.id_item','titem_hdr.vname_item')->get();
        return view('masterdetail',compact ('detail','id','nama_web'));
    }

    public function index_detail2(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $detail = DB::table('titem_dtl')
            ->join('titem_hdr' , 'titem_dtl.id_item', '=', 'titem_hdr.id_item')
            ->select('titem_dtl.*', 'titem_hdr.id_item','titem_hdr.vname_item')->get();
        return view('detail_item',compact ('detail','nama_web'));
    }

    public function index_detail_store($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view('itemdtl_store',compact('id','nama_web'));
    }


    public function store_detail(Request $request){
        $detail =  [];
        $detail['id_item'] = $request->id;
        $detail['vcrea'] = "Admin";
        $detail['dcrea'] = Carbon::now();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->move(public_path('assets/picture'), $file);
            $detail['picture']=$file;

        }
        $add = DB::table('titem_dtl')->insert($detail);
        if (!$add){
            Alert::error('Error', 'Data cannot be store');
        } else{
            Alert::Success('success', 'Data has been store');
        }
        return redirect('master/header');
    }

    public function index_detail_delete($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $master = DB::table('titem_dtl')->where('id_itemdtl',$id)->first();
        return view('itemdtl_delete',compact('master','nama_web'));
    }

    public function delete_detail(Request $request){

        $delete = DB::table('titem_dtl')->where('id_itemdtl', $request->id)->first();
        if (file_exists(public_path('assets\picture'.'/'.$delete->picture))){
            unlink(public_path('assets\picture'.'/'.$delete->picture));
        }

        if (!$delete){
            Alert::error('Error', 'Data cannot be delete');
        } else{
            DB::table('titem_dtl')->where('id_itemdtl', $request->id)->delete();
            Alert::Success('success', 'Data has been deleted');
        }
        return redirect('master/header');
    }

    public function index_detail_update($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $master = DB::table('titem_dtl')->where('id_itemdtl',$id)->first();
        return view('itemdtl_edit',compact('master','nama_web'));
    }

    public function update_detail(Request $request){
        $delete = DB::table('titem_dtl')->where('id_itemdtl', $request->id)->first();

        if (file_exists(public_path('assets\picture'.'/'.$delete->picture))){
            unlink(public_path('assets\picture'.'/'.$delete->picture));
        }

        $detail =  [];
        $detail['vmodi'] = "Admin";
        $detail['dmodi'] = Carbon::now();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->move(public_path('assets/picture'), $file);
            $detail['picture']=$file;


        }
        $add = DB::table('titem_dtl')->where('id_itemdtl', $request->id)->update($detail);
        if (!$add){
            Alert::error('Error', 'Data cannot be update');
        } else{
            Alert::Success('success', 'Data has been updated');
        }

        return redirect('master/header');
    }

    //MasterToko
    public function index_headertk(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $master = DB::table('users')->join('trole', 'users.id_role', '=', 'trole.id_role')
        ->get(['users.*', 'trole.vrole_name'])->where('id_role',44441);

        dd($master);
        return view('mastertoko',compact ('master','nama_web'));
    }

    public function store_headertk(Request $request){
            $query = DB::table('users')
           ->insert([
                    'vname' => $request->nama,
                    'id_user' => $request->id,
                    'vno_telp'=>$request->no_hptoko,
                    'vaddress' => $request->address,
                    'email' =>$request->email,
                    'password' =>bcrypt($request->password),
                    'istatus_user' => 1,
                    'profile_picture' => $picture,
                    'id_role' => $request->role,
                    'vcrea' => Auth::user()->email,
                    'dcrea' => Carbon::now()
                ]);
            if (!$query){
                Alert::error('Error', 'Data cannot be store');
            } else {
                Alert::Success('success', 'Data has been store');
            }
        return redirect('master/toko');
    }

    public function index_deletetk($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $admin = DB::table('users')->where('id_user',$id)->first();
        return view('mastertoko_delete',compact('admin','nama_web'));
        
    }

    public function delete_headertk(Request $request){
        $check = DB::table('users')->where(['id_user'=>$request->id])->first();
        if (!$check){
            Alert::error('Error', 'Data cannot be change');
        } else{
            DB::table('users')->where(['id_user'=>$request->id])
            ->update([
                'vname' => $request->name,
                'istatus_user' => $request->status,
                'vmodi' => Auth::user()->id_role,
                'dmodi' => Carbon::now()
            ]);
            Alert::Success('success', 'Data has been Updated');

        }
        return redirect('master/toko');
    }

    public function index_updatetk($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        //$category = DB::table('tcategory')->select('tcategory.id_category','tcategory.vcategory')->get();
        $master = DB::table('users')->where('id_user',$id)->first();
        return view('mastertoko_edit',compact('master','nama_web'));
    }

    public function update_headertk(Request $request){
        $query = DB::table('users')->where('id_user',$request->id)->update([
            'vname' => $request->name,
            'id_user' => $request->id,
            'vno_telp' => $request->no_telp,
            'vaddress' => $request->address,
            'vcrea' => Auth::user()->email,
            'dcrea' => Carbon::now()
        ]);

        if (!$query){
            Alert::error('Error', 'Data cannot be update');
        } else {
            Alert::Success('success', 'Data has been updated');
        }

        return redirect('master/toko');
    }

     // Master Event
     public function index_event(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
    $master = DB::table('tevent')
    ->join('users', 'tevent.id_user', '=', 'users.id_user')
    ->get(['tevent.*','users.vname']);
    $user = DB::table('users')
    ->join('trole','users.id_role', '=', 'trole.id_role')->where('id_user', Auth::user()->id_user)->where('trole.id_role',44441)->get(); 
    return view('masterevent',compact ('master','nama_web', 'user'));
    }

    
public function insert_event(Request $request) {
    $query = DB::table('tevent')
    ->insert([
             'igambar'=> $request->gambar,
             'discount'=> $request->discount,
             'id_user'=> $request->user,
             'id_role'=> $request->role,
             'vdesc' => $request->desc,
             'dstartevent' => $request->waktumulai,
             'dsendevent' => $request-> waktuselesai,
             'vcrea' => Auth::user()->email,
             'dcrea' => Carbon::now()
         ]);
     if (!$query){
         Alert::error('Error', 'Data cannot Insert');
     } else {
         Alert::Success('success', 'Data has been Insert');
     }
 return redirect('master/event');
}

public function index_updateevent($id){
    $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
    $master = DB::table('tevent')->where('id_event',$id)->first();
    return view('masterevent_edit',compact('master','nama_web'));
}

public function update_event(Request $request){
     $check = DB::table('tevent')->where(['id_event'=>$request->id])->first();
    if (!$check){
        Alert::error('Error', 'Data cannot be change');
    } else{
        DB::table('tevent')->where(['id_event'=>$request->id])
        ->update([
            'igambar'=> $request->gambar,
             'discount'=> $request->discount,
             'vdesc' => $request->desc,
             'dstartevent' => $request->waktumulai,
             'dsendevent' => $request-> waktuselesai,
             'vcrea' => Auth::user()->email,
             'dcrea' => Carbon::now()
        ]);
        Alert::Success('success', 'Data has been Updated');

    }
    return redirect('master/event');
}


public function index_deleteevent($id){
    $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
    return view('masterevent_delete',compact('id','nama_web'));
}

public function delete_event(Request $request){
        $query = DB::table('tevent')->where('id_event',$request->id)->delete();
        Alert::Success('success', 'Data has been deleted');

    return redirect('master/event');
}

//MasterDiskon
public function index_discount(){
    $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
    $master = DB::table('tdiscount')
    //->join('ttransaction_event' , 'tdiscount.id_discount', '=', 'ttransaction_event.id_discount')
    //->get(['tdiscount.*', 'ttransaction_event.id_discount']);
    ->get();

    return view('masterdiscount',compact ('master','nama_web'));
}

 public function store_discount(Request $request){
        $query = DB::table('tdiscount')
       ->insert([
        'vdesc' => $request->description,
        'percentage' => $request->percentage,
        'value' => $request->value,
        'vcrea' => Auth::user()->email,
        'dcrea' => Carbon::now()
    ]);
    if (!$query){
        Alert::error('Error', 'Data cannot be store');
    } else {
        Alert::Success('success', 'Data has been store');
    }
return redirect('master/discount');
}

public function index_discountdlt($id){
    $nama_web = DB::table('tglobalsetting')->where('id_global',3)->first();
    return view('masterdiscount_delete',compact('id','nama_web'));
}
    
public function delete_discount(Request $request){
    $query = DB::table('tdiscount')->where('id_discount',$request->id)->delete();
    Alert::Success('success', 'Data has been deleted');
    return redirect('master/discount');
}

public function index_discountup($id){
    $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
    $master = DB::table('tdiscount')->where('id_discount',$id)->first();
    return view('masterdiscount_edit',compact('master','nama_web'));
}

public function update_discount(Request $request){
    $query = DB::table('tdiscount')->where('id_discount',$request->id)->update([
        'id_discount' => $request->discount,
        'percentage'=> $request->percentage,
        'vdesc'=>$request->description,
        'value'=>$request->value,
        'vmodi' => Auth::user()->email,
        'dmodi' => Carbon::now()
    ]);

    if (!$query){
        Alert::error('Error', 'Data cannot be update');
    } else {
        Alert::Success('success', 'Data has been updated');
    }

    return redirect('master/discount');
}    
}
