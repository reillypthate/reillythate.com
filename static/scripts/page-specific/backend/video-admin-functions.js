//
//  Function Definitions
//
//

function doVideoAddModal(i)
{
    $('#db-submit').attr('name', 'db_ADD').text('Add Video');
    $('#modal__video-admin').css('display', 'block');

    $('#video-input__id').attr('value', null);
    $('#video-input__slug').attr('value', null);
    $('#video-input__title').attr('value', null);
    $('#video-input__src').attr('value', null);
    $('#video-input__attributes').text("");

}
function doVideoEditModal(i)
{
    $(this).parents('.video-item').append('<input type="hidden" id="active_video">');

    $('#db-submit').attr('name', 'db_UPDATE').text('Update Video');
    $('#modal__video-admin').css('display', 'block');

    var a = $(this).parents('.video-item');
    $('#video-input__id').attr('value', a.data('video_id'));
    $('#video-input__slug').attr('value', a.data('video_slug'));
    $('#video-input__title').attr('value', a.data('video_title'));
    $('#video-input__src').attr('value', a.data('video_src'));
    //$('#video-input__attributes').text(a.data('video_attributes'));
}

//
//  Commands
//
//
var vm = $('.video-item');
vm.append('<div class="video-item__buttons"><button class="video-item__button-edit">Edit Video</button></div>');

$('#video-admin__button-add').click(doVideoAddModal);
$('.video-item__button-edit').click(doVideoEditModal);


$('#modal__video-admin').find('.close-button').click(function()
{
    $('#modal__video-admin').css('display', 'none');
    $('#active_video').remove();
});