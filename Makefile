#!/usr/bin/make

include .env

#----------- Make Environment ----------------------
SHELL=/bin/sh
docker_bin=$(shell command -v docker 2> /dev/null)
docker_compose_bin=$(shell command -v docker-compose 2> /dev/null)
PHP_SERVICE=php
USER_OPTION=--user="$(CURRENT_USER_ID):$(CURRENT_USER_GROUP_ID)"
COMPOSE_CONFIG=--env-file .env -p $(PROJECT_NAME) -f docker/docker-compose.yml


.DEFAULT_GOAL := help

help: ## Show this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[92m%-15s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)


#Actions
watch:
	$(docker_compose_bin) $(COMPOSE_CONFIG) exec $(USER_OPTION) $(PHP_SERVICE) npm run watch
build-img: ## Build images
	$(docker_compose_bin) $(COMPOSE_CONFIG) build
install:
	$(docker_compose_bin) $(COMPOSE_CONFIG) exec $(USER_OPTION) $(PHP_SERVICE) composer install
	$(docker_compose_bin) $(COMPOSE_CONFIG) exec -u 0 $(PHP_SERVICE) npm install
sh-php:
	$(docker_compose_bin) $(COMPOSE_CONFIG) exec $(USER_OPTION) $(PHP_SERVICE) bash
up: ## Start all containers (in background)
	$(docker_compose_bin) $(COMPOSE_CONFIG) up --no-recreate -d
up-force: ## Start all containers (in background)
	$(docker_compose_bin) $(COMPOSE_CONFIG) up -d
down: ## Stop all started for development containers
	$(docker_compose_bin) $(COMPOSE_CONFIG) down || true
