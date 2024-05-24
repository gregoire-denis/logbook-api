install:
	docker compose up -d
	docker exec logbook-api-fpm composer install

start:
	docker compose up -d
