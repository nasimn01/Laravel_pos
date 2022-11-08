@extends('layout.app')

@section('pageTitle','Create Subcategory')
@section('pageSubTitle','Create')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.subcategory.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="">Select Category</option>
                                            @forelse($categories as $cat)
                                                <option value="{{$cat->id}}" {{ old('category')==$cat->id?"selected":""}}> {{ $cat->category}}</option>
                                            @empty
                                                <option value="">No Category found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subCat">Sub Category</label>
                                        <input type="text" id="subCat" class="form-control"
                                            placeholder="Subcategory Name" value="{{ old('subCat')}}" name="subCat">
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