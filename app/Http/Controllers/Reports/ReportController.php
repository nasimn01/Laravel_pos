<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;

use App\Models\Purchases\Purchase_details;
use App\Models\Suppliers\Supplier;

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
}