var $ruthless = $('#ruthless-video');

$ruthless.css("width", $("main").width());
$ruthless.css("height", $("main").width() * (9.0/16));

$( window ).resize(function(){
    $ruthless.css("width", $("main").width());
    $ruthless.css("height", $("main").width() * (9.0/16));
    if($("main").width() < 768)
    {
        $(".home-page__intro-overlay").children("h2").html("Filmmaker.<br>Web Developer.<br>Scientist.");
    }else
    {
        $(".home-page__intro-overlay").children("h2").html("Filmmaker. Web Developer. Scientist.");
    }
});