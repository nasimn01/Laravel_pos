  @extends('app')

    @section('pageTitle','Create Product')
    @section('pageSubTitle','Create')

  @section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
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
                                            <label for="name">Sub Category</label>
                                            <select class="form-control" name="name" id="name">
                                                <option value="">Select Category</option>
                                                @forelse($subcategories as $sub)
                                                    <option value="{{$sub->id}}" {{ old('name')==$sub->id?"selected":""}}> {{ $sub->name}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Child Category</label>
                                            <select class="form-control" name="name" id="name">
                                                <option value="">Select Category</option>
                                                @forelse($childcategories as $child)
                                                    <option value="{{$child->id}}" {{ old('name')==$child->id?"selected":""}}> {{ $child->name}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Units</label>
                                            <select class="form-control" name="name" id="name">
                                                <option value="">Select Category</option>
                                                @forelse($units as $u)
                                                    <option value="{{$u->id}}" {{ old('name')==$u->id?"selected":""}}> {{ $u->name}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Brand</label>
                                            <select class="form-control" name="name" id="name">
                                                <option value="">Select Brand</option>
                                                @forelse($brands as $b)
                                                    <option value="{{$b->id}}" {{ old('name')==$b->id?"selected":""}}> {{ $b->name}}</option>
                                                @empty
                                                    <option value="">No Category found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="barCode">Bar Code</label>
                                            <input type="text" id="barCode" class="form-control"
                                                placeholder="Bar Code" value="{{ old('barCode')}}" name="barCode">
                                                @if($errors->has('barCode'))
                                                    <span class="text-danger"> {{ $errors->first('barCode') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="productName">Name</label>
                                            <input type="text" id="productName" class="form-control"
                                                placeholder="Product Name" value="{{ old('productName')}}" name="productName">
                                                @if($errors->has('productName'))
                                                    <span class="text-danger"> {{ $errors->first('productName') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" class="form-control"
                                                placeholder="Price" value="{{ old('price')}}" name="price">
                                                @if($errors->has('price'))
                                                    <span class="text-danger"> {{ $errors->first('price') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea  class="form-control" id="description"
                                                placeholder="Product description" name="description">{{ old('description')}}</textarea>
                                        </div>
                                    </div>
                                    
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