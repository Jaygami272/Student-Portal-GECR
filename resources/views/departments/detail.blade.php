@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <div class="row">
        <div class="col-md-12">
            <h1 style="float: left">Customer</h1>
            <a href="{{route('departments.index')}}"><button type="button" class="btn btn-secondary" style="float: right">Back</button></a>
        </div>
    </div>
</div>

<section class="section profile">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered fw-bold" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ledger-details" aria-selected="true" role="tab">HOD Details:</button>
                        </li>

                       
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active ledger-details" id="ledger-details" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">HOD NAME:</div>
                                <div class="col-lg-9 col-md-8">{{$users->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">HOD EMAIL:</div>
                                <div class="col-lg-9 col-md-8">{{$users->email}}</div>
                            </div>
                        </div>

                        


                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- TOTAL  --}}

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body pt-3">
                   

                    <div class="tab-content pt-2">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ route('departments.index') }}">
                                    <div class="card bg-primary mb-3 dcard">
                                        <div class="card-body">
                                            <h2>{{ $count['facultys'] }}</h2>
                                            <p>Total Facultys</p>
                                            <div class="card-icon">
                                                <i class="bi bi-truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>    
                        </div>
                        </div>

                        


                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection