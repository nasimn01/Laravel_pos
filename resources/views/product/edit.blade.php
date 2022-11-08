@extends('app')

@section('pageTitle','Edit Product')
@section('pageSubTitle','Edit')

@section('content')
<!-- // Basic multiple Column Form section start -->

  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}">
                              @csrf
                              @method('patch')
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="category">Category</label>
                                          <select class="form-control" name="category" id="category">
                                              <option value="">Select Category</option>
                                              @forelse($categories as $cat)
                                                  <option value="{{$cat->id}}" {{ old('category',$product->category_id)==$cat->id?"selected":""}}> {{ $cat->category}}</option>
                                              @empty
                                                  <option value="">No Category found</option>
                                              @endforelse
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="productName">Name</label>
                                          <input type="text" id="productName" class="form-control"
                                              placeholder="Product Name" value="{{ old('productName',$product->name)}}" name="productName">
                                              @if($errors->has('productName'))
                                                  <span class="text-danger"> {{ $errors->first('productName') }}</span>
                                              @endif
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="price">Price</label>
                                          <input type="text" id="price" class="form-control"
                                              placeholder="Price" value="{{ old('price',$product->price)}}" name="price">
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
                                              placeholder="Product description" name="description">{{ old('description',$product->description)}}</textarea>
                                      </div>
                                  </div>
                                  
                                  <div class="col-12 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                      <img width="100px" class="float-right" src="{{asset('public/uploads/product/'.$product->image)}}" alt="">
                                      
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