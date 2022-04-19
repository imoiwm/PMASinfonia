function validate(formid) {
    return (document.querySelector("form#" + formid + " input:invalid") === null) ? true : false;
} // since pattern is used, all invalid input will be marked as such (not supported on Safari though)

function validateTextArea(formid) {
    let text = document.querySelectorAll("form#" + formid + " textarea");
    for (t = 0; t < text.length; t++) {
        if (/<\/?[a-z][\s\S]*>/i.test(text[t].value)) return false;
    } // test for HTML elements
    return true;
} // just tests for HTML elements