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
											<th>Subject</th>
											<th>Message</th>
											<th>Date-Time</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										
								@if(count($contactRequests)>0)
									@foreach($contactRequests as $contact_request)	
										<tr>
										<td>{{$contact_request->id}}</td>
											<td>{{($contact_request->name)?$contact_request->name:NULL}}</td>
											
											<td>
												<h6 class="color-primary">{{($contact_request->mobile)?$contact_request->mobile:NULL}}</h6>
											</td>
											<td>{{($contact_request->email)?$contact_request->email:NULL}}</td>
											<td>
												<span>{{($contact_request->subject)?$contact_request->subject:NULL}}</span>
												
                                            </td>
											<td>
												<span>{{($contact_request->message)?$contact_request->message:NULL}}</span>
												
                                            </td>
                                            <td class="date_time">
												<span>{{date('Y-m-d',strtotime($contact_request->created_at))}}</span>
												<span>{{date('h:i A',strtotime($contact_request->created_at))}}</span>
											</td>
											<td>
												<a href="#" class="btn btn-primary mr-1">Reply</a>
											</td>
										</tr>
									   @endforeach
										@else
										 <tr>
											 <td colspan="7">No Data Found</td>
										 </tr>
										 @endif
									</tbody>
								</table>
							</div>
@endsection