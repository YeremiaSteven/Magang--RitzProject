<?php

// INI CONTROLLER UNTUK ITEM DAN CATEGORY ITEM
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Alert;
use PhpParser\Node\Stmt\Continue_;

class ItemController extends Controller
{

    public function categoryitem()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $category = DB::table('tcategory')->get();
        return view('categoryitem', compact('category','nama_web'));

    }

    public function store(Request $request){
        $request->validate(['categoryname' => 'required|unique:tcategory,vcategory']);

        //insert data ke table category
        $check_insert = DB::table('tcategory')->insert([
                            'vcategory' => $request->categoryname,
                            'vcrea' => Auth::user()->email,
                            'dcrea' => Carbon::now(),
        ]);

        if (!$check_insert){
            Alert::error('Error', 'Data cannot be store');
        } else {
            Alert::Success('success', 'Data has been Store');
        }

        return redirect("categoryitem");
    }


    public function category_editform($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $category = DB::table('tcategory')->where('id_category',$id)->first();
        return view('categoryitem_edit',compact('category','nama_web'));

    }

    public function category_update(Request $request)
    {
        $request->validate(['vcategory' => 'required|unique:tcategory,vcategory']);
        $check = DB::table('tcategory')->where(['id_category'=>$request->id])->first();
        if (!$check){
            Alert::error('Error', 'Data cannot be change');
        } else{
            DB::table('tcategory')->where(['id_category'=>$request->id])
                ->update([
                'vcategory' => $request->vcategory,
                'vmodi' => Auth::user()->email,
                'dmodi' => Carbon::now()
            ]);
            Alert::Success('success', 'Data has been Updated');

        }
        return redirect('categoryitem');
    }

    public function category_deleteform($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $category = DB::table('tcategory')->where('id_category',$id)->first();
        return view('categoryitem_delete',compact('category','nama_web'));
    }

    public function category_delete(Request $request)
    {
        // if($request->validate(['id' => 'exists:titem_hdr,id_category'])){
        //     Alert::error('Error', 'Data cannot be delete');
        //     return redirect("/categoryitem");
        // }

        DB::table('tcategory')->where('id_category', $request->id)->delete();
        Alert::Success('success', 'Data has been Deleted');
        return redirect("categoryitem");
    }


    public function transaction_hdr()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_hdr')
                    ->join('users','users.id_user','=','ttransaction_hdr.id_user')
                    ->select('ttransaction_hdr.*','users.vname')
                    ->get();
        return view('transaction_hdr',compact('transaction','nama_web'));
    }

    public function transaction_dtl()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_dtl')
                        ->join('titem_hdr','ttransaction_dtl.id_item','=','titem_hdr.id_item')
                        ->select('ttransaction_dtl.*','titem_hdr.vname_item')
                        ->get();
        return view('transaction_dtl',compact('transaction','nama_web'));
    }
    public function transaction_detail($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_dtl')->where('id_transaction',$id)
                        ->join('titem_hdr','ttransaction_dtl.id_item','=','titem_hdr.id_item')
                        ->select('ttransaction_dtl.*','titem_hdr.vname_item')
                        ->get();
        return view('transaction_admin_dtl',compact('transaction','nama_web'));
    }

    public function edit_status_form($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $status = DB::table('ttransaction_hdr')->where('id_transaction',$id)
                    ->join('users','users.id_user','=','ttransaction_hdr.id_user')
                    ->select('ttransaction_hdr.*','users.vname')->first();
        return view('edit_status_transaction',compact('status','nama_web'));
    }

    public function edit_status_transaction(Request $request){
        \DB::table('ttransaction_hdr')->where('id_transaction',$request->id)
        ->update([
            'itracking_status' => $request->status,
        ]);
        if($request->status == 1){
            \DB::table('ttransaction_dtl')->where('id_transaction',$request->id)
            ->update([
                'dssend' => Carbon::now(),
                'vmodi' => Auth::user()->email,
                'dmodi' => Carbon::now()
            ]);
        } else if($request->status == 2){
            \DB::table('ttransaction_dtl')->where('id_transaction',$request->id)
            ->update([
                'dsarriv' => Carbon::now(),
                'vmodi' => Auth::user()->email,
                'dmodi' => Carbon::now()
            ]);
        } else if($request->status == 3){
            \DB::table('ttransaction_dtl')->where('id_transaction',$request->id)
            ->update([
                'dsfail' => Carbon::now(),
                'vmodi' => Auth::user()->email,
                'dmodi' => Carbon::now()
            ]);
        }

        Alert::Success('success', 'Data has been Updated');
        return redirect('/transaction_hdr');
    }

    public function payment_detail($id){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $payment = DB::table('tpayment')->where('id_payment',$id)->get();
        return view('payment',compact('payment','nama_web'));
    }
}
