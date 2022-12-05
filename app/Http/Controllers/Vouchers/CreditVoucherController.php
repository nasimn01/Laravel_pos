<?php

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\Controller;

use App\Models\Vouchers\CreditVoucher;
use App\Models\Vouchers\CreVoucherBkdn;
use App\Models\Vouchers\GeneralVoucher;
use App\Models\Vouchers\GeneralLedger;
use App\Models\Accounts\child_one;
use App\Models\Accounts\child_two;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

use DB;
use Session;

class CreditVoucherController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditVoucher= CreditVoucher::paginate(10);
        return view('voucher.creditVoucher.index',compact('creditVoucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymethod=array();
        $account_data=child_one::whereIn('head_code',[11001,11002])->get();
        
        if($account_data){
            foreach($account_data as $ad){
                $shead=child_two::where('child_one_id',$ad->id);
                if($shead->count() > 0){
					$shead=$shead->get();
                    foreach($shead as $sh){
                        $paymethod[]=array(
                                        'id'=>$sh->id,
                                        'head_code'=>$sh->head_code,
                                        'head_name'=>$sh->head_name,
                                        'table_name'=>'child_twos'
                                    );
                    }
                }else{
                    $paymethod[]=array(
                        'id'=>$ad->id,
                        'head_code'=>$ad->head_code,
                        'head_name'=>$ad->head_name,
                        'table_name'=>'child_ones'
                    );
                }
                
            }
        }

        return view('voucher.creditVoucher.create',compact('paymethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_voucher_no(){
		$voucher_no="";
		$query = GeneralVoucher::latest()->first();
		if(!empty($query)){
		    $voucher_no = $query->voucher_no;
			$voucher_no+=1;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}else {
			$voucher_no=10000001;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(CreditVoucher $creditVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditVoucher $creditVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditVoucher $creditVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditVoucher $creditVoucher)
    {
        //
    }
}
