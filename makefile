docker-bash:
	@docker exec -ti project bash

docker-run:
	cd docker && docker-compose up -d;