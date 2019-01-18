.PHONY: help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Install dependancies
	composer install
	yarn install
	yarn run encore dev

start: ## Starts dev web server
	bin/console server:start 127.0.0.1:1337

stop: ## Stops dev web server
	bin/console server:stop

reset: ## Resets dataset
	bin/console doctrine:database:drop --if-exists --force
	bin/console doctrine:database:create
	bin/console doctrine:migrations:migrate -n
	bin/console fixtures:load

build: ## Build assets
	yarn run encore dev

test: ## Test project as in CI
	bin/phpstan analyse src/ --level=7
	bin/phpcs
	bin/console security:check
	bin/phpspec run -fpretty --no-interaction -v
	bin/behat -v
	bin/console doc:schema:validate

stan: ## Static analysis with phpstan
	bin/phpstan analyse src/ --level=7

reset-migrations: ## Reset all migrations
	rm -Rf ./src/Migrations/*
	bin/console doc:database:drop --force --if-exists
	bin/console doc:database:create
	bin/console make:migration
	bin/console doc:mig:mig -n
	bin/console fixtures:load