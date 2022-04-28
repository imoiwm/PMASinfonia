/*
 * Validates the input from input
 * Preconditions: none
 * Postconditions: none
 * Parameters:
 * formid the string id of the form in question
 * Returns:
 * true if it can be submitted, false if not
 */
function validate(formid) {
    return (document.querySelector("form#" + formid + " input:invalid") === null) ? true : false;
} // since pattern is used, all invalid input will be marked as such (not supported on Safari though)

/*
 * Validates the input from textarea
 * Preconditions: none
 * Postconditions: none
 * Parameters:
 * formid the string id of the form in question
 * Returns:
 * true if it can be submitted, false if not
 */
function validateTextArea(formid) {
    let text = document.querySelectorAll("form#" + formid + " textarea"); // get all textareas
    for (t = 0; t < text.length; t++) {
        if (/<\/?[a-z][\s\S]*>/i.test(text[t].value)) return false;
    } // test for HTML elements for each text area
    return true;
} // just tests for HTML elements