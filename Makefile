DIR = /c/xampp/htdocs/web_prog/

all: 	calendar

calendar:
	cp -r * $(DIR)

clean:
	rm -f $(DIR)*.php
	rm -f $(DIR)*.css
