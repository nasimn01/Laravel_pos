@extends('layout.app')

@section('pageTitle',trans('Sales Reports'))
@section('pageSubTitle',trans('Reports'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="#">
                                @csrf
                                <div class="row">
                                    


                                    <div class="col-md-2 mt-2">
                                        <label for="fdate" class="float-end"><h6>Form Date</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="fdate" class="form-control" value="{{ old('fdate')}}" name="fdate">
                                    </div>


                                    <div class="col-md-2 mt-2">
                                        <label for="tdate" class="float-end"><h6>To Date</h6></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="tdate" class="form-control" value="{{ old('tdate')}}" name="tdate">
                                    </div>


                                    <div class="col-md-2 mt-4">
                                        <label for="supplierName" class="float-end"><h6>Customer</h6></label>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        
                                        <select class="form-control form-select" name="customerName" id="customerName">
                                            <option value="">Select Customer</option>
                                            @forelse($customers as $c)
                                                <option value="{{$c->id}}" {{ old('customerName')==$c->id?"selected":""}}> {{ $c->customer_name}}</option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>
                                    </div>


                                </div>
                                <div class="row m-4">
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="#" class="btn btn-sm btn-success me-1 mb-1 ps-5 pe-5">Show</button>
                                        
                                    </div>
                                    <div class="col-6 d-flex justify-content-Start">
                                        <button type="#" class="btn pbtn btn-sm btn-warning me-1 mb-1 ps-5 pe-5">Close</button>
                                        
                                    </div>
                                </div>
                                <table class="table mb-5">
                                    <thead>
                                        <tr class="bg-primary text-white text-center">
                                            <th class="p-2">#SL</th>
                                            <th class="p-2">Product ID</th>
                                            <th class="p-2">Product Name</th>
                                            <th class="p-2">Quantity</th>
                                            <th class="p-2">Unit Price</th>
                                            <th class="p-2">Sub Amount</th>
                                            <th class="p-2">Tax</th>
                                            <th class="p-2">Discount Type</th>
                                            <th class="p-2">Discount</th>
                                            <th class="p-2">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sales as $d)
                                        <tr class="text-center">
                                            <th scope="row">{{ ++$loop->index }}</th>
                                            <td>{{$d->product_id}}</td>
                                            <td>{{$d->product?->product_name}}</td>
                                            <td>{{$d->quantity}}</td>
                                            <td>{{$d->unit_price}}</td>
                                            <td>{{$d->sub_amount}}</td>
                                            <td>{{$d->tax}}</td>
                                            <td>{{$d->discount_type}}</td>
                                            <td>{{$d->discount}}</td>
                                            <td>{{$d->total_amount}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <th colspan="9" class="text-center">No data Found</th>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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