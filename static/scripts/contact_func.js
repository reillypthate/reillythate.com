var $form = $('form#contact_form'),
    url = "https://script.google.com/macros/s/AKfycbwSNXVArxB3Vm_FeheUMyL6GpTX0JwazlJfRq7DekShCpQjqt52/exec"

$('#contact_form').on('click', function(e)
{
    e.preventDefault();
    var jqxhr = $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        data: $form.serializeObject()
    }).success(
        //do something
    );
})