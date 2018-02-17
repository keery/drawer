docker-bash:
	@docker exec -ti project bash

docker-up:
	cd docker && docker-compose up -d;
	npm run sass
