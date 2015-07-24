(function() {
    $('#contactForm').on('ajaxSuccess', function(ev, context, data, status, jqXHR) {
        if (data.error === true) {
            return console.log(arguments);
        } else {
            return $('#contactForm').hide(1000);
        }
    });

}).call(this);