/*
 *Written by Khagesh
 *contact Khagesh.office@gmail.com
 */
var Khagesh = function() {
    var e = "",
        t = "NO";
    return jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }),
        uuidv4 = function() {
            return 'xxxx-4xxx-yxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        },
        todecimal = function() {
              $(document).on("change", ".decimal", function () {
                var e = Number.parseFloat($(this).val());
                if (!$(this).val() || isNaN(e) || e < 0) return 0;
                $(this).val(e.toFixed(2))
            })
        }, makeamount = function(e, t, a) {}, copy = function(e) {
        var t = document.createElement("input");
        document.body.appendChild(t), t.value = e.textContent, t.select(), document.execCommand("copy", !1), t.remove()
    },
        onlynumber = function(e) {
            var t = e.keyCode ? e.keyCode : e.which; - 1 !== [8, 9, 13, 27, 46, 110, 190].indexOf(t) || 65 == t && (e.ctrlKey || e.metaKey) || t >= 35 && t <= 40 || t >= 48 && t <= 57 && !e.shiftKey && !e.altKey || t >= 96 && t <= 105 || e.preventDefault()
        },
initDatepicker = function(){
    $(".datepicker").each(function(item){
        $(this).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy'});
    });
        },
        imgupload1 = function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    var img = input.getAttribute("data-imgid");

                    reader.onload = function(e) {
                        console.log(img);
                        $('#' + img).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#btn-upload, .uploadImg").change(function() {
                readURL(this);
            });
            $(".deletephoto").click(function() {
                var img = $(this).data("imgid");
                $('#' + img).attr('src', defultimgthumb);
                var file = document.getElementById("btn-upload");
                file.value = file.defaultValue;
            });
        }, {
        init: function() {

            Khagesh.isPage("newCashVoucher") && uuidv4() && todecimal() && initDatepicker(),
            Khagesh.isPage("newChequeVoucher") && uuidv4() && todecimal() && initDatepicker(),
            Khagesh.isPage("sem_yr_view") && uuidv4()




        },
        setPage: function(t) {
            e = t
        },
        isPage: function(t) {
            return e == t
        }
    }
}();
