@extends('owner.layout.app')
@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Maintenance Work Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('owner.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Maintenance Work Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                <tr>
                    <th>Building Name</th>
                    <td>{{$maintenance->property->title}}</td>
                </tr>
                <tr>
                    <th>Flat Number</th>
                    <td>{{$maintenance->property_unit->unitcode}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$maintenance->category}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="card-title text-bold">Status Of Your Request</h6>
        </div>
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-11 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0">
                    <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                        <ul id="progressbar">
                            @foreach($maintenance->maintenance_work_progress as $progress)
                                <li class="{{$progress->work_status}}"><strong>{{ucwords(str_replace("_"," ",$progress->status_type))}}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                          <th>Task</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($maintenance->maintenance_work_progress as $progress)
                        <tr>
                            <td>{{ucwords(str_replace("_"," ",$progress->status_type))}}</td>
                            <td>{{$progress->completed_at? date('d-m-Y',strtotime($progress->completed_at)):null}}</td>
                            <td>{{ucwords(str_replace("_"," ",$progress->work_status))}}</td>
                            <td>{{$progress->remark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .card {
            z-index: 0;
            border: none;
            position: relative
        }
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }
        #progressbar .completed {
            font-weight: bolder;
            color: #049d01;
        }
         #progressbar .pending {
            font-weight: bolder;
            color: #ff0d0d;
        }
        #progressbar .on_hold {
            font-weight: bolder;
            color: #bbbe00;
        }
        #progressbar .work_in_progress {
            font-weight: bolder;
            color: #00beac;
        }
        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 16%;
            float: left;
            position: relative;
            font-weight: 400
        }
        #progressbar .completed:before {
            font-family: "Font Awesome\ 5 Free";
            font-style: normal;
            font-weight: 900;
            content: "\f00c"
        }
        #progressbar .pending:before {
            font-family: "Font Awesome\ 5 Free";
            font-style: normal;
            font-weight: 900;
            content: "\f00d"
        }
        #progressbar .on_hold:before {
            font-family: "Font Awesome\ 5 Free";;
            font-style: normal;
            font-weight: 900;
            content: "\f04c"
        }
        #progressbar .work_in_progress:before {
            font-family: "Font Awesome\ 5 Free";;
            font-style: normal;
            font-weight: 900;
            content: "\f017"
        }
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }
        #progressbar li.completed:before,
        #progressbar li.completed:after {
            background: #049d01;
        }
        #progressbar li.pending:before,
        #progressbar li.pending:after {
            background: #ff0d0d;
        }
        #progressbar li.on_hold:before,
        #progressbar li.on_hold:after {
            background: #bbbe00;
        }
        #progressbar li.work_in_progress:before,
        #progressbar li.work_in_progress:after {
            background: #00beac;
        }
        .progress {
            height: 20px
        }
        .progress-bar {
            background-color: #673AB7
        }
        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>
@endsection
