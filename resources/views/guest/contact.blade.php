@extends("guest.layout.main")
@section("content")
    <!-- Form -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center py-5 colorOrange">HAVE SOME QUESTIONS ?</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6 text-center">
              <img src="{{asset('theme/images/special_gallery/contact.svg')}}" class="img-fluid email-icon py-5 my-3">
            </div>
            <div class="col-sm-6">
                <div class="container">
                  <form action="">
                    <input type="text" id="fname" name="firstname" placeholder="First Name..">

                    <input type="text" id="lname" name="lastname" placeholder="Last Name..">

                    <input type="text" id="email" name="email" placeholder="Email..">

                    <textarea id="subject" name="subject" placeholder="Whats your Questions.." style="height:200px"></textarea>

                    <input type="submit" class="btn btn-primary btn-block btn-Formsubmit " value="SEND MESSAGE">
                  </form>
            </div>
            </div>
        </div>
    </div>
@endsection
