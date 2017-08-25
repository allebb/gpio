PHPCSFIXER_RELEASE=$(shell curl -s "https://api.github.com/repos/FriendsOfPHP/PHP-CS-Fixer/releases/latest" | grep browser_download_url | cut -d '"' -f 4)

install: check
	@composer install

check:
	@composer --version > /dev/null

fix:
	@echo Downloading... $(PHPCSFIXER_RELEASE)
	curl -LO -s "$(PHPCSFIXER_RELEASE)"
	@echo Running PHP-CS-Fixer...
	php php-cs-fixer.phar fix ./src/
	php php-cs-fixer.phar fix ./tests/

clean:
	rm php-cs-fixer.phar
	rm .php_cs.cache
	rm -r report
	rm -r vendor

test:
	./vendor/bin/phpunit

coverage:
	./vendor/bin/phpunit --coverage-html ./report

.PHONY: install check clean fix coverage
