@extends('layout.app')
@section('pageTitle','Childcategory List')
@section('pageSubTitle','List')

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <?php 
                        
                        //print_r($childcategories);
                        ?>
                        <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route(currentUser().'.childcategory.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Child Category</th>
                                    <th class="white-space-nowrap">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($childcategories as $child)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$child->subcategory?->name}}</td>
                                    <td>{{$child->name}}</td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.childcategory.edit',encryptor('encrypt',$child->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- <a href="javascript:void()" onclick="$('#form{{$child->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a> -->
                                        <!-- <form id="form{{$child->id}}" action="{{route(currentUser().'.childcategory.destroy',encryptor('encrypt',$child->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form> -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="3" class="text-center">No Pruduct Found</th>
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