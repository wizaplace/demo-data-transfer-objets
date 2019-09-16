test:
	vendor/bin/phpstan analyze --level max src/
	php bin/phpunit
