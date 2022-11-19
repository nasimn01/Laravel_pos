@extends('layout.app')

@section('pageTitle','Create Navigate master view')
@section('pageSubTitle','Create')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.navigate.store')}}">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="master_head">Master Head</label>
                                        <select class="form-control form-select" name="master_head" id="master_head">
                                            <option value="">Select Master Head</option>
                                            @forelse($master_account as $d)
                                                <option value="{{$d->id}}" {{ old('master_head')==$d->id?"selected":""}}> {{ $d->head_name}}</option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>
                                        @if($errors->has('master_head'))
                                        <span class="text-danger"> {{ $errors->first('master_head') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sub_head">Sub Head</label>
                                        <select class="form-control form-select" name="sub_head" id="sub_head">
                                            <option value="">Select Sub Head</option>
                                            @forelse($sub_head as $d)
                                                <option value="{{$d->id}}" {{ old('sub_head')==$d->id?"selected":""}}> {{ $d->head_name}}</option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>
                                        @if($errors->has('sub_head'))
                                        <span class="text-danger"> {{ $errors->first('sub_head') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="child_one">Child One</label>
                                        <select class="form-control form-select" name="child_one" id="child_one">
                                            <option value="">Select Child One</option>
                                            @forelse($child_one as $d)
                                                <option value="{{$d->id}}" {{ old('child_one')==$d->id?"selected":""}}> {{ $d->head_name}}</option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>
                                        @if($errors->has('child_one'))
                                        <span class="text-danger"> {{ $errors->first('child_one') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="child_two">Child Two</label>
                                        <select class="form-control form-select" name="child_two" id="child_two">
                                            <option value="">Select Child One</option>
                                            @forelse($child_two as $d)
                                                <option value="{{$d->id}}" {{ old('child_one')==$d->id?"selected":""}}> {{ $d->head_name}}</option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>
                                        @if($errors->has('child_two'))
                                        <span class="text-danger"> {{ $errors->first('child_two') }}</span>
                                        @endif
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