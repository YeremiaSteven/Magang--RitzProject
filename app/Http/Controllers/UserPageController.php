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
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('titem_hdr')->where('iflashsale',1)->select('titem_hdr.*')->get();
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
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['id_category'] = $u->id_category;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;
            $item[$i]['iprice'] = $u->iprice;
            $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $disc->dvalue);

            $item[$i]['iflashsale'] = $u->iflashsale;
            $item[$i]['iactive'] = $u->iactive;
        }
        return view('flash_sale',compact ('item','nama_web'));
    }

    public function product_more(){
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('titem_hdr')->where('iflashsale',0)->select('titem_hdr.*')->get();

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
            $item[$i]['vname_item'] = $u->vname_item;
            $item[$i]['id_category'] = $u->id_category;
            $item[$i]['vdescription'] = $u->vdescription;
            $item[$i]['istock'] = $u->istock;
            $item[$i]['iprice'] = $u->iprice;
            // $item[$i]['iprice_after'] = $u->iprice - ($u->iprice * $u->idisc);

            $item[$i]['iflashsale'] = $u->iflashsale;
            $item[$i]['iactive'] = $u->iactive;
        }
        return view('product_more',compact ('item','nama_web'));
    }

    public function detail_info($id)
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $picture = DB::table('titem_dtl')->where('id_item', $id)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
        $disc = DB::table('tglobalsetting')->select('dvalue')->where('vname','disc_flashsale')->first();
        $detail_item = DB::table('titem_hdr')->where('id_item', $id)->first();
        $wishlist = DB::table('twishlist')->where('id_item', $id)->first();
        return view('product_detail',compact('detail_item','picture','disc','nama_web','wishlist'));
    }

    public function add_cart($id)
    {
        $check_id = DB::table('tcart')->where('id_item', $id)->first();
        if ($check_id == null){
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
                'iquantity'
            );
        }
        return redirect('cart');
    }

    public function cart()
    {
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $count = DB::table('tcart')->where('id_user', Auth::user()->id_user)
                ->join('titem_hdr', 'tcart.id_item', '=' , 'titem_hdr.id_item')
                ->select('tcart.*', 'titem_hdr.*')->get();
        $item =[];
        //discount for flashsale
        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();
        $disc = $tsetting->dvalue;
        //discount for member
        $tsetting2 = DB::table('tglobalsetting')->where('vname','disc_member')->first();
        $disc2 = $tsetting2->dvalue;
        foreach ($count as $i => $u){
            $item[$i]['index'] = $i;
            $vcategory = DB::table('tcategory')->where('id_category',$u->id_category)->first();
            $picture = DB::table('titem_dtl')->where('id_item', $u->id_item)->select('picture')->orderBy('id_itemdtl', 'asc')->first();
            if ($picture){
                $item[$i]['picture'] = $picture->picture;
            } else {
                $item[$i]['picture'] = null;
            }
            $item[$i]['id'] = $u->id_item;
            $item[$i]['vname_item'] = $u->vname_item;
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

        return view('cart', compact('item','address','address2','member','disc2','nama_web'));
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
        $wishlist = DB::table('twishlist')->where('id_user',Auth::user()->id_user)
                    ->join('titem_hdr', 'twishlist.id_item', '=' , 'titem_hdr.id_item')
                    ->get();
        $nama_web =  DB::table('tglobalsetting')->where('id_global',3)->first();
        $item =[];
        //discount for flashsale
        $tsetting = DB::table('tglobalsetting')->where('vname','disc_flashsale')->first();
        $disc = $tsetting->dvalue;
        foreach ($wishlist as $i => $u){
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
