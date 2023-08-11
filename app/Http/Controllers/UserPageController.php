<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Alert;
use Illuminate\Http\Request;

class UserPageController extends Controller
{

    public function flash_sale(){
        $wishlist = DB::table('twishlist')->where('id_item')->first();
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('titem_hdr')->where('iflashsale',1)
                ->join('users', 'titem_hdr.id_user', '=', 'users.id_user' )
                ->select('titem_hdr.*', 'users.vname')->get();
        $disc = DB::table('tglobalsetting')->select('dvalue')->where('vname','disc_flashsale')->first();
        $item = [];

        foreach ($count as $i => $u){
            $item[$i]['index'] = $i;
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id_item'] = $u->id_item;
            $item[$i]['vname'] = $u->vname;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['id_category'] = $u->id_category;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;
            $item[$i]['iprice'] = $u->iprice;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc->dvalue);

            $item[$i]['iflashsale'] = $u->iflashsale;
            $item[$i]['iactive'] = $u->iactive;
        }
        return view('flash_sale',compact ('item','wishlist','nama_web'));
    }

    public function product_more(){
        $wishlist = DB::table('twishlist')->where('id_item')->first();
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('titem_hdr')->where('iflashsale',0)
                ->join('users', 'titem_hdr.id_user', '=', 'users.id_user' )
                ->select('titem_hdr.*', 'users.vname')->get();

        $item = [];

        foreach ($count as $i => $u){
            $item[$i]['index'] = $i;
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id_item'] = $u->id_item;
            $item[$i]['vname'] = $u->vname;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['id_category'] = $u->id_category;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;
            $item[$i]['iprice'] = $u->iprice;
            // $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $u->idisc);

            $item[$i]['iflashsale'] = $u->iflashsale;
            $item[$i]['iactive'] = $u->iactive;
        }
        return view('product_more',compact ('item','wishlist','nama_web'));
    }

    public function detail_info($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $picture = DB::table('titem_dtl')->where('id_item', $id)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
        $disc = DB::table('tglobalsetting')->select('dvalue')->where('vname','disc_flashsale')->first();
        $detail_item = DB::table('titem_hdr')->where('id_item', $id)
            ->join('users', 'titem_hdr.id_user', '=', 'users.id_user' )
            ->select('titem_hdr.*', 'users.vname')->first();
        $wishlist = DB::table('twishlist')->where('id_item', $id)->first();
        return view('product_detail',compact('detail_item','picture','disc','nama_web','wishlist'));
    }

    public function add_cart($id)
    {
        $check_id = DB::table('tcart')->where('id_item', $id)->first();
        $detail = DB::table('titem_hdr')
                    ->join('users','titem_hdr.id_user', '=', 'users.id_user')
                    ->where('titem_hdr.id_item', $id)->first();
        $id_store = $detail->id_user;
        
        //dd($id_store);
        //dd($detail);

        if($id_store == 55585){
            if ($check_id == null){
                //dd($check_id);
                DB::table('tcart')->insert([
                    'id_item' => $id,
                    'id_user' => Auth::user()->id_user,
                    'iquantity' => 1,
                    'iactive' => 1,
                    'vcrea' => Auth::user()->email,
                    'dcrea' => Carbon::now()
                ]); 
            } else if ($check_id != null){
                DB::table('tcart')->increment(
                    'iquantity');
            
         };
        } else if ($id_store != 55585){
            Alert::warning('Warning', 'Sorry only 1 shop can do transactions')->autoclose(3500);
            return back();
        }
           
        return redirect('cart');
    }

    public function cart()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('tcart')
                ->where('tcart.id_user', Auth::user()->id_user)
                ->join('titem_hdr', 'tcart.id_item', '=' , 'titem_hdr.id_item')
                ->join('users', 'titem_hdr.id_user', '=', 'users.id_user')
                ->select('tcart.*', 'titem_hdr.*','users.vname')->get();
       
        $item =[];

        //discount for flashsale
        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();
        $disc = $tsetting->dvalue;
        //discount for member
        $tsetting2 = DB::table('tglobalsetting')->where('vname','disc_member')->first();
        $disc2 = $tsetting2->dvalue;
        
        //discount for birthdaycard

        //disount for event
        $discevent = DB::table('ttransaction_event')
            ->join('tdiscount','ttransaction_event.id_discount', '=' , 'tdiscount.id_discount' )
            ->join('tevent', 'ttransaction_event.id_event', '=', 'tevent.id_event')
            ->join('titem_hdr', 'ttransaction_event.id_item', '=', 'titem_hdr.id_item')
            ->join('users', 'ttransaction_event.id_user', '=', 'users.id_user')
            ->select('ttransaction_event.*','tdiscount.*','tevent.*', 'titem_hdr.*', 'users.vname')
            ->where('status',1)->first();
            
        $discevent2 = DB::table('ttransaction_event')
            ->join('tdiscount','ttransaction_event.id_discount', '=' , 'tdiscount.id_discount' )
            ->join('tevent', 'ttransaction_event.id_event', '=', 'tevent.id_event')
            ->join('titem_hdr', 'ttransaction_event.id_item', '=', 'titem_hdr.id_item')
            ->join('users', 'ttransaction_event.id_user', '=', 'users.id_user')
            ->select('ttransaction_event.*','tdiscount.*','tevent.*', 'titem_hdr.*', 'users.vname')
            ->get();

            //dd($discevent);
        
        foreach ($count as $i => $u){
            //dd($count);
            foreach($discevent2 as $x => $y){
                $discount[$x]['idxDisc'] = $y;
                if($y != null && $y->status = 1  && strtotime(date('d-m-Y')) >= $y->dstartevent && strtotime(date('d-m-Y')) <= $y->dsendevent
                && $y::where('id_event', $y->id_event)->where('id_item', $u->id_item)->first() != null)
                {
                    $event = $y::where('id_event', $y->id_event)->where('id_item', $u->id_item)->first();
                    
                    /*if($event->discount_type = 'percentage'){
                        $price -= ($price*$event->discount)/100;
                    }
                    elseif($event->discount_type == 'amount'){
                        $price -= $event->discount;
                    }
                    $inFlashDeal = true;
                   */
    
                }
            }
            //dd($event);
            //dd($discount);

            $item[$i]['index'] = $i;
            $vcategory = DB::table('tcategory')->where('id_category',$u->id_category)->first();
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            //dd($discount);
            //dd($item);
            $item[$i]['id'] = $u->id_item;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['vname'] = $u->vname;
            $item[$i]['vcategory'] = $vcategory->vcategory;
            $item[$i]['iquantity'] = $u->iquantity;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc);
            $item[$i]['iprice'] = $u->iprice ;
            $item[$i]['iactive'] = $u->iactive;
        }
       
        
        $member = DB::table('tmember')->where('id_user', Auth::user()->id_user)->first();
        $address = DB::table('taddress')->where('id_user', Auth::user()->id_user)->where('istatus_address',1)->first();
        $address2 = DB::table('taddress')->where('id_user', Auth::user()->id_user)->get();

        // $title = 'Check out!';
        // $text = "Are you sure you want to check out this item?";
        // confirmDelete($title, $text);

        return view('cart', compact('item','address','address2','member','discevent','discevent2','disc2','nama_web'));
    }

    public function cart_voucher_select(Request $request)
    {
    
        DB::table('ttransaction_event')->where('status',1)
                ->update([
                    'status' => 0
                ]);

        DB::table('ttransaction_event')->where('id_ttransaction_event',$request->id)
                ->update([
                    'status' => 1
                ]);

        return back();
    }
    
    public function cart_address_select(Request $request)
    {
    
        DB::table('taddress')->where('istatus_address',1)
                ->update([
                    'istatus_address' => 0
                ]);

        DB::table('taddress')->where('id_table',$request->id)
                ->update([
                    'istatus_address' => 1
                ]);

        return back();
    }

    public function item_cart_increa($id){
        DB::table('tcart')->where('id_item',$id)->increment('iquantity');
        return redirect()->back();
    }

    public function item_cart_decrea($id){
        DB::table('tcart')->where('id_item',$id)->decrement('iquantity');
        return redirect()->back();
    }

    public function item_cart_delete($id){
        DB::table('tcart')->where('id_item',$id)->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function wishlist()
    {
        $wishlist = DB::table('twishlist')->where('twishlist.id_user',Auth::user()->id_user)
                    ->join('titem_hdr', 'twishlist.id_item', '=' , 'titem_hdr.id_item')
                    ->select('twishlist.*', 'titem_hdr.*')->get();
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $item =[];
        //discount for flashsale
        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();
        $disc = $tsetting->dvalue;
        foreach ($wishlist as $i => $u){
            $item[$i]['index'] = $i;
            $detail = DB::table('titem_hdr')->where('id_item', $u->id_item)
                        ->join('users', 'titem_hdr.id_user', '=', 'users.id_user' )
                        ->select('titem_hdr.*', 'users.vname')->first();
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id_item'] = $u->id_item;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['vname'] = $detail->vname;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc);
            $item[$i]['iprice'] = $u->iprice;
            $item[$i]['iflashsale'] = $u->iflashsale;
        }
        
        return view('wishlist',compact('nama_web','item'));
    }
    public function transaction_ongoing()
    {
        $item_detail = null;
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_hdr')->where('id_user',Auth::user()->id_user)
                            ->join('tpayment', 'ttransaction_hdr.id_payment', '=' ,'tpayment.id_payment')
                            ->select('ttransaction_hdr.*','tpayment.ipayment_status')
                            ->get();
        foreach ($transaction as $item => $u){
            $item_detail = DB::table('ttransaction_dtl')
                                ->join('titem_hdr', 'ttransaction_dtl.id_item', '=' ,'titem_hdr.id_item')
                                ->select('ttransaction_dtl.*','titem_hdr.vname_item')
                                ->get();
        }
        if(is_null($item_detail)){
            return view('transaction_ongoing', compact('nama_web','transaction'));
        }
        if(!is_null($item_detail)){
            return view('transaction_ongoing', compact('nama_web','transaction','item_detail'));
        }
    }

    public function wishlist_add($id){
        $wishlist = DB::table('twishlist')->where('id_item',$id)->first();
        if(is_null($wishlist)){
            
            DB::table('twishlist')->insert([
                'id_item' => $id,
                'id_user' => Auth::user()->id_user,
                'iactive' => 1,
                'vcrea' => Auth::user()->email,
                'dcrea' => Carbon::now(),
            ]);
        }
        if(!is_null($wishlist)){
            DB::table('twishlist')->where('id_item',$id)->delete();
        }

        
        return redirect()->back();
    }


    public function cancel_transaction($id)
    {
        $detail_transaction = \DB::table('ttransaction_dtl')->where('id_transaction',$id)->get();
        foreach($detail_transaction as $item => $u){
            \DB::table('titem_hdr')->where('id_item',$u->id_item)->increment('istock',$u->iquantity);
        }
        \DB::table('ttransaction_dtl')->where('id_transaction',$id)->update(['dsfail' => Carbon::now()]);
        \DB::table('ttransaction_hdr')->where('id_transaction',$id)->update(['itracking_status' => 3]);
        return redirect('/transaction_user/ongoing');
    }

    public function receive_transaction($id){
        \DB::table('ttransaction_dtl')->where('id_transaction',$id)->update(['dsarriv' => Carbon::now()]);
        \DB::table('ttransaction_hdr')->where('id_transaction',$id)->update(['itracking_status' => 2]);
        return redirect('/transaction_user/ongoing');
    }

    public function detail_transaction($id)
    {
        $address = DB::table('taddress')->where('id_user', Auth::user()->id_user)->where('istatus_address',1)->first();
        $member = DB::table('tmember')->where('id_user', Auth::user()->id_user)->first();

        //discount for flashsale
        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();
        $disc = $tsetting->dvalue;
        //discount for member
        $tsetting2 = DB::table('tglobalsetting')->where('vname','disc_member')->first();
        $disc2 = $tsetting2->dvalue;
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_hdr')->where('id_transaction',$id)->first();
        $item_detail = DB::table('ttransaction_dtl')->where('id_transaction',$id)
                        ->join('titem_hdr', 'ttransaction_dtl.id_item', '=' ,'titem_hdr.id_item')
                        ->select('ttransaction_dtl.*','titem_hdr.vname_item','titem_hdr.id_item','titem_hdr.vdescription','titem_hdr.iprice')
                        ->get();
        $item =[];
        foreach ($item_detail as $i => $u){
            $item[$i]['index'] = $i;
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id_item'] = $u->id_item;
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['iquantity'] = $u->iquantity;
            $item[$i]['iprice'] = $u->iprice;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc);
        }

        return view('transaction_detail',compact('transaction','item','nama_web','disc','disc2','member','address'));
    }

    public function transaction_done()
    {
        $item_detail = null;
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_hdr')->where('id_user',Auth::user()->id_user)
                            ->join('tpayment', 'ttransaction_hdr.id_payment', '=' ,'tpayment.id_payment')
                            ->select('ttransaction_hdr.*','tpayment.ipayment_status')
                            ->get();
        foreach ($transaction as $item => $u){
            $item_detail = DB::table('ttransaction_dtl')
                                ->join('titem_hdr', 'ttransaction_dtl.id_item', '=' ,'titem_hdr.id_item')
                                ->select('ttransaction_dtl.*','titem_hdr.vname_item')
                                ->get();
        }
        if(is_null($item_detail)){
            return view('transaction_done', compact('nama_web','transaction'));
        }
        if(!is_null($item_detail)){
            return view('transaction_done', compact('nama_web','transaction','item_detail'));
        }
    }

    public function transaction_payment()
    {
        $item_detail = null;
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $transaction = DB::table('ttransaction_hdr')->where('id_user',Auth::user()->id_user)
                            ->join('tpayment', 'ttransaction_hdr.id_payment', '=' ,'tpayment.id_payment')
                            ->select('ttransaction_hdr.*','tpayment.ipayment_status','tpayment.vpayment_link')
                            ->get();
        foreach ($transaction as $item => $u){
            $item_detail = DB::table('ttransaction_dtl')
                                ->join('titem_hdr', 'ttransaction_dtl.id_item', '=' ,'titem_hdr.id_item')
                                ->select('ttransaction_dtl.*','titem_hdr.vname_item')
                                ->get();
        }
        if(is_null($item_detail)){
            return view('transaction_payment', compact('nama_web','transaction'));
        }
        if(!is_null($item_detail)){
            return view('transaction_payment', compact('nama_web','transaction','item_detail'));
        }
    }
    // public function wishlist()
    // {
    //     return view('wishlist');
    // }

}
