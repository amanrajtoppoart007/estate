@extends('admin.layout.accounting')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Accounting Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Accounting</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- card 1 -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Accounts</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <a href="{{route('acc.chart.of.accounts')}}">
                        <img src="{{asset('assets/img/accounting.svg')}}" width="60px" height="100px">
                    </a>
                        <br>
                    <h6>Chart Of Accounts</h6>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{route('acc.bank.accounts')}}">
                        <img src="{{asset('assets/img/calculator.svg')}}" width="60px" height="100px">
                    </a>
                        <br>
                    <h6>Bank Accounts</h6>
                </div>   <div class="col-md-4 text-center">

                </div>


            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
    </div>
    <!-- /.card 1-->

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


        });
    </script>
@endsection
