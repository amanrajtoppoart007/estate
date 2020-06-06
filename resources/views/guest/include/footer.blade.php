<footer class="full-row footer-background">

	<div class="container">

		<div class="footer_area py_80 borber_b">

			<div class="row">

				<div class="col-md-12 col-lg-4">

					<div class="footer-widget">

						<div class="footer_logo pb_30">

							<!-- <a href="#"><img class="logo-bottom" width="40%" src="{{asset('theme/default/images/logo/logo.png')}}" alt="image"></a> -->
							<h5 class="footer-title">Al Hoor Real Estate</h5>
						</div>

						<p class="pt-3 para-text">Homex.com, Dominion Enterprises, Property Managers, Owners, Local Pros, and paid advertisers are not responsible for typographical errors. Prices, conditions and apartment availability are subject to change without notice.</p>

					<a class="btn btn-default1" href="{{route('register')}}">Register Now</a>

					</div>

				</div>

				<div class="col-md-12 col-lg-8">

					<div class="row">

						<div class="col-md-4 col-lg-4">

							<div class="footer-widget">

								<div class="ft-widget-title color-primary">

									<h4 class="footer-title">Support</h4>

								</div>

								<div class="help_links pt_50 hover_gray">

									<ul class="footer-ul">

										<li><a href="{{route('terms-conditions')}}">Terms and Condition</a></li>

										<li><a href="{{route('contact')}}">Get Support</a></li>

										<li><a href="{{route('faq')}}">Freequenly Ask Question</a></li>

										<li><a href="{{route('contact')}}">Contact</a></li>

									</ul>

								</div>

							</div>

						</div>

						<div class="col-md-4 col-lg-4">

							<div class="footer-widget">

								<div class="ft-widget-title color-primary">

									<h4 class="footer-title">Quick Links</h4>

								</div>

								<div class="help_links pt_50 hover_gray">

									<ul class="footer-ul">

									<li><a href="{{route('about-us')}}">About Us</a></li>

									<li><a href="{{route('property.search')}}">Featured Property</a></li>

									<li><a href="{{route('how-it-work')}}">How It Work</a></li>

										

									</ul>

								</div>

							</div>

						</div>

						<div class="col-md-4 col-lg-4">

							<div class="footer-widget">

								<div class="ft-widget-title color-primary">

									<h4 class="footer-title">Contact Us</h4>

								</div>

								<div class="help_links pt_50 pb_30 color-secondery">

									<ul class="footer-ul">

										<li>{{pluck_single_value('system_settings','name','office_address','value')}}</li>

										<li>{{pluck_single_value('system_settings','name','official_contact_number','value')}}</li>

										<li>{{pluck_single_value('system_settings','name','official_email_id','value')}}</li>

									</ul>

								</div>

								<div class="social_media hover_primary">

									<ul class="footer-ul">

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

			</div>

		</div>

		<div class="copyright py_30">	

			<div class="copy_text color-secondery d-inline">© {{ now()->year }} {{ config('app.name', 'Laravel') }} All right reserved</div>

			<div class="policy hover_gray">

				<ul>

					<li><a href="#">Privacy & Policy</a></li>

					<li><a href="#"> Site Map</a></li>

				</ul>

			</div>

		</div>

	</div>

</footer>