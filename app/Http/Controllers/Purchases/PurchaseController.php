<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;

use App\Models\Purchases\Purchase;
use App\Models\Suppliers\Supplier;
use App\Models\Products\Product;
use App\Models\Branch;
use App\Models\Warehouse;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Purchases\AddNewRequest;
use App\Http\Requests\Purchases\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Exception;
use DB;

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
        if($request->name){
            $product=Product::select('id','product_name as value','bar_code as label')->where(company())->where(function($query) use ($request) {
                        $query->where('product_name','like', '%' . $request->name . '%')->orWhere('bar_code','like', '%' . $request->name . '%');
                        })->get();
                      print_r(json_encode($product));  
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_search_data(Request $request)
    {
        if($request->item_id){
            $product=Product::where(company())->where('id',$request->item_id)->first();
            $data='<tr>';
            $data.='<td class="p-3">'.$product->product_name.'</td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='<td class="p-3">'.'<input type="text" class="form-control" value="'.$product->product_name.'"></td>';
            $data.='</tr>';
            /*<th class="p-3">Quantity</th>
            <th class="p-3">Purchase Price</th>
            <th class="p-3">Tax %</th>
            <th class="p-3">Tax Amount</th>
            <th class="p-3">Discount(%)</th>
            <th class="p-3">Unit Cost</th>
            <th class="p-3">Total Amount</th>
            <th class="p-3">Action</th>
        </tr>*/
                      print_r(json_encode($data));  
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
