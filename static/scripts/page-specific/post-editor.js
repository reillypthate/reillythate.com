let dividerName = "module-insert__container";

let button_insertText = "<button class=\"module-insert__button module-insert__button-text\">Text</button>";
let button_insertImage = "<button class=\"module-insert__button module-insert__button-image\">Image</button>";
let dividerContent = "<ul class=\"module-insert__button-list\">" 
                    + "<li>" + button_insertText + "</li>"
                    + "<li>" + button_insertImage + "</li>"
                    + "</ul>";
let divider = "<div class=\"" + dividerName + "\">" + dividerContent + "</div>";

let newImageModule = "<button class=\"module-gallery__new-image\">New Image</button>";

let newChild = 1;


function insertNewTextElement()
{
    $('<textarea id="module-child__new' + newChild + '" class="module-child-text module-child" placeholder="New Text Area"></textarea>').insertBefore($(this).parents('.' + dividerName));

    newChild++;

    resetCanvas();
}
function insertNewImageElement()
{
    $('<fieldset id="module-child-gallery__new' + newChild + '" class="module-child-gallery module-child">' + newImageModule + '</fieldset>').insertBefore($(this).parents('.' + dividerName));
    $('#module-child-gallery__new' + newChild).prepend('<input type="hidden" name="module-child-gallery__new' + newChild + '-images" class="module-child-gallery__data" value="">');

    $('#module-child-gallery__new' + newChild).children('.module-gallery__new-image').click(openImageModal);//addImageToModule);
    newChild++;
    
    resetCanvas();
}

$('#modal__image-select').find('.close-button').click(function()
{
    $('#modal__image-select').css('display', 'none');
    $('#active_gallery').remove();
});
function openImageModal(i)
{
    i.preventDefault();
    $(this).parents('.module-child-gallery').append('<input type="hidden" id="active_gallery">');

    $('#modal__image-select').find('button').click(addImageToModule);
    $('#modal__image-select').css('display', 'block');
}
function addImageToModule(i)
{
    //  Find the input associated with the new image.
    i.preventDefault();

    $('#active_gallery').parents('.module-child-gallery').children('.module-child-gallery__data').attr('value', $('#active_gallery').parents('.module-child-gallery').children('.module-child-gallery__data').attr('value') + $(this).attr('value') + ';');

    $('#active_gallery').parents('.module-child-gallery').append($(this).clone());
    $('#active_gallery').siblings('.modal__image-select-button').click(removeImageFromModule);

    $('#active_gallery').parents('.module-child-gallery').append($('#active_gallery').siblings('.module-gallery__new-image'));

    $('#modal__image-select').css('display', 'none');
    $('#active_gallery').remove();
}
function removeImageFromModule(i)
{
    console.log("Try!");
    i.preventDefault();

    idToRemove = $(this).attr('value');
    stringSet = $(this).siblings('.module-child-gallery__data').attr('value');
    stringToRemove = idToRemove + ";";

    replacedValue = stringSet.replace(stringToRemove, "");
    console.log(stringSet + " ... " + replacedValue);

    $(this).siblings('.module-child-gallery__data').attr('value', replacedValue);

    $(this).remove();
}
function initializeGallery(i)
{
    $(this).prepend('<input type="hidden" name="' + $(this).attr('id') + '"-images" class="module-child-gallery__data" value="">');
    $(this).children('.modal__image-select-button').each(function(){
        $(this).siblings('.module-child-gallery__data').attr('value', $(this).siblings('.module-child-gallery__data').attr('value') + $(this).attr('value') + ';');
    });
    $(this).children('.modal__image-select-button').click(removeImageFromModule);

    $(this).children('.module-gallery__new-image').click(openImageModal);
}
$('.module-child-gallery').each(initializeGallery);
/**
 * Place dividers so that there's one before and after each element.
 */
