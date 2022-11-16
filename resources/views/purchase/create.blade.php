@extends('layout.app')

@section('pageTitle',trans('Create Purchase'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route(currentUser().'.purchase.store')}}">
                                @csrf
                                <div class="row">
                                    @if( currentUser()=='owner')
                                    <div class="col-md-2 mt-2">
                                        <label for="branch_id" class="float-end" ><h6>Branches Name</h6></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <select onchange="change_data(this.value)" class="form-control" name="branch_id" id="branch_id">
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
                                        <input type="hidden" value="{{ branch()['branch_id']}}" name="branch_id">
                                    @endif

                                    
                                        
                                    <div class="col-md-2 mt-2">
                                        <label for="supplierName" class="float-end"><h6>Supplier</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-group" name="supplierName" id="supplierName">
                                            <option value="">Select Supplier</option>
                                            @forelse($suppliers as $d)
                                                <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('supplierName')==$d->id?"selected":""}}> {{ $d->supplier_name}}</option>
                                            @empty
                                                <option value="">No Supplier found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                    @if($errors->has('supplierName'))
                                    <span class="text-danger"> {{ $errors->first('supplierName') }}</span>
                                    @endif


                                    <div class="col-md-2 mt-2">
                                        <label for="warehouseName" class="float-end"><h6>Warehouse</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-group" name="warehouseName" id="warehouseName">
                                            <option value="">Select Warehouse</option>
                                            @forelse($Warehouses as $d)
                                                <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('warehouseName')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                            @empty
                                                <option value="">No Warehouse found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                    @if($errors->has('warehouseName'))
                                        <span class="text-danger"> {{ $errors->first('warehouseName') }}</span>
                                    @endif 
                                    

                                    <div class="col-md-2 mt-2">
                                        <label for="date" class="float-end"><h6>Date</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="purchase_date" class="form-control" value="{{ old('purchase_date')}}" name="purchase_date">
                                    </div>


                                    <div class="col-md-2 mt-2">
                                        <label for="reference_no" class="float-end"><h6>Reference Number</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="{{ old('reference_no')}}" name="reference_no">
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-8 offset-2">
                                        <input type="text" name="" id="product_search" class="form-control" placeholder="Search Product">
                                    </div>
                                </div>
                                <table class="table mb-5">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th class="p-3">Product Name</th>
                                            <th class="p-3">Quantity</th>
                                            <th class="p-3">Purchase Price</th>
                                            <th class="p-3">Tax %</th>
                                            <th class="p-3">Tax Amount</th>
                                            <th class="p-3">Discount(%)</th>
                                            <th class="p-3">Unit Cost</th>
                                            <th class="p-3">Total Amount</th>
                                            <th class="p-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                                <div class="row mb-5">
                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Total Quantities</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0</h6></label>
                                    </div>

                                    
                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Subtotal</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0.00</h6></label>
                                    </div>


                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Other Charges</h6></label> 
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control form-group">
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control form-group" name="" id="">
                                            <option value="">Select</option>
                                            <option value="">None</option>
                                            <option value="">N/A</option>
                                        </select>
                                    </div>


                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Other Charges</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0.00</h6></label>
                                    </div>


                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Discount on</h6></label> 
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control form-group">
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control form-group" name="" id="">
                                            <option value="">Select</option>
                                            <option value="">Per%</option>
                                            <option value="">Fixed</option>
                                        </select>
                                    </div>


                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Discount on</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0.00</h6></label>
                                    </div>

                                    
                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Note</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <textarea class="form-control" name="" id="" rows="2"></textarea>
                                    </div>


                                    <div class="col-2 mt-2">
                                        <label for="" class="float-end form-group"><h6>Round Of</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0.00</h6></label>
                                    </div>

                                    
                                    <div class="col-8 mt-2">
                                        <label for="" class="float-end form-group"><h6>Grand Total</h6></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="" class="float-start form-group"><h6>0.00</h6></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="total_quantity">QTY</label>
                                            <input type="text" class="form-control" value="{{ old('total_quantity')}}" name="total_quantity">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="sub_amount">Sub Amount</label>
                                            <input type="text" class="form-control" value="{{ old('sub_amount')}}" name="sub_amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tax">TAX</label>
                                            <input type="text"  class="form-control" value="{{ old('tax')}}" name="tax">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="discount_type">Discount type</label>
                                            <input type="text" class="form-control" value="{{ old('discount_type')}}" name="discount_type">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="discount">Discount</label>
                                            <input type="text" class="form-control" value="{{ old('discount')}}" name="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="total_amount">Total Amount</label>
                                            <input type="text" class="form-control" value="{{ old('total_amount')}}" name="total_amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="round_of">RoundOf</label>
                                            <input type="text" class="form-control" value="{{ old('round_of')}}" name="round_of">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="grand_total">Grand Total</label>
                                            <input type="text" class="form-control" value="{{ old('grand_total')}}" name="grand_total">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Note</label>
                                            <textarea class="form-control" name="note" id="note" rows="2">{{ old('note')}}</textarea>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" value="{{ old('status')}}" name="status">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="status_note">Payment Status</label>
                                            <input type="text" class="form-control" value="{{ old('status_note')}}" name="status_note">
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
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection

@push('scripts')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script>
    function change_data(e){
        $('.brnch').hide();
        $('.brnch'e).show();
    }

</script>

<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "fetchData.php",
    });
});
</script>
@endpush
