install: 
	docker compose up -d
	docker exec logbook-api-fpm composer install

start:
	docker compose up -d

shell: 
	@docker exec -it logbook-api-fpm /bin/bash

cache-clear:
	@docker exec logbook-api-fpm bin/console cache:clear

lint:
	@docker exec logbook-api-fpm vendor/bin/php-cs-fixer fix src

code-quality:
	@docker exec logbook-api-fpm vendor/bin/phpstan analyse src tests

tests:
	@docker exec logbook-api-fpm vendor/bin/phpunit tests

qa: \
	lint \
	code-quality \
	tests
