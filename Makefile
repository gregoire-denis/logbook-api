install: 
	docker compose up -d
	docker exec logbook-api-fpm composer install

start:
	docker compose up -d

shell: 
	@docker exec -it logbook-api-fpm /bin/bash

cache-clear:
	@docker exec logbook-api-fpm bin/console cache:clear
