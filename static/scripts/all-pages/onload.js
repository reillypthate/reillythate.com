//  Prepare the DOM for changes before the page has finished loading.
document.addEventListener("DOMContentLoaded", applyDefaultClasses);

let breakpoints = new Map();
breakpoints.set("phone",            375);
breakpoints.set("phone-wide",       667);
breakpoints.set("tablet-portrait",  768);
breakpoints.set("tablet-landscape", 1024);
breakpoints.set("laptop",           1280);
breakpoints.set("desktop",          1440);

//  Set JQuery cache for common items.

/* After the page has loaded, apply default classes to various elements. */
function applyDefaultClasses()
{
    applyEventListeners();
}

function applyEventListeners()
{
    window.addEventListener("resize", reactToWindowResize);

    let navMenuToggle = document.getElementById("nav-menu-toggle");
    navMenuToggle.addEventListener("click", reactToMenuToggle);

    reactToWindowResize();
}

function reactToWindowResize()
{
    let w = window.innerWidth;
    let h = window.innerHeight;

    letNavReactToWindowSize(w, h);
    //letParallaxReactToWindowSize(w, h);
}
//  Nav Code
function letNavReactToWindowSize(width, height)
{
    var $body =         $('body');
    var $header =       $('header');
    var $navPrimary =   $('#nav_primary');
    
    if(width < breakpoints.get("tablet-portrait"))
    {
        // Nav Menu Functionality
        $body.removeClass("mobile-mode nav-menu-open nav-menu-closed");
        $navPrimary.removeClass("active");
        $header.children("nav").removeClass("collapsible_open");

        $body.addClass("mobile-mode nav-menu-closed");
        $body.css('margin-top', ($('header').outerHeight() + 24));
    }
    if(width >= breakpoints.get("tablet-portrait"))
    {
        // Nav Menu Functionality
        $body.removeClass("mobile-mode nav-menu-open nav-menu-closed");
        $navPrimary.removeClass("active");
        $header.children("nav").removeClass("collapsible_open");
        $body.css('margin-top', "");
    }
}
function reactToMenuToggle()
{
    var $body =         $('body');
    var $header =       $('header');
    var $navToggle =    $('#nav-menu-toggle');
    
    $body.toggleClass("nav-menu-open nav-menu-closed");
    $navToggle.toggleClass("active");
    $header.children("nav").toggleClass("collapsible_open");

    $body.css('margin-top', ($('header').outerHeight() + 16));
}
//  Parallax Code
function letParallaxReactToWindowSize(width, height)
{
    $('.parallax-image__container').each(function() {
        var overlay = $(this).siblings('.parallax-image__container-overlay');
        var totalHeight = 0;
        overlay.children().each(function() {
            var temp = $(this).outerHeight(true);
            console.log(temp);
            totalHeight += $(this).outerHeight(true);
        });
        var mTop = parseInt(overlay.css('padding-top'));
        var mBottom = parseInt(overlay.css('padding-bottom'));
        
        if(width < breakpoints.get("tablet-portrait"))
        {
            $(this).css('height', totalHeight + mTop);// + mBottom);
        }else
        {
            $(this).css('height', "auto");
        }
    });
}