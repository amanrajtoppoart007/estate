@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">Contact Request</h4>					
		<div class="items_list color-secondery">
			<table class="w-100">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>E-mail</th>
						
						<th>Date-Time</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					
			@if(count($users)>0)
				@foreach($users as $user)	
					<tr>
					<td>{{$user->id}}</td>
						<td>{{($user->name)?$user->name:NULL}}</td>
						
						<td>
							<h6 class="color-primary">{{($user->mobile)?$user->mobile:NULL}}</h6>
						</td>
						<td>{{($user->email)?$user->email:NULL}}</td>
						<td class="date_time">
							<span>{{date('Y-m-d',strtotime($user->created_at))}}</span>
							<span>{{date('h:i A',strtotime($user->created_at))}}</span>
						</td>
						<td>
							<a href="#" class="btn btn-primary mr-1">Reply</a>
						</td>
					</tr>
					@endforeach
					@else
						<tr>
							<td colspan="5">No Data Found</td>
						</tr>
						@endif
				</tbody>
			</table>
		</div>
@endsection