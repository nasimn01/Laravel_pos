@extends('layout.app')

@section('pageTitle',trans('Create Currency'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.currency.store')}}">
                              @csrf
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Currency')}}</label>
                                          <input type="text" id="name" class="form-control"
                                              placeholder="Currency Name" name="currency">
                                      </div>
                                      @if($errors->has('currency'))
                                      <span class="text-danger"> {{ $errors->first('currency') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Symbol')}}</label>
                                          <input type="text" id="Symbol" class="form-control"
                                              placeholder="Currency Symbol" name="symbol">
                                      </div>
                                      @if($errors->has('currency'))
                                      <span class="text-danger"> {{ $errors->first('currency') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Port')}}</label>
                                          <input type="text" id="port" class="form-control"
                                              placeholder="Currency port" name="port">
                                      </div>
                                      @if($errors->has('currency'))
                                      <span class="text-danger"> {{ $errors->first('currency') }}</span>
                                      @endif
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="name">{{__('Rate')}}</label>
                                          <input type="text" id="rate" class="form-control"
                                              placeholder="Currency rate" name="rate">
                                      </div>
                                      @if($errors->has('currency'))
                                      <span class="text-danger"> {{ $errors->first('currency') }}</span>
                                      @endif
                                  </div>
                               
                                  
                                  <div class="col-12 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                      
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