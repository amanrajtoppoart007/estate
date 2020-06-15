(function ($) {
    let csrf_token = $('meta[name="csrf-token"]').attr('content');
    let base_url = $('meta[name="base-url"]').attr('content');
    $.fn_ajax = function fn_ajax(url, params, fn_success, fn_error) {
        jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': csrf_token, } });
        jQuery.ajax({
            url: url,
            type: 'POST',
            data: params,
            dataType: 'json',
            success: function (result)
            {
                if (result.status === "1")
                {
                    fn_success(result);
                }
                else
                {
                    fn_error(result);
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.swal(textStatus, errorThrown, 'error');
            }
        });
    };
    $.fn_ajax_multipart = function fn_ajax_multipart(url, params, fn_success, fn_error) {
        jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': csrf_token, } });
        jQuery.ajax({
            url: url,
            type: 'POST',
            data: params,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (result)
            {
                if (result.status === 1)
                {
                    fn_success(result);
                }
                else
                {
                    fn_error(result);
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.swal(textStatus, errorThrown, 'error');
            }
        });
    };
    $.validation_errors = function validation_errors(result) {
        if (result.response ==="validation_error") {
            $.each(result.message,function(index,item){
                toast('error', item, 'bottom-right');
            });
        }
    };
     search = function(keyword)
    {
         $('.search-data-container').empty();
        keyword = keyword.trim();
        if(keyword.length>=4)
        {
            $(".search-div").fadeIn("fast");
            $(".loader-container").fadeIn("fast");
            $(".search-data-container").fadeOut("fast");
            let params = {search : keyword};
            let url = base_url + '/search/property/listing';
            function fn_success(result)
            {
                 render_property(result.data);
            };
            function fn_error(result)
            {
                $('.search-data-container').empty();
                $(".search-data-container").fadeOut("fast");
                $(".loader-container").fadeOut("fast");
                toast('error', result.message, 'bottom-right');
            };
            $.fn_ajax(url,params,fn_success,fn_error);

        }
         else
         {
            $(".search-div").fadeOut("fast");
        }
    }
    function render_property(data)
    {
         if(data.length>0)
         {
             var html = '';
             $.each(data,function(index,item){
                  html += `<div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <a href="${item.view_url}">
                                    <img class="card-img-top" src="${item.image}">
                                </a>
                            </div>
                            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <a href="${item.view_url}">
                                    <h5>${item.title}</h5>
                                </a>
                                <h6><i class="fa fa-map-pin"></i> ${item.city_name} </h6>
                                <h6><span>${item.price}</span>-<span> For ${item.mode}</span></h6>
                                <div class="badge badge-warning">${item.created_at}</div>
                            </div>
                        </div>
                    </div>
                </div>`;
             });
             $('.search-data-container').html(html);
             $(".search-data-container").fadeIn("fast");
             $(".loader-container").fadeOut("fast");

         }
    }
})(jQuery);

