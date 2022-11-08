@extends('app')

@section('pageTitle','Create Childcategory')
@section('pageSubTitle','Create')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('childcategory.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subCat">Sub Category</label>
                                        <select class="form-control" name="subCat" id="subCat">
                                            <option value="">Select Category</option>
                                            @forelse($subcategories as $sub)
                                                <option value="{{$sub->id}}" {{ old('subCat')==$sub->id?"selected":""}}> {{ $sub->subCat}}</option>
                                            @empty
                                                <option value="">No Category found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="childCat">Name</label>
                                        <input type="text" id="childCat" class="form-control"
                                            placeholder="Childcategory Name" value="{{ old('childCat')}}" name="childCat">
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