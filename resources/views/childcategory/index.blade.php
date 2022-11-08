@extends('app')
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
                        <table class="table table-bordered mb-0">
                            <a class="btn btn-sm btn-primary float-end" href="{{route('childcategory.create')}}">Add new</a>
                            <thead>
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Name</th>
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
                                        <a href="{{route('childcategory.edit',$child->id)}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="$('#form{{$child->id}}').submit()">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="form{{$child->id}}" action="{{route('childcategory.destroy',$child->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
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