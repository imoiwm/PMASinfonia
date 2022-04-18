<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Calendar</title>
        <?php headInfo("Calendar", "Calendar, Events", ["calendar"]); ?>
        <script src="getEvents.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
        <script src="calendar.js"></script>
    </head>
    <body id="calendar-body">
        <?php head(); ?>
        <div id="event-calendar"></div>
        <?php foot(); ?>
    </body>
</html>