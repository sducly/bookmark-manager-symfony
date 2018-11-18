CONSOLE=bin/console
WEBPACK=node_modules/.bin/webpack
WEBPACK_DEV_SERVER=node_modules/.bin/webpack-dev-server

install:
	php $(CONSOLE) doctrine:database:create
	php $(CONSOLE) doctrine:schema:update
	composer install
	make cc-dev
	make cc-prod
	yarn

update:
	composer update
	php $(CONSOLE) cache:clear

cc-dev:
	php $(CONSOLE) cache:clear -e dev

cc-prod:
	php $(CONSOLE) cache:clear -e prod

server-start:
	php $(CONSOLE) server:start
	make hotreload

server-stop:
	php $(CONSOLE) server:stop

webpack-dev:
	export NODE_ENV="development" && $(WEBPACK)  --config webpack.config.js

webpack-prod:
	export NODE_ENV="production" && $(WEBPACK)  --config webpack.config.js

hotreload:
	export NODE_ENV="development" && $(WEBPACK_DEV_SERVER) --config webpack.config.js --mode development

dashboard:
	export NODE_ENV="development" && $(WEBPACK_DASHBOARD) -- $(WEBPACK_DEV_SERVER) --config webpack.config.js