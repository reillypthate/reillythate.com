// https://medium.com/@andybarefoot/a-masonry-style-layout-using-css-grid-8c663d355ebb

function resizeItem(i, element)
{    
    //$(element).css('margin-bottom', '');
    grid = $('.blog-preview-list')[0];
    rowHeight = parseInt($(grid).css('grid-auto-rows'));
    rowGap = parseInt($(grid).css('grid-row-gap'));
    contentHeight = $($(element).children()[0]).height();
    rowSpan = 
        (contentHeight + rowGap) / (rowHeight + rowGap);
    
    roundedRowSpan = Math.ceil(rowSpan);
    
    if(i == 0)
    {
        console.log(rowSpan);
        /*
        console.log("Element " + i);
        console.log("\tRow Height: " + rowHeight);
        console.log("\tRow Gap: " + rowGap);
        console.log("\tContent Height: " + contentHeight);
        console.log("\tNearest Height: " + nearestHeight);
        console.log("\tNew Padding: " + newPadding);
        console.log($(element).children().css('padding-bottom'));
        console.log("\tRow Span: " + rowSpan);
        */
    }
    difference = $(element).height() - contentHeight;
    if(difference != 0)
    {
        
    }
    padding = ((rowHeight + rowGap) * (roundedRowSpan - rowSpan));
    
    $(element).css('grid-row-end', "span " + (roundedRowSpan));

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
