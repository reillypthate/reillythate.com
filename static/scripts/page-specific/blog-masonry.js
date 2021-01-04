// https://medium.com/@andybarefoot/a-masonry-style-layout-using-css-grid-8c663d355ebb

function resizeItem(i, element)
{
    grid = $('.blog-preview-list')[0];
    rowHeight = parseInt($(grid).css('grid-auto-rows'));
    rowGap = parseInt($(grid).css('grid-row-gap'));
    contentHeight = $($(element).children()[0]).height();
    rowSpan = Math.ceil(
        ($($(element).children()[0]).height() + rowGap) / (rowHeight + rowGap)
    );
    
    /*
    if(i == 2)
    {
        console.log("Element " + i);
        console.log("\tElement Height: " + rowHeight);
        console.log("\tContent Height: " + contentHeight);
        console.log("\tRow Span: " + rowSpan);
    }
    */
    
    $(element).css('grid-row-end', "span " + rowSpan);

}
function resizeAllGridItems()
{   
    $('.blog-preview').each(resizeItem);
}
function resizeInstance(instance)
{
    //console.log(instance);
    item = instance.elements[0];
    resizeAllGridItems(item);
}

window.onload = resizeAllGridItems();

window.addEventListener("resize", resizeAllGridItems);

$(".blog-preview").each(function(i, element){
    imagesLoaded(element, resizeInstance);
});
