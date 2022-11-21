@extends('layout.app')

@section('pageTitle','Update Child Two')
@section('pageSubTitle','Update')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.child_two.update',encryptor('encrypt',$child->id))}}">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$child->id)}}">
                            <div class="row">
                                

                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="child_one">Child One</label>
                                        <select class="form-control form-select" name="child_one" id="child_one">
                                            <option value="">Select Child One</option>
                                            @forelse($data as $d)
                                                <option value="{{$d->id}}" {{ old('child_one',$child->child_one_id)==$d->id?"selected":""}}> {{ $d->head_name}}</option>
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
                                        <label for="head_name">Head Name</label>
                                        <input type="text" id="head_name" class="form-control"
                                            placeholder="Head Name" value="{{ old('head_name',$child->head_name)}}" name="head_name">
                                    </div>
                                    @if($errors->has('head_name'))
                                    <span class="text-danger"> {{ $errors->first('head_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="head_code">Head Code</label>
                                        <input type="text" id="head_code" class="form-control"
                                            placeholder="Head Code" value="{{ old('head_code',$child->head_code)}}" name="head_code">
                                    </div>
                                    @if($errors->has('head_code'))
                                    <span class="text-danger"> {{ $errors->first('head_code') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="opening_balance">Opening Balance</label>
                                        <input type="text" id="opening_balance" class="form-control"
                                            placeholder="Opening Balance" value="{{ old('opening_balance',$child->opening_balance)}}" name="opening_balance">
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