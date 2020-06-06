@extends('guest.layout.main')
@include('guest.include.header')
    @section('content')
    <!--	Banner
===============================================================-->
<div class="page-banner bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="breadcrumbs color-secondery">
					<ul>
						<li class="hover_gray"><a href="#">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li class="color-default">Contact</li>
					</ul>
				</div>
				<div class="float-right color-primary">
					<h3 class="banner-title font-weight-bold">Contact</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--	Contact Information
===============================================================-->
<section class="full-row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-4">
				<div class="contact_info">
					<h3 class="mb-4 color-primary">Support</h3>
					<div class="d-flex">
						<div class="circle mr-4"><img src="theme/default/images/team/01.jpg" alt=""></div>
						<div class="contact_details">
							<h5 class="d-table"></h5>
							<span class="d-table color-secondery">Support Member</span>
							<a class="color-default" href="#">support@estate.com</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="contact_info">
					<h3 class="mb-4 color-primary">Contacts</h3>
					<ul class="icon_default">
						<li class="d-flex mb-4">
							<span class="fa-1x mr-4 w-25-px"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<div class="contact_address">
								<h5 class="color-primary">Office Address</h5>
								<span>{{pluck_single_value('system_settings','name','office_address','value')}}</span>
							</div>
						</li>
						<li class="d-flex mb-4">
							<span class="fa-1x mr-4 w-25-px"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<div class="contact_address">
								<h5 class="color-primary">Call Us</h5>
								<span class="d-table">{{pluck_single_value('system_settings','name','official_contact_number','value')}}</span>
								{{-- <span>012 34 567 809 </span> --}}
							</div>
						</li>
						<li class="d-flex mb-4">
							<span class="fa-1x mr-4 w-25-px"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							<div class="contact_address">
								<h5 class="color-primary">E-mail Address</h5>
								<span>{{pluck_single_value('system_settings','name','official_contact_number','value')}}</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="contact_info">
					<h3 class="mb-4 color-primary">Social</h3>
					<div class="social_media pt-3 hover_primary">
						<ul>
							 <li><a target="_blank" href="{{pluck_single_value('system_settings','name','facebook_social_account','value')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a target="_blank" href="{{pluck_single_value('system_settings','name','twitter_social_account','value')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a target="_blank" href="{{pluck_single_value('system_settings','name','google_social_account','value')}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li><a target="_blank" href="{{pluck_single_value('system_settings','name','linkedin_social_account','value')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--	Get In Touch
===============================================================-->
<section class="full-row pt-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="main-title-one">
					<h2 class="title color-primary">Get In Touch</h2>
					<p class="sub-title color-secondery py_60">Got a question ? send a message to us , we will get back to you.</p>
				</div>
			</div>

			<div class="col-md-12">
				<form id="contact-form" class="w-100" action="email.html" method="post">
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="form-group">
								<input type="text" id="name" name="name" class="form-control bg-gray" placeholder="Your Name*">
							</div>
							<div class="form-group">
								<input type="text" id="email" name="email" class="form-control bg-gray" placeholder="Email Address*">
							</div>
							<div class="form-group">
								<input type="text" id="mobile" name="mobile" class="form-control bg-gray" placeholder="Mobile no.*">
							</div>
							<div class="form-group">
								<input type="text" id="subject" name="subject"  class="form-control bg-gray" placeholder="Subject">
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="form-group">
								<textarea id="message" name="message" class="form-control bg-gray" rows="7" placeholder="Type Comments..."></textarea>
							</div>
							<button type="submit" id="send" value="send message" class="btn btn-default1">Send Message</button>
						</div>
						<div class="col-md-12">
							<div class="error-handel">
								<div id="success">Your email sent Successfully, Thank you.</div>
								<div id="error"> Error occurred while sending email. Please try again later.</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--	Map
===============================================================-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div id="map" class="contact-location"></div>
			</div>
		</div>
	</div>
</div>
	@endsection
@section('script')
<script>
 	$contact			= $('#contact-form');
	if($contact.length){
		$contact.validate({  //#contact-form contact form id
			rules: {
				name: {
					required: true    // Field name here
				},
				email: {
					required: true, // Field name here
					email: true
				},
				mobile : {
					required: true, // Field name here
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			},
			
			messages: {
                name : "Please enter your Name", //Write here your error message that you want to show in contact form
                email : "Please enter valid Email", //Write here your error message that you want to show in contact form
                mobile : "Please enter valid Mobile number", //Write here your error message that you want to show in contact form
                subject: "Please enter your Subject", //Write here your error message that you want to show in contact form
				message : "Please write your Message" //Write here your error message that you want to show in contact form
            },

            submitHandler: function (form) {
				$('#send').attr({'disabled' : 'true', 'value' : 'Sending...' });
				 $.ajaxSetup({ headers:{'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                $.ajax({
                    type: "POST",
                    url: "{{route('send.contact-request')}}",
					data: $(form).serialize(),
					dataType : 'json',
                    success: function (res) {
						if(res.response=='success')
						{
                              $('#send').removeAttr('disabled').attr('value', 'Send');
								$( "#success").text(res.message);
								$( "#success").slideDown( "slow" );
								setTimeout(function() 
								{
									$( "#success").slideUp( "slow" );
									
								}, 5000);
								form.reset();
						}
						else
						{
							$('#send').removeAttr('disabled').attr('value', 'Send');
							$( "#error").text(res.message);
							$( "#error").slideDown( "slow" );
							setTimeout(function() 
							{
							  $( "#error").slideUp( "slow" );
							}, 5000);
						}
                        
                    },
                    error: function() {
                        $('#send').removeAttr('disabled').attr('value', 'Send');
                        $( "#error").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#error").slideUp( "slow" );
                        }, 5000);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }

		});
	} 
</script>
@endsection