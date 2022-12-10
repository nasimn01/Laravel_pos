@extends('layout.app')
@section('pageTitle',trans('Transfer List'))
@section('pageSubTitle',trans('List'))

@section('content')
<<<<<<< HEAD
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.transfer.store')}}">
                                @csrf
                                <div class="row">
                                    @if( currentUser()=='owner')
                                        <div class="col-md-2 mt-2">
                                            <label for="branch_id" class="float-end" ><h6>{{__('Branches Name')}}</h6></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select onchange="change_data(this.value)" class="form-control form-select" name="branch_id" id="branch_id">
                                            <option value="">Select Branches</option>
                                                @forelse($branches as $b)
                                                    <option value="{{ $b->id }}" {{old('branch_id')==$b->id?'selected':''}}>{{ $b->name }}</option>
                                                @empty
                                                    <option value="">No branch found</option>
                                                @endforelse          
                                            </select>      
                                        </div>
                                        @if($errors->has('branch_id'))
                                            <span class="text-danger"> {{ $errors->first('branch_id') }}</span>
                                        @endif
                                        
                                    @else
                                        <input type="hidden" value="{{ branch()['branch_id']}}" name="branch_id" id="branch_id">
                                    @endif

                                    <div class="col-md-2 mt-2">
                                        <label for="date" class="float-end"><h6>{{__('Date')}}</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="transfer_date" class="form-control" value="{{ old('transfer_date')}}" name="transfer_date">
                                    </div>

                                    
                                    <div class="col-md-2 mt-2">
                                        <label for="warehouse_from" class="float-end"><h6>{{__('Warehouse From')}}</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-select" name="warehouse_from" id="warehouse_id">
                                        <option value="">Select Warehouse</option>
                                            @forelse($warehouses as $d)
                                                <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('warehouse_from')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                            @empty
                                                <option value="">No Warehouse found</option>
                                            @endforelse
                                        </select>
                                    </div>


                                    <div class="col-md-2 mt-2">
                                        <label for="warehouse" class="float-end"><h6>{{__('Warehouse To')}}</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-select" name="warehouse_to" id="warehouse_to">
                                        <option value="">Select Warehouse</option>
                                            @forelse($warehouses as $d)
                                                <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('warehouse_to')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                            @empty
                                                <option value="">No Warehouse found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                    @if($errors->has('warehouse_to'))
                                        <span class="text-danger"> {{ $errors->first('warehouse_to') }}</span>
                                    @endif 
                                    

                                    

                                </div>
                                <div class="row m-3">
                                    <div class="col-8 offset-2">
                                        <input type="text" name="" id="item_search" class="form-control  ui-autocomplete-input" placeholder="Search Product">
                                    </div>
                                </div>
                                <table class="table mb-5">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th class="p-2">{{__('Product Name')}}</th>
                                            <th class="p-2">{{__('Qty')}}</th>
                                            <th class="p-2">{{__('Sell Price')}}</th>
                                            <th class="p-2">{{__('Tax %')}}</th>
                                            <th class="p-2">{{__('Discount Type')}}</th>
                                            <th class="p-2">{{__('Discount')}}</th>
                                            <th class="p-2">{{__('Unit Cost')}}</th>
                                            <th class="p-2">{{__('Total Amount')}}</th>
                                            <th class="p-2">{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="details_data">

                                    </tbody>
                                </table>


                                <div class="row mb-5">
                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-4 offset-2 mt-2 text-end pe-3">
                                                <label for="" class="form-group"><h6>{{__('Total Quantities')}}</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2">
                                                <label for="" class="form-group"><h6 class="total_qty">0</h6></label>
                                                <input type="hidden" name="total_qty" class="total_qty_p">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 offset-2 mt-2 text-end pe-3">
                                                <label for="" class="form-group"><h6>{{__('Other Charges')}}</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2">
                                                <input type="text" class="form-control form-group" id="other_charge" name="other_charge" onkeyup="check_change()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 offset-2 mt-2 text-end pe-3">
                                                <label for="" class="form-group"><h6>{{__('Discount on')}}</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2">
                                                <input type="text" class="form-control form-group" id="discount_all" name="discount_all" onkeyup="check_change()">
                                            </div>
                                            <div class="col-2 mt-2">
                                                <select onchange="check_change()" class="form-control" id="discount_all_type" name="discount_all_type">
                                                    <option value="0">%</option>
                                                    <option value="1">Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 offset-2 mt-2 text-end pe-3">
                                                <label for="" class="form-group"><h6>Note</h6></label> 
                                            </div>
                                            <div class="col-6 mt-2">
                                                <textarea class="form-control" name="note" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-4 offset-4 mt-2 pe-2 text-end">
                                                <label for="" class="form-group"><h6>Subtotal</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2 pe-5 text-end">
                                                <label for="" class="form-group"><h6 class="tsubtotal">0.00</h6></label>
                                                <input type="hidden" name="tsubtotal" class="tsubtotal_p">
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-4 offset-4 mt-2 pe-2 text-end">
                                                <label for="" class="form-group"><h6>Other Charges</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2 pe-5 text-end">
                                                <label for="" class="form-group"><h6 class="tother_charge">0.00</h6></label>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-4 offset-4 mt-2 pe-2 text-end">
                                                <label for="" class="form-group"><h6>Discount on All</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2 pe-5 text-end">
                                                <label for="" class="form-group"><h6 class="tdiscount">0.00</h6></label>
                                                <input type="hidden" name="tdiscount" class="tdiscount_p">
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-4 offset-4 mt-2 pe-2 text-end">
                                                <label for="" class="form-group"><h6>Round Of</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2 pe-5 text-end">
                                                <label for="" class="form-group"><h6 class="troundof">0.00</h6></label>
                                                <input type="hidden" name="troundof" class="troundof_p">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 offset-4 mt-2 pe-2 text-end">
                                                <label for="" class="form-group"><h6>Grand Total</h6></label> 
                                            </div>
                                            <div class="col-4 mt-2 pe-5 text-end">
                                                <label for="" class="form-group"><h6 class="tgrandtotal">0.00</h6></label>
                                                <input type="hidden" name="tgrandtotal" class="tgrandtotal_p">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
=======

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div>
                    <a class="float-end" href="{{route(currentUser().'.transfer.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('From Branch')}}</th>
                                <th scope="col">{{__('From Warehouse')}}</th>
                                <th scope="col">{{__('To Warehouse')}}</th>
                                <th scope="col">{{__('Trasfer Date')}}</th>
                                <th scope="col">{{__('Quantity')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transfers as $s)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$s->branch?->name}}</td>
                                <td>{{$s->warehousef?->name}}</td>
                                <td>{{$s->warehouset?->name}}</td>
                                <td>{{$s->transfer_date}}</td>
                                <td>{{$s->quantity}}</td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
>>>>>>> 78fbd3b45201814473e8deff5dc4b614c8fb607f
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection