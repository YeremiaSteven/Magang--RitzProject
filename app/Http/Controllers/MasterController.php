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
            ->select('titem_hdr.*', 'tcategory.vcategory')->get();
        $category = DB::table('tcategory')
            ->select('tcategory.id_category','tcategory.vcategory')->get();
        return view('masterheader',compact ('master','category','nama_web'));
    }

    public function store_header(Request $request){
        if (strlen($request->barcode) <=20){
            $query = DB::table('titem_hdr')
                -> insert([
                    'vname_item' => $request->nama,
                    'id_category' => $request->category,
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
        $master = DB::table('titem_hdr')->where('id_item',$id)->first();
        return view('masterheader_edit',compact('master','category','nama_web'));
    }

    public function update_header(Request $request){
        $query = DB::table('titem_hdr')->where('id_item',$request->id)->update([
            'vname_item' => $request->name,
            'id_category' => $request->category,
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
            Alert::error('Error', 'Data cannot be delete');
        } else{
            Alert::Success('success', 'Data has been Deleted');
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
            Alert::Success('success', 'Data has been Deleted');
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
            Alert::error('Error', 'Data cannot be delete');
        } else{
            Alert::Success('success', 'Data has been Deleted');
        }

        return redirect('master/header');
    }

    //masterToko
    public function index_headertk(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $master = DB::table('tmastertoko')
            //->join('tcategory' , 'titem_hdr.id_category', '=', 'tcategory.id_category')
            ->select('tmastertoko.*')->get();
        //$category = DB::table('tcategory')
            //->select('tcategory.id_category','tcategory.vcategory')->get();
        return view('mastertoko',compact ('master','nama_web'));
    }

    public function store_headertk(Request $request){
        if (strlen($request->barcode) <=20){
            $query = DB::table('tmastertoko')
                -> insert([
                    'vname_toko' => $request->nama,
                    'id_toko' => $request->id,
                    'vaddress_toko' => $request->address,
                    'irating_toko' => $request->rating,
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

        return redirect('master/toko');
    }

    public function index_deletetk($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        return view('mastertoko_delete',compact('id','nama_web'));
    }

    public function delete_headertk(Request $request){
        // select titem_dtl.id_item from titem_hdr join titem_dtl on titem_hdr.id_item = titem_hdr.id_item where titem_hdr.id_item = 33332;



        $detail = DB::table('tmastertoko')->where('tmastertoko.id_toko',$request->id)
        //->join('titem_dtl' , 'titem_dtl.id_item', '=', 'titem_hdr.id_item')
        ->select('tmastertoko.id_toko')->first();

        $cart = DB::table('titem_hdr')->where('titem_hdr.id_item',$request->id)
        ->join('tcart' , 'tcart.id_item', '=', 'titem_hdr.id_item')
        ->select('tcart.id_item')->first();


        if (is_null($detail) && is_null($cart)){
            $query = DB::table('titem_hdr')->where('id_item',$request->id)->delete();
            Alert::Success('success', 'Data has been deleted');

        }else{
            Alert::error('Error', 'Data cannot be delete, detail item and customer cart must be delete first!');
        }


        return redirect('master/toko');
    }

    public function index_updatetk($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        //$category = DB::table('tcategory')->select('tcategory.id_category','tcategory.vcategory')->get();
        $master = DB::table('tmaster_toko')->where('id_toko',$id)->first();
        return view('mastertoko_edit',compact('master','nama_web'));
    }

    public function update_headertk(Request $request){
        $query = DB::table('tmaster_toko')->where('id_toko',$request->id)->update([
            'vname_toko' => $request->nama,
            'id_toko' => $request->id,
            'vaddress_toko' => $request->address,
            'irating_toko' => $request->rating,
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
}
