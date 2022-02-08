DIR = /c/xampp/htdocs/web_prog/

all: 	calendar merchPage listOfBrothers

calendar : events
	cp calendar.php $(DIR)
	cp calendar.css $(DIR)

merchPage: merchandise
	cp merchPage.php $(DIR)

listOfBrothers: brothers
	cp listOfBrothers.php $(DIR)

events: container
	cp events.php $(DIR)

merchandise: container
	cp merchandise.php $(DIR)

brothers: container
	cp brothers.php $(DIR)

container:
	cp container.php $(DIR)

clean:
	rm -f $(DIR)*.php
	rm -f $(DIR)*.css
