//  Prepare the DOM for changes before the page has finished loading.
document.addEventListener("DOMContentLoaded", applyDefaultClasses);

let breakpoints = new Map();
breakpoints.set("phone",            375);
breakpoints.set("phone-wide",       667);
breakpoints.set("tablet-portrait",  768);
breakpoints.set("tablet-landscape", 1024);
breakpoints.set("laptop",           1280);
breakpoints.set("desktop",          1440);

/* After the page has loaded, apply default classes to various elements. */
function applyDefaultClasses()
{
    //  The Primary nav should be "closed" when the page is opened.
    //      CSS .closed-menu will be dynamically applied when screen is resized.

    let body = document.getElementsByTagName("body")[0];
    let primaryNav = document.getElementById("nav_primary");
    let navMenuToggle = document.getElementById("nav-menu-toggle");

/*
    // On mobile devices, make the Header a fixed element.
    body.classList.toggle("mobile-mode");
    body.classList.toggle("nav-menu-open");
    navMenuToggle.classList.toggle("active");
    navMenuToggle.nextElementSibling.classList.toggle("collapsible_open");
    //primaryNav.classList.toggle("nav-menu-closed");
*/
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

    if(w < breakpoints.get("tablet-portrait"))
    {
        // Nav Menu Functionality
        $("body").removeClass("mobile-mode nav-menu-open nav-menu-closed");
        $("#nav_primary").removeClass("active");
        $("header").children("nav").removeClass("collapsible_open");

        $("body").addClass("mobile-mode nav-menu-closed");
        $('body').css('margin-top', ($('header').outerHeight() + 16));
    }
    if(w >= breakpoints.get("tablet-portrait"))
    {
        // Nav Menu Functionality
        $("body").removeClass("mobile-mode nav-menu-open nav-menu-closed");
        $("#nav_primary").removeClass("active");
        $("header").children("nav").removeClass("collapsible_open");
        $('body').css('margin-top', 0);
    }
}
function reactToMenuToggle()
{
    $("body").toggleClass("nav-menu-open nav-menu-closed");
    $("#nav-menu-toggle").toggleClass("active");
    $("header").children("nav").toggleClass("collapsible_open");

    $('body').css('margin-top', ($('header').outerHeight() + 16));
}