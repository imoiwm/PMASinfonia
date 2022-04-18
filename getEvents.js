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
                        let data = [];
                        let events = this.responseXML.getElementsByTagName("EVENT");
                        for (t = 0; t < events.length; t++) {
                            let element = events[t];
                            let id = element.getElementsByTagName("ID")[0].innerHTML;
                            let title = element.getElementsByTagName("TITLE")[0].innerHTML;
                            let loc = element.getElementsByTagName("LOCATION")[0].innerHTML;
                            let da = new Date(element.getElementsByTagName("DATE")[0].innerHTML);
                            data.push({eventName: title, calendar: 'Events', color: 'blue', date: da, location: loc, detail: "reviews.php?which=e&id=" + id});
                        };
                        calendar = new Calendar('#event-calendar', data);
                        break;
                    case 300: // redirection
                        location.assign(this.responseXML.getElementsByTagName("URL")[0].innerHTML);
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
    xmlhttp.open("GET", "processes/events.php", true);
    xmlhttp.overrideMimeType('application/xml');
    xmlhttp.send();
}

function getEvents() {ajax();}