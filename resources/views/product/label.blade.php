@extends('layout.app')

@section('pageTitle',trans('Product Label'))
@section('pageSubTitle',trans('Label'))

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
                                    
                                    <div class="row mb-3 p-3">
                                        <div class="col-6 ">
                                            <input type="text" name="" id="item_search" class="form-control  ui-autocomplete-input" placeholder="Search Product">
                                        </div>

                                        <div class="col-2 text-end me-0 pe-0">
                                            <button type="#" class="btn  btn-success   mb-1 ps-5 pe-5 ">Search</button>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-8">
                                        <table class="table mb-5">
                                            <thead>
                                                <tr class="bg-primary text-white text-center">
                                                    <th class="p-2">#SL</th>
                                                    <th class="p-2">Product Name</th>
                                                    <th class="p-2">Quantity</th>
                                                    <th class="p-2">Bar Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @forelse($stock as $s)
                                                <tr class="text-center">
                                                    <th scope="row">{{ ++$loop->index }}</th>
                                                    <td>{{$s->product_name}}</td>
                                                    <td>{{$s->quantity}}</td>
                                                    <td>{{$s->bar_code}}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <th colspan="4" class="text-center">No data Found</th>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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