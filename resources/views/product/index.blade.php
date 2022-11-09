@extends('layout.app')
@section('pageTitle','Product List')
@section('pageSubTitle','List')

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.product.create')}}"><i class="bi bi-pencil-square"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Bar Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Child Category</th>
                                    <th scope="col">Units</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <!-- <th scope="col">Image</th>-->
                                    <th scope="col">Status</th>
                                    <th class="white-space-nowrap">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $p)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$p->bar_code}}</td>
                                    <td>{{$p->product_name}}</td>
                                    <td>{{$p->brand?->name}}</td>
                                    <td>{{$p->category?->category}}</td>
                                    <td>{{$p->subcategory?->name}}</td>
                                    <td>{{$p->childcategory?->name}}</td>
                                    <td>{{$p->unit?->name}}</td>
                                    <td>{{$p->description}}</td>
                                    <td>{{$p->price}}</td>
                                    <!--  <td><img width="50px" src="{{asset('uploads/product/'.$p->image)}}" alt=""></td>-->
                                    <td>@if($p->status == 1) Active @else Inactive @endif</td>
                                    <!-- or <td>{{ $p->status == 1?"Active":"Inactive" }}</td>-->
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.product.edit',encryptor('encrypt',$p->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$p->id}}" action="{{route(currentUser().'.product.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="12" class="text-center">No Pruduct Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection