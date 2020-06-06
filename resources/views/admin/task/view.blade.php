@extends('admin.layout.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Task View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Task View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="timeline">
                <div>
                    <i class="fas fa-project-diagram bg-info"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i>{{date('d-m-Y h:i A',strtotime($task->created_at))}}</span>
                        <h3 class="timeline-header"><a href="javascript:void(0)"> Title : {{$task->task_title}}</a></h3>
                        <div class="timeline-body">
                            {{$task->description}}
                        </div>
                        <div class="timeline-footer text-right">
                            <a class="btn btn-primary btn-sm"> <small>Assined
                                    to </small> {{pluck_single_value('admins','id',($task->task_assignments->pluck('assignee_id'))[0],'name')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <i class="fa fa-tasks bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time">Property detail</span>
                        <h3 class="timeline-header"><a href="javascript:void(0)"> Unit Code
                                : {{$task->property_unit->unitcode}}</a></h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <dt>Property Code</dt>
                                    <dd>{{($task->property_unit->property)?$task->property_unit->property->propcode:''}}</dd>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <dt>Property Name</dt>
                                    <dd>{{($task->property_unit->property)?$task->property_unit->property->title:''}}</dd>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <dt>City</dt>
                                    <dd>
                                        {{($task->property_unit->property->city)?$task->property_unit->property->city->name:''}}
                                    </dd>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <dt>State</dt>
                                    <dd>
                                        {{($task->property_unit->property->state)?$task->property_unit->property->state->name:''}}
                                    </dd>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <dt>Address</dt>
                                    <dd>{{$task->property_unit->property->full_address}}</dd>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <dt>Property Status</dt>
                                    @php $status = getPropertyUnitStatus($task->property_unit->status) @endphp
                                    <dd>
                                        <button
                                            class="btn badge badge-{{$status['color']}}">{{$status['text']}}</button>
                                    </dd>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <dt>Owner</dt>
                                    <dd>
                                        {{($task->property_unit->property->owner)?$task->property_unit->property->owner->name:''}}
                                    </dd>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <dt>Mobile</dt>
                                    <dd>{{($task->property_unit->property->owner)?$task->property_unit->property->owner->mobile:''}}</dd>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <dt>Email</dt>
                                    <dd>
                                    <dd>{{($task->property_unit->property->owner)?$task->property_unit->property->owner->email:''}}</dd>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-md-4">
                                {{Form::open(['url'=>route('task.update',$task->id),'id'=>'edit_data_form'])}}
                                <input type="hidden" name="task_id" value="{{$task->id}}">
                                <div class="card">
                                    <div class="card-body box-profile">
                                        <p class="text-muted text-center">Task Detail</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Assigned By</b> <span
                                                    class="float-right">{{($task->assignor)?ucfirst($task->assignor->name):''}}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>DeadLine</b> <span class="float-right"> {{$task->deadline}} </span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Status</b>
                                                <span class="float-right">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select Status</option>
                                            @php $status_list = array('0'=>'PENDING','1'=>'WORKING','2'=>'COMPLETED','3'=>'ON-HOLD','4'=>'IN-REVIEW') @endphp
                                            @foreach($status_list as $key=>$value)
                                                @php $selected = ($key==$task->status)?'selected':''; @endphp
                                                <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Priority</b>
                                                <span class="float-right">
                                        <select class="form-control" name="priority" id="priority">
                                            <option value="">Select Status</option>
                                            @php $priorities = array('1'=>'EMERGENCY','2'=>'HIGH','3'=>'NORMAL','4'=>'LOW') @endphp
                                            @foreach($priorities as $key=>$value)
                                                @php $selected = ($key==$task->priority)?'selected':''; @endphp
                                                <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>
                                                    Documents
                                                </b>
                                                <span class="float-right">
                                        <i class="fa fa-file-word text-success fa-2x"></i>
                                    </span>
                                            </li>
                                            <li class="list-group-item">

                                    <span class="float-right">
                                        <button class="btn btn-info">Save Changes</button>
                                    </span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>
                                                    <a href="{{route('task.bill.create',['id'=>base64_encode($task->id)])}}"
                                                       class="btn btn-danger">Escalate to Bill</a>
                                                    <a href="{{route('task.invoice.create',['id'=>base64_encode($task->id)])}}"
                                                       class="btn btn-primary">Escalate to Invoice</a>
                                                </b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><strong>Chat</strong></h4> <a
                                            class="btn btn-xs btn-secondary" href="#"
                                            data-abc="true">{{ config('app.name', 'Laravel')}} Task Discussion</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row  d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <div class="card card-bordered custom-chat-box">
                                                    <div class="ps-container ps-theme-default ps-active-y"
                                                         id="chat-content"
                                                         style="overflow-y: scroll !important; height:400px !important;">
                                                        <div class="chat-container" id="chat_messages">
                                                        </div>
                                                        <div class="ps-scrollbar-x-rail"
                                                             style="left: 0px; bottom: 0px;">
                                                            <div class="ps-scrollbar-x" tabindex="0"
                                                                 style="left: 0px; width: 0px;"></div>
                                                        </div>
                                                        <div class="ps-scrollbar-y-rail"
                                                             style="top: 0px; height: 0px; right: 2px;">
                                                            <div class="ps-scrollbar-y" tabindex="0"
                                                                 style="top: 0px; height: 2px;"></div>
                                                        </div>
                                                    </div>
                                                    {{Form::open(['route'=>'task.chat.store','id'=>'create_chat_form','enctype'=>'multipart/form-data'])}}
                                                    <input type="hidden" name="task_id" id="task_id"
                                                           value="{{$task->id}}">
                                                    <div class="publisher bt-1 border-light">
                                                        <img class="avatar avatar-xs"
                                                             src="{{asset('img/administrator-male.png')}}" alt="...">
                                                        <input class="publisher-input" type="text" name="msg"
                                                               placeholder="Write something" id="input_message">
                                                        <span class="publisher-btn file-group">
                                                    <input type="file" class="form-control" name="media"id="input_media">
                                                </span>
                                                        <a id="create_chat_btn" class="publisher-btn text-info"
                                                           href="javascript:void(0)" data-abc="true"><i
                                                                class="fa fa-paper-plane"></i></a>
                                                    </div>
                                                    {{Form::close()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $("#edit_data_form").on("submit", function (e) {
                e.preventDefault();
                let url    = "{{route('update.task.status')}}";
                let params = $("#edit_data_form").serialize();

                function fn_success(result) {
                    toast('success', result.message, 'bottom-right');
                };

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                };
                $.fn_ajax(url, params, fn_success, fn_error);

            });

            $("#create_chat_btn").on('click', function (e) {
                e.preventDefault();
                submit_chat();
            });
            $("#create_chat_form").on('submit', function (e) {
                e.preventDefault();
                submit_chat();
            });

            function submit_chat() {
                let url = "{{route('task.chat.store')}}";
                let params = new FormData(document.getElementById('create_chat_form'));

                function fn_success(result) {
                    getChat();
                    $("#create_chat_form")[0].reset();
                };

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                };
                $.fn_ajax_multipart(url, params, fn_success, fn_error);
            };


            function getChat() {
                let url = "{{route('task.get.chat.list')}}";
                let params = {'task_id':{{$task->id}}};

                function fn_success(result) {
                    renderChats(result.data);
                };

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                };
                $.fn_ajax(url, params, fn_success, fn_error);
            };

            function renderChats(data) {
                let string = '';
                $.each(data, function (i, item) {
                    string += `<div class="media media-meta-day">${item.date}</div>`;
                    $.each(item.comments, function (j, chat) {
                        var media = '';
                        if (chat.media != 'NO_MEDIA') {
                            media = `<p class="media-paragraph"><a target="_blank" class="text-success" href="${chat.media}">View Attachment</a></p>`;
                        }
                        if (chat.position == 'LEFT') {
                            string += `<div class="media media-chat">
                                <img class="avatar" src="{{asset('img/administrator-male.png')}}" alt="...">
                                <div class="media-body">
                                    <p>${chat.msg}</p>
                                    ${media}
                                    <p class="meta"><time datetime="${chat.date}">${chat.time}</time></p>
                                </div>
                             </div>`;
                        } else {
                            string += `<div class="media media-chat media-chat-reverse">
                                <img class="avatar" src="{{asset('img/administrator-male.png')}}" alt="...">
                                <div class="media-body">
                                    <p>${chat.msg}</p>
                                    ${media}
                                    <p class="meta"><time datetime="${chat.date}">${chat.time}</time></p>
                                </div>
                             </div>`;
                        }
                    })
                });
                $("#chat_messages").html(string);
            }

            getChat();
        });
    </script>
@endsection
