@extends('layout.app')

@section('pageTitle','Update Warehouse')
@section('pageSubTitle','Update')

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.warehouse.store')}}">
                              @csrf
                              @method('patch')
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="company_id">company_id</label>
                                          <input type="text" id="contact" value="{{ old('company_id')}}" class="form-control"
                                              placeholder="Warehouse company_id" name="company_id">
                                      </div>
                                      @if($errors->has('company_id'))
                                      <span class="text-danger"> {{ $errors->first('company_id') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="branch_id">Branch_id</label>
                                          <input type="text" id="contact" value="{{ old('branch_id')}}" class="form-control"
                                              placeholder="Warehouse branch_id" name="branch_id">
                                      </div>
                                      @if($errors->has('branch_id'))
                                      <span class="text-danger"> {{ $errors->first('branch_id') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">Warehouse</label>
                                          <input type="text" id="name" value="{{ old('name')}}" class="form-control"
                                              placeholder="Warehouse Name" name="name">
                                      </div>
                                      @if($errors->has('name'))
                                      <span class="text-danger"> {{ $errors->first('name') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label class="form-label" for="address">Address</label>
                                         <textarea class="form-control" name="address" id="address" rows="2">{{ old('address')}}</textarea>
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