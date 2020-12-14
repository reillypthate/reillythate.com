var textArea = document.getElementById("myEditor_bodyTEXT");

var renEd = document.getElementById("myEditor_bodyRendered");
var rawEd = document.getElementById("myEditor_bodyRaw");

textArea.hidden = true;
renEd.hidden = false;
rawEd.hidden = true;

renEd.contentEditable = "true";
rawEd.contentEditable = "false";

renEd.addEventListener("click", function() {

}, false);
renEd.addEventListener("input", function() {

}, false);

function toggleEditMode(checked)
{
    if(checked)
    {
        document.execCommand('defaultParagraphSeparator', false, '\n');
        // Removes <br>'s and converts the HTML to escaped characters.
        rawEd.innerHTML = renEd.innerHTML
            .replace(/<br>/g, "")
            .replace(/<p>/g,    "<p>" + "&lt;p&gt;")    .replace(/<\/p>/g,  "&lt;/p&gt;" + "</p>")
            .replace(/<h1>/g,   "<p>" + "&lt;h1&gt;")   .replace(/<\/h1>/g, "&lt;/h1&gt;" + "</p>")
            .replace(/<h2>/g,   "<p>" + "&lt;h2&gt;")   .replace(/<\/h2>/g, "&lt;/h2&gt;" + "</p>")
            .replace(/<h3>/g,   "<p>" + "&lt;h3&gt;")   .replace(/<\/h3>/g, "&lt;/h3&gt;" + "</p>")
            .replace(/<h4>/g,   "<p>" + "&lt;h4&gt;")   .replace(/<\/h4>/g, "&lt;/h4&gt;" + "</p>")
            .replace(/<h5>/g,   "<p>" + "&lt;h5&gt;")   .replace(/<\/h5>/g, "&lt;/h5&gt;" + "</p>")
            .replace(/<h6>/g,   "<p>" + "&lt;h6&gt;")   .replace(/<\/h6>/g, "&lt;/h6&gt;" + "</p>")
            ;
        //rawEditor.innerHTML = renderedEditor.innerHTML.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        //rawEditor.innerHTML = renderedEditor.innerHTML.replace(/</g, "<p>&lt;").replace(/>/g, "&gt;</p>");

        renEd.contentEditable = "false";
        rawEd.contentEditable = "true";

        rawEd.hidden = false;
        renEd.hidden = true;

    }else
    {
        // Inner HTML tags are destroyed, leaving whatever is left in the text editor.
        renEd.innerHTML = rawEd.innerText;
        document.execCommand('defaultParagraphSeparator', false, 'p');

        renEd.contentEditable = "true";
        rawEd.contentEditable = "false";

        rawEd.hidden = true;
        renEd.hidden = false;
    }
}