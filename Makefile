WEB = docker exec web

build:
	@echo "⏳ Starting build process..."
	@echo ""

	$(WEB) sh -c '[ -f .env ] || cp .env.example .env'

	docker compose --env-file web/.env up -d --build

	$(WEB) composer install

	$(WEB) php artisan key:generate
	$(WEB) php artisan migrate --force

	$(WEB) npm install
	$(WEB) npm run build

	@echo ""
	@echo "✔︎ Build completed successfully! Open: http://localhost:8080"