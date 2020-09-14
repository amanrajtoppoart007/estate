@section("modal")
    {{Form::open(['id'=>'property_enquiry_form','method'=>'post','autocomplete'=>'off'])}}
    <input type="hidden" id="enquiry_property_id" name="property_id" value="1">
    <div class="modal custom-enquiry-modal" tabindex="-1" id="property_enquiry_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-lightblue">
                <div class="modal-header">
                    <h5 class="modal-title">Property Enquiry Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                    <textarea  class="form-control property-enquiry-input" name="message" placeholder="Type your message">Hey here is message</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                    <input type="text" class="property-enquiry-input" name="name" placeholder="Name" value="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                    <input type="email" class="form-control property-enquiry-input" name="email" placeholder="Email" value="name@gmail.com">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <select name="country_code" class="form-control selectpicker"  id="country_code" data-flag="true">

                                            </select>
                                        </div>
                                    </div>
                                          <input type="text" class="form-control property-enquiry-input property-enquiry-input" name="contact" placeholder="Mobile" value="1234567890">
                                </div>
                            </div>
                        </div>

                    </div>
                    <p id="validation_error_message" class="text-danger"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="property_inquiry_form_submit_btn" type="submit" class="btn btn-warning text-white" title="Request appointment of one of our agent.">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}

    {{Form::open(['id'=>'add_to_favorite_list_form','method'=>'post'])}}
    <div class="modal" tabindex="-1" id="add_to_favorite_list_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-lightblue">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Favorite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <p>Add the listing to your favorite list </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning text-white">Add</button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}


    <div class="modal" tabindex="-1" id="call_now_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-lightblue">
                <div class="modal-header">
                    <h5 class="modal-title">Call Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <p>
                       <span>We are here to help you find home you love</span>
                       <a class="text-warning" href="tel:+9711234567890">971xxxxxxx</a>
                   </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-primary" tabindex="-1" id="modal_success_message">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-gradient-success">
                <div class="modal-header">
                    <h5 class="modal-title text-white font-weight-bold">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-white" id="success_message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
