var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    content.classList.toggle("collapsible_open");
    /*
    if (content.style.display === "inherit") {
    content.style.display = "none";
    } else {
    content.style.display = "inherit";
    }*/
});
} 