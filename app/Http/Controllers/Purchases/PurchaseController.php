<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;

use App\Models\Purchases\Purchase;
use App\Models\Suppliers\Supplier;
use App\Models\Branch;
use App\Models\Warehouse;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Purchases\AddNewRequest;
use App\Http\Requests\Purchases\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Exception;


class PurchaseController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( currentUser()=='owner')
            $purchases = Purchase::where(company())->paginate(10);
        else
            $purchases = Purchase::where(company())->where(branch())->paginate(10);
            
        
        return view('purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::where(company())->get();
        if( currentUser()=='owner'){
            $suppliers = Supplier::where(company())->get();
            $Warehouses = Warehouse::where(company())->get();
        }else{
            $suppliers = Supplier::where(company())->where(branch())->get();
            $Warehouses = Warehouse::where(company())->where(branch())->get();
        }
        
        return view('purchase.create',compact('branches','suppliers','Warehouses'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_search(Request $request)
    {
        if($request->product_data){
            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $pur= new Purchase;
            $pur->supplier_id=$request->supplierName;
            $pur->purchase_date=$request->purchase_date;
            $pur->reference_no=$request->reference_no;
            $pur->total_quantity=$request->total_quantity;
            $pur->sub_amount=$request->sub_amount;
            $pur->tax=$request->tax;
            $pur->discount=$request->discount;
            $pur->total_amount=$request->total_amount;
            $pur->round_of=$request->round_of;
            $pur->grand_total=$request->grand_total;
            $pur->note=$request->note;
            $pur->company_id=company()['company_id'];
            $pur->branch_id?branch()['branch_id']:null;
            $pur->warehouse_id=$request->warehouseName;

            $pur->payment_status=0;
            $pur->status=1;
            $pur->status_note=$request->status_note;
            
           
            if($pur->save())
                return redirect()->route(currentUser().'.purchase.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchases\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchases\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchases\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchases\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
