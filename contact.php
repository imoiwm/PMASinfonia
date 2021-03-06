<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Contact Us</title>
        <?php headInfo("Contacts", "Contacts, Contact Us", ["contact"]); ?>
        <script>

            /*
             * Creates a mail link
             * Preconditions: total information must not exceed 2000 characters.
             * Postconditions: none
             * Parameters:
             * email the sender's email
             * message user message
             * name the user name
             * Returns: none
             */
            function mail(email, message, name) {
                let str = "Name: " + name + "\nEmail: " + email + "\nMessage: " + message; // body
                let subj = "Contact Message"; // subject of email
                window.open('mailto:ugasinfonia@gmail.com?subject=' + subj + '&body=' + encodeURIComponent(str));
            }

            /*
             * Composes a message
             * Preconditions: none
             * Postconditions: none
             * Parameters: none
             * Returns: none
             */
            function compose() {
                let data = new FormData(document.getElementById("contact-form")); // gets the form data
                let email = data.get('email'); // gets email
                let name = data.get('name'); // gets name
                let message = data.get('message'); // gets message
                mail(email, message, name); // mails
            }
        </script>
    </head>
    <body>
        <?php head(6); ?>
        <div style="margin-left:70px">
            <p>Leave us a message and we will get back to you as soon as possible!</p>
        </div>
        <form id="contact-form" action="javascript:compose()">
            <div class="form-row" style="padding-left:10px;">
                <div class="form-group col-md-6">
                <input class="form-control" type="name" name="name" type="text" placeholder="Your Name" style="margin-bottom:10px;width:524px" autofocus required>
                </div>
                <div class="form-group col-md-6">
                <input class="form-control" id="email" name="email" type="email" placeholder="Your Email" style="margin-bottom:10px;width:524px" required/>
                </div>
            </div>
            <div class="form-group" style="width:534px;padding-left:10px;">
                <textarea class="form-control form-id" id="message" name="message" placeholder="Your Message" maxlength="2000" rows="3" required></textarea>
            </div>
            <button class="btn btn-primary btnpad" type="submit" value="Send">Send</button>
        </form>
<!-- separator between Justin's work and Bootstrap template -->
        <div id="pane">
            <table>
                <tr>
                    <td class="left-col">
                        <a href="https://www.google.com/maps/search/?api=1&query=250+River+Road%2C+Athens%2C+GA+30602+United+States" class="middle-text">
                            250 River Road<br/>
                            Athens, GA 30602<br/>
                            United States
                        </a>
                    </td>
                    <td class="right-col">
                        <a href="https://www.google.com/maps/search/?api=1&query=250+River+Road%2C+Athens%2C+GA+30602+United+States" alt="Link to google maps of the location of PMA Sinfonia UGA Chapter">
                        <img class="svg-img" src="img/location.svg"></img>
                        </a>
                    </td>
                    <td class="left-col">
                    <a href="tel:+7706014123" class="middle-text">
                        770-601-4123
                    </a>
                    </td>
                    <td class="right-col">
                        <a href="tel:+7706014123" alt="Link for calling PMA Sinfonia UGA Chapter">
                            <img class="svg-img" src="img/call.svg"></img>
                        </a>
                    </td>
                    <td class="left-col">
                        <a href="mailto:ugasinfonia@gmail.com" class="middle-text">
                            ugasinfonia@gmail.com
                        </a>
                    </td>
                    <td class="right-col">
                        <a href="mailto:ugasinfonia@gmail.com" alt="Click to open an email to PMA Sinfonia UGA Chapter">
                            <img class="svg-img" src="img/mail.svg"></img>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <?php foot(); ?>
    </body>
</html>