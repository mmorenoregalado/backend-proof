# Refactorize los bash script centralizandolos en un Makefile para darle un poco más
# de escalabilidad y mantenibilidad. En este caso no hay mucho que reutilizar más que la variable container
# pero si por ejemplo se agrega composer require o composer update, se podría reutilizar la parte de composer install
# y podría ser interesante en otros casos de uso

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

CONTAINER_NAME="talently"

.PHONY:
all: start test

# 🐘 Composer
.PHONY: composer-install
composer-install:
	@docker exec $(CONTAINER_NAME) composer install

# 🐳 Docker Compose
# Build Docker Image
.PHONY: dock-build
dock-build:
	@docker build --tag $(CONTAINER_NAME):latest .

# Run Container
.PHONY: dock-run
dock-run:
	@docker run \
		--detach \
		--interactive \
		--tty \
		--rm \
		--volume $(current-dir):/project \
		--name $(CONTAINER_NAME) \
		$(CONTAINER_NAME)

# Start
.PHONY: start
start:
	@make dock-build
	@make dock-run
	@if [ ! -d "./vendor" ]; then make composer-install; fi

.PHONY: finish
finish:
	@docker stop $(CONTAINER_NAME)

# Testing
.PHONY: test
test:
	@docker exec $(CONTAINER_NAME) ./vendor/kahlan/kahlan/bin/kahlan
