/*
 * Executes ajax for getEvents()
 * Preconditions: none
 * Postconditions: none
 * Parameters: none
 * Returns: none
 */
function ajax() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        switch (this.readyState) {
            case 0: // request not initialized
                break;
            case 1: // server connection established
                break;
            case 2: // request recieved
                break;
            case 3: // processing request
                break;
            case 4: // request finished and response is ready
                switch (this.status) {
                    case 200: // Found
                        let data = []; // main data array
                        let events = this.responseXML.getElementsByTagName("EVENT"); // get events collection
                        for (t = 0; t < events.length; t++) {
                            let element = events[t]; // get current event
                            let id = element.getElementsByTagName("ID")[0].innerHTML; // get event id
                            let title = element.getElementsByTagName("TITLE")[0].innerHTML; // get event title
                            let loc = element.getElementsByTagName("LOCATION")[0].innerHTML; // get event location
                            let da = new Date(element.getElementsByTagName("DATE")[0].innerHTML); // get event date
                            data.push({eventName: title, calendar: 'Events', color: 'blue', date: da, location: loc, detail: "reviews.php?which=e&id=" + id}); // push
                        }; // for each event, create an array containing data and push to data
                        calendar = new Calendar('#event-calendar', data);
                        break;
                    case 300: // redirection
                        location.assign(this.responseXML.getElementsByTagName("URL")[0].innerHTML); // redirect using returned value
                        break;
                    case 400: // Bad input
                    case 403: // Forbidden
                    case 404: // Not Found
                    case 500: // Server error
                        window.alert(this.responseXML.getElementsByTagName("ERROR")[0].innerHTML);
                        break;
                    default: // in here just in case
                }
                break;
            default: // in here just in case
        }
    };
    xmlhttp.open("GET", "processes/events.php", true); // way of sending info does not matter
    xmlhttp.overrideMimeType('application/xml'); // override mime-type to produce xml
    xmlhttp.send(); // send
}

function getEvents() {ajax();} // wrapper