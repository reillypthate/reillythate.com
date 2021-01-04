validEmail = false;

function validateContactForm()
{
    fieldsFilled = true;

    if(!$('#cf-field_first-name').val())
    {
        fieldsFilled = false;
        $(this).css('border-color', '');
    }
    if(!$('#cf-field_last-name').val())
    {
        fieldsFilled = false;
        $(this).css('border-color', '');
    }
    if(!$('#cf-field_email').val())
    {
        fieldsFilled = false;
        $(this).css('border-color', '');
    }
    if(!$('#cf-field_subject').val())
    {
        fieldsFilled = false;
        $(this).css('border-color', '');
    }
    if(!$('#cf-field_message-body').val())
    {
        fieldsFilled = false;
        $(this).css('border-color', '');
    }

    if(fieldsFilled)
    {
        validateEmail();
        if(validEmail)
        {
            $('#cf-button_submit').prop('disabled', false);
        }else
        {
            $('#cf-button_submit').prop('disabled', true);
        }
    }else
    {
        $('#cf-button_submit').prop('disabled', true);
    }
}
function validateEmail()
{
    $('#cf-label_email .required span').remove();

    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!$('#cf-field_email').val())
    {
        validEmail = false;
        $('#cf-field_email').css('border-color', '');
        return;
    }
    if(regex.test($('#cf-field_email').val()))
    {
        console.log('Valid email!');
        validEmail = true;

        $('#cf-field_email').css('border-color', 'green');
    }else
    {
        console.log("Fucker!");
        validEmail = false;

        $('#cf-field_email').css('border-color', 'red');
        $('#cf-label_email .required').append('<span> Invalid email *</span');
    }
}
function watchInput(i)
{
    if($(this).val())
    {
        $(this).css('border-color', 'green');
    }
}
$('#contact-form').children().bind('input', validateContactForm);
$('#contact-form').children().change(watchInput);
$('#cf-field_email').change(validateEmail);