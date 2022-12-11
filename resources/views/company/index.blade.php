@extends('layout.app')

@section('pageTitle',trans('Company details'))
@section('pageSubTitle',trans('details'))

@section('content')


    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('Company Name')}}</th>
                                        <th scope="col">{{__('Contact')}}</th>
                                        <th scope="col">{{__('Country')}}</th>
                                        <th scope="col">{{__('Division')}}</th>
                                        <th scope="col">{{__('District')}}</th>
                                        <th scope="col">{{__('Upazila')}}</th>
                                        <th scope="col">{{__('Thana')}}</th>
                                        <th scope="col">{{__('Address')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $d)
                                    <tr>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->contact}}</td>
                                        <td>{{$d->country?->name}}</td>
                                        <td>{{$d->division?->name}}</td>
                                        <td>{{$d->district?->name}}</td>
                                        <td>{{$d->upazila?->name}}</td>
                                        <td>{{$d->thana?->name}}</td>
                                        <td>{{$d->address}}</td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route(currentUser().'.company.edit',encryptor('encrypt',$d->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="9" class="text-center">No Data Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
    <!-- Bordered table end -->
</div>

@endsection

