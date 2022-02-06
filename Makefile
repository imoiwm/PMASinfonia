all: 	calendar

calendar : events
	cp calendar.php /c/xampp/htdocs/
	cp calendar.css /c/xampp/htdocs/

events: container
	cp events.php /c/xampp/htdocs/

container:
	cp container.php /c/xampp/htdocs/

clean:
	rm -f /c/xampp/htdocs/*.php
	rm -f /c/xampp/htdocs/*.css