function placeDividers()
{
    $(divider).insertBefore($('.blog-canvas').children('.module-child'));

    $('.blog-canvas').append(divider);
}
function addListenersToDividers()
{
    $('.' + dividerName).hover(dividerHoverStart, dividerHoverFinish);
    $('.module-insert__button-text').click(insertNewTextElement);
    $('.module-insert__button-image').click(insertNewImageElement);
    $('.module-child-text').next().keyup(function(){
        $(this).prev().html(CKEDITOR.instances[$(this).prev().attr('id')].getData());
    });
}
function dividerHoverStart()
{
    $(this).children('.module-insert__button-list').css('display', 'grid');
}
function dividerHoverFinish()
{
    $(this).children('.module-insert__button-list').css('display', 'none');
}
placeDividers();
addListenersToDividers();

/**
 * resetCanvas(), Part 1: Remove interactive elements from canvas.
 */
function clearCanvas()
{
    $('.delete-button').remove();
    $('.' + dividerName).remove();

    for(editorName in CKEDITOR.instances)
    {
        if(editorName.includes('module'))
        {
            //alert(CKEDITOR.instances[editorName].getData());//editorName);
            $('#' + editorName).html(CKEDITOR.instances[editorName].getData());
            CKEDITOR.instances[editorName].destroy(true);
        }
    }
}
function updateTextEditors()
{
    //  Update the names of the textareas, for backend processing.
    $('.blog-canvas textarea').each(function(i) {
        $(this).attr('name', $(this).attr('id'));
    });
    //  Replace textareas with inline CKEDITOR elements.
    $('.module-child-text').each(function(){
        CKEDITOR.inline($(this).attr('id'));
    });
    //  Add a listener to each text editor.
    $('.module-child-text').next().keyup(function(){
        $(this).prev().html(CKEDITOR.instances[$(this).prev().attr('id')].getData());
    });
}

//  
//  Put a "DELETE" button before the respective child module.
//  
function placeDeleteButton(i)
{
    $('.delete-button').remove();
    $('<button class="delete-button">X</button>').insertBefore($(this));
    $('.delete-button').click(removeChildModule);
}
function removeChildModule(i)
{
    if($(this).next().attr('id').includes('gallery'))
    {
        if(!$(this).next().attr('id').includes('new'))
        {
            $('#modules_removed').attr('value', $('#modules_removed').attr('value') + $(this).next().attr('id') + ';');
        }
        $(this).next().remove();
        $(this).remove();
    }else
    {
        //  Only add the child-module's ID to "modules_removed" if it's already in the database.
        if(!$(this).prev().attr('id').includes('new'))
        {
            $('#modules_removed').attr('value', $('#modules_removed').attr('value') + $(this).prev().attr('id') + ';');
        }
    
        $(this).prev().remove();
        $(this).remove();
    }

    resetCanvas();
}
function moduleHoverStart()
{
    $(this).css('outline', '1px solid var(--primary-off)');
}
function moduleHoverStop()
{
    $(this).css('outline', '');
}
function addListenersToModules()
{
    $('.module-child-text').next().focus(placeDeleteButton);
    $('.module-child-text').next().hover(moduleHoverStart, moduleHoverStop);


    $('.module-child-gallery').attr('tabindex', 0);
    $('.module-child-gallery').focus(placeDeleteButton);
    $('.module-child-gallery').hover(moduleHoverStart, moduleHoverStop);
}
addListenersToModules();

/**
 * Reorder the elements, then apply that new order to the #module-order hidden input.
 */
function reorder()
{
    order = "";
    temp = 1;
    $('.module-child').each(function()
    {
        order += $(this).attr('id') + ":";
        order += temp + ";";
        temp++;
    });
    $('#module-order').attr('value', order);
}
$('.blog-canvas').prepend('<input type="hidden" id="module-order" name="module-order">');
reorder();

function resetCanvas()
{
    clearCanvas();
    updateTextEditors();
    
    placeDividers();
    addListenersToDividers();

    addListenersToModules();

    reorder();
}

//  Goal for re-ordering things: 
//  Write Javascript function to rearrange the module children after they've been populated by the PHP code.