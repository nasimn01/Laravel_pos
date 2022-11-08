@extends('app')

@section('pageTitle','Edit Subcategory')
@section('pageSubTitle','Create')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('subcategory.update',$subcategory->id)}}">
                            @csrf
                            @method('patch')
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="">Select Category</option>
                                            @forelse($categories as $cat)
                                                <option value="{{$cat->id}}" {{ old('category',$subcategory->category_id)==$cat->id?"selected":""}}> {{ $cat->category}}</option>
                                            @empty
                                                <option value="">No Category found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subCat">Name</label>
                                        <input type="text" id="subCat" class="form-control"
                                            placeholder="Subcategory Name" value="{{ old('subCat',$subcategory->name)}}" name="subCat">
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-start">
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