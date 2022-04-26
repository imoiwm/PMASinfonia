<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <!-- Required meta tags -->
        <title>Calendar</title>
        <?php headInfo("Calendar", "Calendar, Events", ["calendar"]); ?>
        <script src="getEvents.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
        <script src="calendar.js"></script>
    </head>
    <body id="calendar-body">
        <!--Bootstrap navbar w/ Calendar highlighted-->
        <?php head(3); ?>
        <div id="event-calendar" ></div>
        <?php foot();?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>getEvents();</script>
    </body>
</html>