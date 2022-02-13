DIR = /c/xampp/htdocs/web_prog/

all: 	calendar merchPage listOfBrothers

calendar : events normalize defined
	cp calendar.php $(DIR)
	cp calendar.css $(DIR)

merchPage: merchandise normalize defined
	cp merchPage.php $(DIR)

listOfBrothers: brothers normalize defined
	cp listOfBrothers.php $(DIR)

events: container
	cp events.php $(DIR)

merchandise: container
	cp merchandise.php $(DIR)

brothers: container
	cp brothers.php $(DIR)

normalize:
	cp normalize.css $(DIR)

defined: 
	cp defined.php $(DIR)

container:
	cp container.php $(DIR)

clean:
	rm -f $(DIR)*.php
	rm -f $(DIR)*.css
