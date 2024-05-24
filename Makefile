start: 
	docker compose up -d
	docker exec symfony-base-api-fpm composer install