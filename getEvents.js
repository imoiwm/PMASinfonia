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
                        this.responseXML.getElementsByTagName("EVENT").forEach(element => {
                            let a = document.createElement('a');
                            a.setAttribute('href', element.getElementsByTagName("LINK")[0].innerHTML);
                            let div = document.createElement('div');
                            div.setAttribute('class', 'event');
                            let title = document.createElement('span');
                            title.setAttribute('class', 'event-title');
                            title.appendChild(document.createTextNode(
                                element.getElementsByTagName("TITLE")[0].innerHTML));
                            let location = document.createElement('span');
                            location.setAttribute('class', 'event-location');
                            location.appendChild(document.createTextNode(
                                element.getElementsByTagName("LOCATION")[0].innerHTML));
                            let date = document.createElement('span');
                            date.setAttribute('class', 'event-date');
                            date.appendChild(document.createTextNode(
                                element.getElementsByTagName("DATE")[0].innerHTML));
                            div.appendChild(title);
                            div.appendChild(location);
                            div.appendChild(date);
                            a.appendChild(div);
                            //document.getElementBy... .appendChild(a);
                        });
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
    xmlhttp.open("POST", "process.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.overrideMimeType('application/xml');
    xmlhttp.send("method=" + method + "&value=" + value);
}

function getEvents() {ajax();}