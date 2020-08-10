(function ($) {

    $.ucfirst = function (str) {
        let text = str;
        let parts = text.split(' '),
            len = parts.length,
            i, words = [];
        for (i = 0; i < len; i++) {
            let part = parts[i];
            let first = part[0].toUpperCase();
            let rest = part.substring(1, part.length);
            let word = first + rest;
            words.push(word);

        }

        return words.join(' ');
    };
    $.isEmpty = function isEmpty(obj)
    {
          for(let prop in obj) {
            if(obj.hasOwnProperty(prop)) {
              return false;
            }
          }
          return JSON.stringify(obj) === JSON.stringify({});
        };
    toast = function (icon, msg, placement) {
        $.toast({
            heading: $.ucfirst(icon),
            text: msg,
            icon: `${icon}`,
            loader: true,
            showHideTransition: 'slide',
            loaderBg: '#9EC600',
            position: `${placement}`,
            stack: false,
            hideAfter: 5000
        });
    };
    $.swal = function (title, text, icon) {
        Swal.fire({
            title: `${title}`,
            text: text,
            icon: `${icon}`,
            showCancelButton: true,
            reverseButtons: true,
        });
    };

})(jQuery);
$(document).ready(function () {
    $(".numeric").keydown(function (e) {
        let numeric = $(this);
        if (numeric.val().length < 10) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
        }
        else {

            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            e.preventDefault();
        }
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

$(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        let newWindowWidth = $(window).width();
        if (newWindowWidth < 380) {
            $(".filter-anchor").on("click", function(){
                $(".filter-tab").toggle();
            });
        }
    }
});
