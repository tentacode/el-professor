.PHONY: help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Install dependancies
	composer install
	yarn install
	yarn run encore dev

start: ## Starts dev web server
	bin/console server:start 0.0.0.0:1337

stop: ## Stops dev web server
	bin/console server:stop

reset: ## Resets dataset
	bin/console doctrine:database:drop --if-exists --force
	bin/console doctrine:database:create
	bin/console doctrine:migrations:migrate -n
	bin/console doctrine:fixture:load -n

build: ## Build assets
	yarn run encore dev