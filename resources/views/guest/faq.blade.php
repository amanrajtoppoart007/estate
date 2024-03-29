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
                        <li class="hover_gray"><a href="{{url('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li class="color-default">Faq</li>
					</ul>
				</div>
				<div class="float-right color-primary">
					<h3 class="banner-title font-weight-bold">Frequently Asked Qustions</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- FAQ Section Start -->
<section class="full_row py_80">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="sidebar-widget bg-gray p-4 settings_links color-secondery-a">
					<h4 class="inner_title mb-4 color-primary">FAQ’s Category</h4>
					<ul>
						<li>
							<a href="#">Service Conpatibility</a>
						</li>
						<li>
							<a href="#">Property Installation</a>
						</li>
						<li>
							<a href="award.html">Payment System</a>
						</li>
						<li class="active">
							<a href="faq.html">Trustable Broker</a>
						</li>
						<li>
							<a href="testimonial.html">Commertial Property</a>
						</li>
						<li>
							<a href="testimonial.html">Tax and Fees</a>
						</li>
						<li>
							<a href="testimonial.html">Support</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="info-pages bg-gray p-4">
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How To Gete Appoinment ?</h5>
							<p>Non pede ultricies auctor venenatis torquent dapibus ultricies purus platea mauris. Ridiculus neque mauris eleifend in euismod gravida blandit. Condimentum quisque, fermentum condimentum ipsum, justo auctor taciti massa. Tristique pretium eleifend. Elit donec nullam dui Tellus sem cras consequat non maecenas nisi potenti vehicula integer penatibus ante ullamcorper. Pretium curabitur.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How to provide the property ?</h5>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">What is legality and trust of your company ?</h5>
							<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How can sale my property ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How can buy a good property ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">What is the payment process ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">Who take the responsibility, if can’t sale my property ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How can I get rent a house ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">What is the oppertunity to build my career in this company ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How can I get good person for rent my house ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">About the safty of buying property ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="faq_item mb_30">
						<span class="faq_question bg-default color-white">Q</span>
						<div class="faq_answer d-table">
							<h5 class="mb-2 color-primary">How the ability of customize property ?</h5>
							<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p>
							<hr>
							<aside class="float-left">Was this answer helpful?<a class="color-default ml-2" href="#">Yes</a><a class="color-default ml-2" href="#">No</a></aside>
							<a class="float-right color-default" href="#">Contact Us</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<nav aria-label="Page navigation" class="alinment d-table">
							  <ul class="pagination my-4">
								<li class="page-item"><a class="page-link active" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">...</li>
								<li class="page-item"><a class="page-link" href="#">45</a></li>
								<li class="page-item"><a class="page-link active" href="#">Next</a></li>
							  </ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- FAQ Section End -->
@endsection