# Variables
DOCKER_COMPOSE = docker compose -f ./docker-compose.yml
PHP_APP_SERVICE_RUN = $(DOCKER_COMPOSE) run --rm app

app-sh:
	@echo "Running crew-php container's bash..."
	@$(PHP_APP_SERVICE_RUN) bash

# ------------------------------
# Section: Containers management
# ------------------------------

build:
	@$(DOCKER_COMPOSE) build

start:
	@$(DOCKER_COMPOSE) up -d

stop:
	@$(DOCKER_COMPOSE) stop

remove:
	@$(DOCKER_COMPOSE) down -v