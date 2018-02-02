docker-bash:
	@docker exec -ti project bash

docker-up:
	cd docker && docker-compose up -d;
	node-sass ./assets/css/style.scss ./assets/css/dist/style.css -w --output-style compressed --error-bell
