#!/usr/bin/make

include ../source/.env

#----------- Make Environment ----------------------
SHELL= /bin/sh
docker_bin= $(shell command -v docker 3> /dev/null)
docker_compose_bin= $(shell command -v docker-compose 3> /dev/null)
IMAGES_PREFIX= $(shell basename $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST)))))
NODE_SERVICE=site-node
USER_OPTION=--user="$(CURRENT_USER_ID):$(CURRENT_USER_GROUP_ID)"
COMPOSE_CONFIG=--env-file .env -p $(PROJECT_NAME) -f docker/docker-compose.yml


.DEFAULT_GOAL := help

#Actions
init:
	$(docker_compose_bin) $(COMPOSE_CONFIG) run --rm $(USER_OPTION) $(NODE_SERVICE) composer install
	cd ../source/; ls -la; composer install;
	#cd ../source/; docker exec -it docker_php_1 composer install;

