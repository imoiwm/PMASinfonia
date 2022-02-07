DIR = /c/xampp/htdocs/web_prog/

all: 	calendar merchPage

calendar : events
	cp calendar.php $(DIR)
	cp calendar.css $(DIR)

merchPage: merchandise
	cp merchPage.php $(DIR)

events: container
	cp events.php $(DIR)

merchandise: container
	cp merchandise.php $(DIR)

container:
	cp container.php $(DIR)

clean:
	rm -f $(DIR)*.php
	rm -f $(DIR)*.css
