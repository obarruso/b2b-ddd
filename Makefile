 COMPOSE=docker-compose -f docker/docker-compose.yml

start:
	
	$(COMPOSE) build
	$(COMPOSE) up -d --remove-orphans

stop:
	$(COMPOSE) stop
	sudo chown -R obarruso:obarruso ./docker/database/data/*

reload:
	$(COMPOSE) down
	$(COMPOSE) build
	$(COMPOSE) up -d --remove-orphans

bash:
	$(COMPOSE) run --rm php-fpm bash

db-create:
	$(COMPOSE) run --rm php-fpm bin/console doc:sch:cre
db-update-dump:
	$(COMPOSE) run --rm php-fpm bin/console doc:sch:upd --dump-sql
db-update-force:
	$(COMPOSE) run --rm php-fpm bin/console doc:sch:upd --force