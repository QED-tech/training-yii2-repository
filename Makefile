up:
	docker-compose up -d
stop:
	docker-compose stop
install:
	docker-compose run --rm backend composer update

migrate:
	docker-compose run --rm backend yii migrate
seed:
	docker-compose run --rm backend yii seed/index
install:
	docker-compose run --rm backend composer install
init:
	docker-compose run --rm backend php /app/init