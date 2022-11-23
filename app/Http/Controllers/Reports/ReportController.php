<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;

use App\Models\Purchases\Purchase_details;
use App\Models\Suppliers\Supplier;
use DB;

class ReportController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $data= Purchase_details::paginate(10);
        return view('reports.pview',compact('data','suppliers'));
    }

    public function stockreport()
    {
        $stock= DB::select("SELECT products.product_name,stocks.*,sum(stocks.quantity) as qty, AVG(stocks.unit_price) as avunitprice FROM `stocks` join products on products.id=stocks.product_id GROUP BY stocks.product_id");
        return view('reports.sview',compact('stock'));
    }
}