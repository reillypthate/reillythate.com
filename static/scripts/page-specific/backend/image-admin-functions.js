//
//  Function Definitions
//
//

function doImageAddModal(i)
{
    $('#db-submit').attr('name', 'db_ADD').text('Add Image');
    $('#modal__image-admin').css('display', 'block');

    $('#image-input__id').attr('value', null);
    $('#image-input__slug').attr('value', null);
    $('#image-input__path').attr('value', null);
    $('#image-input__name').attr('value', null);
    $('#image-input__type').attr('value', null);
    $('#image-input__alt').text("");
    //$('#image-input__srcset').text("");

}
function doImageEditModal(i)
{
    $(this).parents('.image-item').append('<input type="hidden" id="active_image">');

    $('#db-submit').attr('name', 'db_UPDATE').text('Update Image');
    $('#modal__image-admin').css('display', 'block');

    var a = $(this).parents('.image-item');
    $('#image-input__id').attr('value', a.data('image_id'));
    $('#image-input__slug').attr('value', a.data('image_slug'));
    $('#image-input__path').attr('value', a.data('image_path'));
    $('#image-input__name').attr('value', a.data('image_name'));
    $('#image-input__type').attr('value', a.data('image_type'));
    $('#image-input__alt').text(a.data('image_alt'));
    //$('#image-input__srcset').text(a.data('image_srcset'));
}

//
//  Commands
//
//
var im = $('.image-item');
im.append('<div class="image-item__buttons"><button class="image-item__button-edit">Edit Image</button></div>');

$('#image-admin__button-add').click(doImageAddModal);
$('.image-item__button-edit').click(doImageEditModal);


$('#modal__image-admin').find('.close-button').click(function()
{
    $('#modal__image-admin').css('display', 'none');
    $('#active_image').remove();
});