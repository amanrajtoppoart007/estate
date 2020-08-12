@section('breadcrumb')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$page_title ? $page_title : 'MENU'}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">{{$page_title ? $page_title : 'MENU'}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
