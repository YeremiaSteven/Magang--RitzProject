<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use DB;
use Redirect;
use Xendit\Xendit;

class XenditController extends Controller
{
    public function store(Request $request)
    {

        $secret_key = 'Basic '.config('xendit.key_auth');
        $external_id = Str::random(10);

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => $request->amount
        ]);

        $response = $data_request->object();
        $cart_data = DB::table('tcart')->where('id_user',Auth::user()->id_user)->get();
        $count_data = DB::table('tcart')->where('id_user',Auth::user()->id_user)->count();

        Payment::create([
            'vsecret_code' => $external_id,
            'vdescription' => $request->notes,
            'ipayment_status' => $response->status,
            'vpayment_link' => $response->invoice_url,
            'iamount'=> $request->amount,
            'vcrea' => Auth::user()->email,
            'dcrea' => Carbon::now(),
        ]);

        $check_payment =DB::table('tpayment')->where('dcrea',Carbon::now())->first();

        DB::table('ttransaction_hdr')->insert([

            'id_user' => Auth::user()->id_user,
            'id_payment' => $check_payment->id_payment,
            'itotal_quantity' => $count_data,
            'itracking_status' => 0,
            'vaddress' => $request->address,
            'vnote' => $request->notes,
            'itotal_price' => $request->amount,
            'vcrea' => Auth::user()->email,
            'dcrea' => Carbon::now(),
        ]);

        $check_transaction = DB::table('ttransaction_hdr')->where('dcrea',Carbon::now())->first();
        if(!is_null($check_transaction)){
            foreach($cart_data as $i){
                \DB::table('titem_hdr')->where('id_item',$i->id_item)->decrement('istock',$i->iquantity);
                \DB::table('ttransaction_dtl')->insert([
                    'id_transaction' => $check_transaction->id_transaction,
                    'id_item' => $i->id_item,
                    'iquantity' => $i->iquantity,
                    'dspack' => Carbon::now(),
                    'vcrea' => Auth::user()->email,
                    'dcrea' => Carbon::now(),
                ]);
            }
            \DB::table('tcart')->where('id_user',Auth::user()->id_user)->delete();
        }

        return redirect($response->invoice_url)->with('target','_blank');
    }


}
