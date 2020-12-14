var addElement;

var dropZoneStuff;

$(function()
{
    $("#potential_elements").selectable({
        stop: function(){
            $('.token_slot').remove(); // Remove any slot_tokens before doing anything.
            $(".ui-selected", this).each(function(){
                var element = $(".ui-selected").text();
                var dropZone = $("#drop_zone");
                var dropZoneSize = $("#drop_zone *").length;
                console.log(dropZoneSize);
                if(dropZoneSize < 1)
                {
                    dropZone.append("<" + element + " class=\"token\">" + element + "</" + element + ">");
                    $(".ui-selected").removeClass("ui-selected");
                }else
                {
                    dropZoneStuff = $("#drop_zone > *");
                    console.log(dropZoneStuff);
                    dropZone.empty();
                    dropZone.append("<div class=\"token_slot\">Add Here</div>");
                    for(i = 0; i < dropZoneStuff.length; i++)
                    {
                        dropZone.append(dropZoneStuff[i]);
                    }
                    dropZone.append("<div class=\"token_slot\">Add Here</div>");
                    addElement = element;
                }
            });
        }
    });

    $("#drop_zone").selectable({
        stop: function(){
            $(".ui-selected", this).each(function(){
                if(this.classList.contains('token_slot'))
                {
                    this.
                    this.append("<" + addElement + " class=\"token\">" + addElement + "</" + addElement + ">");
                    $(".ui-selected").removeClass("ui-selected");
                }
            });
        }
    });

    $("#selectable").selectable(
    {
        stop: function()
        {
            var result = $("#select-result").empty();
            var content = $(".builder").html();
            var builder = $(".builder").empty();
            $(".ui-selected", this).each(function()
            {
                var index = $("#selectable li").index(this);
                result.append(" #" + (index + 1));

                builder.append("<div class=\"before\">Add Before</div>")
                builder.append(content);
                builder.append("<div class=\"after\">Add After</div>")

                selected = $(".ui-selected").text();
            });
        }
    }
    );
    $(".builder").selectable(
    {
        stop: function()
        {
            $(".before").remove();
            $(".after").remove();
            $(".builder").append("<" + selected + ">+</" + selected + ">");

            // Right now, the builder simply adds the new element to the end of the div.

            var result = $(".builder").html();
            $(".ui-selected", this).each(function()
            {

            });
        }
    }
    );
});
