DIR = /c/xampp/htdocs/web_prog/

all: 	calendar

calendar:
	cp -r * $(DIR)

clean:
	rm -rf $(DIR)*
