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
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="branch_id">Branches Name</label>
                                                <select onchange="change_data(this.value)" class="form-control" name="branch_id" id="branch_id">
                                                    @forelse($branches as $b)
                                                        <option value="{{ $b->id }}" {{old('branch_id')==$b->id?'selected':''}}>{{ $b->name }}</option>
                                                    @empty
                                                        <option value="">No branch found</option>
                                                    @endforelse
                                                </select>
                                                @if($errors->has('branch_id'))
                                                <span class="text-danger"> {{ $errors->first('branch_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" value="{{ branch()['branch_id']}}" name="branch_id">
                                    @endif

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="supplierName">Supplier</label>
                                            <select class="form-control" name="supplierName" id="supplierName">
                                                <option value="">Select Supplier</option>
                                                @forelse($suppliers as $d)
                                                    <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('supplierName')==$d->id?"selected":""}}> {{ $d->supplier_name}}</option>
                                                @empty
                                                    <option value="">No Supplier found</option>
                                                @endforelse
                                            </select>
                                            @if($errors->has('supplierName'))
                                            <span class="text-danger"> {{ $errors->first('supplierName') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="warehouseName">Warehouse</label>
                                            <select class="form-control" name="warehouseName" id="warehouseName">
                                                <option value="">Select Warehouse</option>
                                                @forelse($Warehouses as $d)
                                                    <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('warehouseName')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                                @empty
                                                    <option value="">No Warehouse found</option>
                                                @endforelse
                                            </select>
                                            @if($errors->has('warehouseName'))
                                            <span class="text-danger"> {{ $errors->first('warehouseName') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" id="purchase_date" class="form-control" value="{{ old('purchase_date')}}" name="purchase_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="reference_no">Reference Number</label>
                                            <input type="text" class="form-control" value="{{ old('reference_no')}}" name="reference_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="" id="product_search" class="form-control" placeholder="Search Product">
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
