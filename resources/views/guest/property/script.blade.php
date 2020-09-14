@section("script")
    <script>
        (function ($) {
            $("#country_code").countrypicker();

            $("#property_enquiry_form").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    beforeSend: function () {
                        $("#property_inquiry_form_submit_btn").html(`<span class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></span>`);
                    },
                    url: "{{route('bookingRequest.store')}}",
                    method: "POST",
                    data: $("#property_enquiry_form").serialize(),
                    success: function (result) {
                        if (result.response === "success")
                        {
                           let modal = $("#property_enquiry_modal").modal("hide");
                            $("#success_message").text(result.message);
                            $("#modal_success_message").modal('show');
                        }
                        else
                        {
                            ("#validation_error_message").html('');
                             if(result.message.length>1)
                             {
                                 $.each(result.message,function(i,item){
                                     $("#validation_error_message").append(`<span class="d-block">${item}</span>`);
                                 })

                             }
                             else
                             {
                                 $("#validation_error_message").append(`<span class="d-block">${result.message}</span>`);
                             }
                        }
                        $("#property_inquiry_form_submit_btn").html('');
                        $("#property_inquiry_form_submit_btn").text("Submit");
                    },
                    error: function (jqXHR, exception) {
                        $("#validation_error_message").append(`<span class="d-block">${jqXHR.responseText}</span>`);
                        $("#property_inquiry_form_submit_btn").html('');
                        $("#property_inquiry_form_submit_btn").text("Submit");
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
