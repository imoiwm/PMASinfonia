DIR = /c/xampp/htdocs/web_prog/

all: 	calendar

calendar:
	cp -r * $(DIR)

sass:
	sass styles/bscolors.scss styles/bscolors.css

clean:
	rm -rf $(DIR)*
