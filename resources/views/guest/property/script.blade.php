@section("script")
    <script>
        (function ($) {
            $("#country_code").countrypicker();

            $(document).on("click",".enquiry_email_btn",function(){
                $("#validation_error_message").html('');
                $("#property_enquiry_modal").modal("show");
            });

            $(document).on("click",".enquiry_call_btn",function(){
                $("#call_now_modal").modal("show");
            });

            $("#add_to_favorite_list_form").on("submit",function(e){
                e.preventDefault();
                $("#favorites_success_message").html('');
                $("#favorites_error_message").html('');

                let url = "{{route('favorite.store')}}";
                let params = $("#add_to_favorite_list_form").serialize();
                function fn_success(result)
                {
                    $("#favorites_success_message").append(`<span class="text-white">${result.message}</span>`);
                    // $("#add_to_favorite_list_modal").modal("hide");

                }
                function fn_error(result)
                {
                    if(result.message.length>1)
                    {
                        $.each(result.message,function(index,item){
                            $("#favorites_error_message").append(`<span class="d-block">${item}</span>`);
                        });
                    }
                    else
                    {
                         $("#favorites_error_message").append(`<span class="d-block">${result.message}</span>`);
                    }
                }
                $.fn_ajax(url,params,fn_success,fn_error);

            });

            $(document).on("click",".add_to_favorite_list_btn",function(){
                $("#favorite_property_id").val('');
                $("#favorite_unit_id").val('');
                $("#favorites_success_message").html('');
                $("#favorites_error_message").html('');

                let button = $(this);

                let url = "{{route('check.user.auth.status')}}";
                let params = {};
                function fn_success(result)
                {
                    let property_id = button.attr("data-property_id");
                    let unit_id = button.attr("data-unit_id");
                    $("#favorite_property_id").val(property_id);
                    $("#favorite_unit_id").val(unit_id);
                    $("#add_to_favorite_list_modal").modal("show");
                }
                function fn_error(result)
                {
                    window.location.href = "{{route('login')}}";
                }
                $.fn_ajax(url,params,fn_success,fn_error);
            });

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
