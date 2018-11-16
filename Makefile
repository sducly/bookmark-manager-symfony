install:
	php bin/console doctrine:database:create
	php bin/console doctrine:schema:update
	composer install
	make cc-dev
	make cc-prod

update:
	composer update
	php bin/console cache:clear

cc-dev:
	php bin/console cache:clear -e dev

cc-prod:
	php bin/console cache:clear -e prod

server-start:
	php bin/console server:start

server-stop:
	php bin/console server:stop