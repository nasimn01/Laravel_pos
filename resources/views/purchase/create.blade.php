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
                                        <select onchange="change_data(this.value)" class="form-control form-select" name="branch_id" id="branch_id">
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
                                        
                                        <select class="form-control form-select" name="supplierName" id="supplierName">
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
                                        <label for="warehouse_id" class="float-end"><h6>Warehouse</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-select" name="warehouse_id" id="warehouse_id">
                                            @forelse($Warehouses as $d)
                                                <option class="brnch brnch{{$d->branch_id}}" value="{{$d->id}}" {{ old('warehouse_id')==$d->id?"selected":""}}> {{ $d->name}}</option>
                                            @empty
                                                <option value="">No Warehouse found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                    @if($errors->has('warehouse_id'))
                                        <span class="text-danger"> {{ $errors->first('warehouse_id') }}</span>
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
                                        <input type="text" name="" id="item_search" class="form-control  ui-autocomplete-input" placeholder="Search Product">
                                    </div>
                                </div>
                                <table class="table mb-5">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th class="p-2">Product Name</th>
                                            <th class="p-2">Quantity</th>
                                            <th class="p-2">Purchase Price</th>
                                            <th class="p-2">Tax %</th>
                                            <th class="p-2">Tax Amount</th>
                                            <th class="p-2">Discount(%)</th>
                                            <th class="p-2">Unit Cost</th>
                                            <th class="p-2">Total Amount</th>
                                            <th class="p-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="details_data">

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
                                        <select class="form-control form-select" name="" id="">
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
                                        <select class="form-control form-select" name="" id="">
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
        $('.brnch'+e).show();
    }

</script>

<script>
$(function() {
    $("#item_search").bind("paste", function(e){
        $("#item_search").autocomplete('search');
    } );
    $("#item_search").autocomplete({
        source: function(data, cb){
            
            $.ajax({
            autoFocus:true,
                url: "{{route(currentUser().'.pur.product_search')}}",
                method: 'GET',
                dataType: 'json',
                data: {
                    name: data.term
                },
                success: function(res){
                console.log(res);
                    var result;
                    result = [{label: 'No Records Found ',value: ''}];
                    if (res.length) {
                        result = $.map(res, function(el){
                            return {
                                label: el.value +'--'+ el.label,
                                value: '',
                                id: el.id,
                                item_name: el.value
                            };
                        });
                    }

                    cb(result);
                },error: function(e){
                    console.log("error "+e);
                }
            });
        },

            response:function(e,ui){
            if(ui.content.length==1){
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete("close");
            }
            //console.log(ui.content[0].id);
            },

            //loader start
            search: function (e, ui) {
            },
            select: function (e, ui) { 
                if(typeof ui.content!='undefined'){
                console.log("Autoselected first");
                if(isNaN(ui.content[0].id)){
                    return;
                }
                var item_id=ui.content[0].id;
                }
                else{
                console.log("manual Selected");
                var item_id=ui.item.id;
                }

                return_row_with_data(item_id);
                $("#item_search").val('');
            },   
            //loader end
    });


});

function return_row_with_data(item_id){
  $("#item_search").addClass('ui-autocomplete-loader-center');
	
	var rowcount=$("#hidden_rowcount").val();
    $.ajax({
            autoFocus:true,
                url: "{{route(currentUser().'.pur.product_search_data')}}",
                method: 'GET',
                dataType: 'json',
                data: {
                    item_id: item_id
                },
                success: function(res){
                    
                    $('#details_data').append(res);
                    //$("#hidden_rowcount").val(parseFloat(rowcount)+1);
                    success.currentTime = 0;
                    success.play();
                    enable_or_disable_item_discount();
                    $("#item_search").removeClass('ui-autocomplete-loader-center');


                   
                },error: function(e){
                    console.log("error "+e);
                }
            });
	
}
//INCREMENT ITEM
function increment_qty(rowcount){
  var item_qty=$("#td_data_"+rowcount+"_3").val();
  var available_qty=$("#tr_available_qty_"+rowcount+"_13").val();
  //if(parseFloat(item_qty)<parseFloat(available_qty)){
    item_qty=parseFloat(item_qty)+1;
    $("#td_data_"+rowcount+"_3").val(item_qty.toFixed(2));
  //}
  calculate_tax(rowcount);
}
//DECREMENT ITEM
function decrement_qty(rowcount){
  var item_qty=$("#td_data_"+rowcount+"_3").val();
  if(item_qty<=1){
    $("#td_data_"+rowcount+"_3").val((1).toFixed(2));
    return;
  }
  $("#td_data_"+rowcount+"_3").val((parseFloat(item_qty)-1).toFixed(2));
  calculate_tax(rowcount);
}

//CALCUALATED SALES PRICE
function calculate_sales_price(rowcount){
  var purchase_price = (isNaN(parseFloat($("#td_data_"+rowcount+"_10").val().trim()))) ? 0 :parseFloat($("#td_data_"+rowcount+"_10").val().trim()); 
  var profit_margin = (isNaN(parseFloat($("#td_data_"+rowcount+"_12").val().trim()))) ? 0 :parseFloat($("#td_data_"+rowcount+"_12").val().trim()); 
  var tax_type = $("#tax_type").val();
  var sales_price =parseFloat(0);
    sales_price = purchase_price + ((purchase_price*profit_margin)/parseFloat(100));
  $("#td_data_"+rowcount+"_13").val(sales_price.toFixed(2));
}
//END
//CALCULATE PROFIT MARGIN PERCENTAGE
function calculate_profit_margin(rowcount){
  var purchase_price = (isNaN(parseFloat($("#td_data_"+rowcount+"_10").val().trim()))) ? 0 :parseFloat($("#td_data_"+rowcount+"_10").val().trim()); 
  var sales_price = (isNaN(parseFloat($("#td_data_"+rowcount+"_13").val().trim()))) ? 0 :parseFloat($("#td_data_"+rowcount+"_13").val().trim());  
  var profit_margin = (sales_price-purchase_price);
  var profit_margin = (profit_margin/purchase_price)*parseFloat(100);
  $("#td_data_"+rowcount+"_12").val(profit_margin.toFixed(2));
}
//END

</script>
@endpush
