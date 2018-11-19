CONSOLE=bin/console
WEBPACK=node_modules/.bin/webpack
WEBPACK_DEV_SERVER=node_modules/.bin/webpack-dev-server
WEBPACK_DASHBOARD=node_modules/.bin/webpack-dashboard

install-dev: vendor-install node-install db-create db-update webpack-dev
install: vendor-install db-create db-update

update-dev: project-update vendor-update node-update db-update cc-dev cc-prod
update: project-update vendor-update db-update cc-prod

# Cache / assets
cc-dev:
	rm -Rf var/cache/dev/*
	php $(CONSOLE) c:w -e dev
	php $(CONSOLE) assets:install --symlink

cc-prod:
	rm -Rf var/cache/prod/*
	php $(CONSOLE) c:w -e prod
	php $(CONSOLE) assets:install --symlink

# Webpack
webpack-dev:
	export NODE_ENV="development" && $(WEBPACK)  --config webpack.config.js --mode development

webpack-prod:
	export NODE_ENV="production" && $(WEBPACK)  --config webpack.config.js --mode production

hotreload:
	export NODE_ENV="development" && $(WEBPACK_DEV_SERVER) --config webpack.config.js --mode development

webpack-build:
	rm -Rf web/build
	make webpack-dev
	make webpack-prod

watch:
	export NODE_ENV="development" && $(WEBPACK) --config webpack.config.js --progress --colors --watch

dashboard:
	export NODE_ENV="development" && $(WEBPACK_DASHBOARD) -- $(WEBPACK_DEV_SERVER) --config webpack.config.js

# Database
db-create:
	php $(CONSOLE) doctrine:database:drop --force --if-exists
	php $(CONSOLE) doctrine:database:create --if-not-exists

db-update:
	php $(CONSOLE) doctrine:schema:update --force --dump-sql --complete

# Vendor
vendor-install:
	composer install

vendor-update:
	composer update

vendor-optimize:
	composer dump-autoload --optimize --no-dev --classmap-authoritative

node-install:
	yarn install

node-update:
	yarn upgrade

# Project
project-update:
	git pull

acl:
	sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX web var
	sudo setfacl -dR -m u:www-data:rwX -m u:`whoami`:rwX web var

#server
server-dev-start:
	php $(CONSOLE) server:start & make hotreload

server-prod-start:
	cd web && php -S localhost:8000 -t ./ app_cli.php

