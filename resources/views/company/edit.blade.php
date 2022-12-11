@extends('layout.app')

@section('pageTitle','Edit Company details')
@section('pageSubTitle','Edit')

@section('content')

  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.company.update',encryptor('encrypt',$company->id))}}">
                              @csrf
                              @method('patch')
                              <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$company->id)}}">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Company Name')}}</label>
                                          <input type="text" class="form-control" value="{{ old('name',$company->name)}}" name="name"  placeholder="Company Name" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="contact">{{__('Contact')}}</label>
                                          <input type="text" class="form-control" value="{{ old('contact',$company->contact)}}" name="contact" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="country">{{__('Country')}}</label>
                                          <input type="text" class="form-control" value="{{ old('country',$company->country)}}" name="country" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="division">{{__('Division')}}</label>
                                          <input type="text" class="form-control" value="{{ old('division',$company->division)}}" name="division" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="district">{{__('District')}}</label>
                                          <input type="text" class="form-control" value="{{ old('district',$company->district)}}" name="district" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="upazila">{{__('Upazila')}}</label>
                                          <input type="text" class="form-control" value="{{ old('upazila',$company->upazila)}}" name="upazila" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="thana">{{__('Thana')}}</label>
                                          <input type="text" class="form-control" value="{{ old('thana',$company->thana)}}" name="thana" >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="address">{{__('Address')}}</label>
                                          <input type="text" class="form-control" value="{{ old('address',$company->address)}}" name="address" >
                                      </div>
                                  </div>
                                  
                                  <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-1">{{__('Save')}}</button>
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