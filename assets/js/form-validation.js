$('#contact-form').submit(function() {
    var values = {};

    $.each($('#contact-form').serializeArray(), function(i, field) {
        values[field.name] = field.value; 

        var reg = new RegExp($('input[name="' + field.name + '"]').attr('reg'));

        if(reg.test(field.value) === false) {
            alert(field.name+ " nem jó");
        }

    });

});