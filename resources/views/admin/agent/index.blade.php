@extends('admin.layout.app')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Agents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Agents</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="{{route('agent.list')}}">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <img src="{{asset('assets/img/seller.png')}}" class="custom-menu-icon"/>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 card-content-center">
                                    <h6 class="card-title mx-2">
                                        All Agent List
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="{{route('agent.create')}}">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <img src="{{asset('assets/img/add.png')}}" class="custom-menu-icon"/>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 card-content-center">
                                    <h6 class="card-title mx-2">
                                        Add New Agent(Individual)
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <a href="{{route('agent.type.company.create')}}">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <img src="{{asset('assets/img/add.png')}}" class="custom-menu-icon"/>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 card-content-center">
                                    <h6 class="card-title mx-2">
                                        Add New Agent (Company)
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
