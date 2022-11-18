<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;

use App\Models\Accounts\master_account;
use Illuminate\Http\Request;
use App\Http\Requests\Accounts\Master\AddNewRequest;
use App\Http\Requests\Accounts\Master\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use Exception;


class MasterAccountController extends Controller
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
            $data = master_account::where(company())->paginate(10);
        else
            $data = master_account::where(company())->where(branch())->paginate(10);

        return view('master.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Accounts\master_account  $master_account
     * @return \Illuminate\Http\Response
     */
    public function show(master_account $master_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounts\master_account  $master_account
     * @return \Illuminate\Http\Response
     */
    public function edit(master_account $master_account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounts\master_account  $master_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, master_account $master_account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounts\master_account  $master_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(master_account $master_account)
    {
        //
    }
}
