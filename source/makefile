#!/usr/bin/make

include .env

#----------- Make Environment ----------------------
SHELL= /bin/sh
docker_bin= $(shell command -v docker 2> /dev/null)
docker_compose_bin= $(shell command -v docker-compose 2> /dev/null)
IMAGES_PREFIX= $(shell basename $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST)))))
NODE_SERVICE=site-node
USER_OPTION=--user="$(CURRENT_USER_ID):$(CURRENT_USER_GROUP_ID)"
COMPOSE_CONFIG=--env-file .env -p $(PROJECT_NAME) -f docker/docker-compose.$(ENVIRONMENT).yml



.DEFAULT_GOAL := help

help: ## Show this help
   @awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[92m%-15s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)


#Actions
check: ## Check your configuration
   $(docker_compose_bin) $(COMPOSE_CONFIG) config
build-img: ## Build images
   $(docker_compose_bin) $(COMPOSE_CONFIG) build
up: ## Start all containers (in background)
   $(docker_compose_bin) $(COMPOSE_CONFIG) up --no-recreate -d
up-force: ## Start all containers (in background)
   $(docker_compose_bin) $(COMPOSE_CONFIG) up -d
up-runtime: ## Start all containers (in background)
   $(docker_compose_bin) $(COMPOSE_CONFIG) up
down: ## Stop all started for development containers
   $(docker_compose_bin) $(COMPOSE_CONFIG) down || true
restart: ## Restart all started for development containers
   $(docker_compose_bin) $(COMPOSE_CONFIG) restart
init:
   $(docker_compose_bin) $(COMPOSE_CONFIG) run --rm $(USER_OPTION) $(NODE_SERVICE) yarn install
deploy:
   make down
   $(docker_compose_bin) $(COMPOSE_CONFIG) run --rm $(USER_OPTION) $(NODE_SERVICE) yarn install
   $(docker_compose_bin) $(COMPOSE_CONFIG) run --rm $(USER_OPTION) $(NODE_SERVICE) yarn build
   make up
sh-node:
   $(docker_compose_bin) $(COMPOSE_CONFIG) exec $(USER_OPTION) $(NODE_SERVICE) bash
sh-run-node:
   $(docker_compose_bin) $(COMPOSE_CONFIG) stop $(NODE_SERVICE)
   $(docker_compose_bin) $(COMPOSE_CONFIG) run --rm $(USER_OPTION) $(NODE_SERVICE) bash
   $(docker_compose_bin) $(COMPOSE_CONFIG) start $(NODE_SERVICE)
