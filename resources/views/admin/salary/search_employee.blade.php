@extends('admin.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Search Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Search Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-body">
          {{Form::open(['route'=>'create.salary.sheet'])}}
          <div class="row">
              <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                          <div class="form-group">
                              <label for="month">Month</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                  </div>
                                  <select  name="month" id="month" class="form-control">
                                       <option value="">Select Month</option>
                                        @for($i=1;$i<=12;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                  </select>
                              </div>
                          </div>
                      </div>
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <select  name="year" id="year" class="form-control">
                                        <option value="">Select Year</option>
                                        @for($i=2019;$i<=date("Y");$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="search_btn">&nbsp;</label>
                                <div class="input-group">
                                    <button type="submit" name="search_btn" id="search_btn" class="btn btn-info">
                                       <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
          </div>
          {{Form::close()}}
      </div>
  </div>
@endsection