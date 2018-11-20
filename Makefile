start:
	bin/console server:start 0.0.0.0:1337

stop:
	bin/console server:stop

reset:
	bin/console doctrine:database:drop --if-exists --force
	bin/console doctrine:database:create
	bin/console doctrine:migrations:migrate -n
	bin/console doctrine:fixture:load -n

build:
	yarn run encore dev