WEB = docker exec web

build:
	@echo "⏳ Starting build process..."
	@echo ""

	docker compose up -d --build

	$(WEB) sh -c '[ -f .env ] || cp .env.example .env'

	$(WEB) composer install

	$(WEB) php artisan key:generate
	$(WEB) php artisan migrate --force

	$(WEB) npm install
	$(WEB) npm run build

	@echo ""
	@echo "✔︎ Build completed successfully! Open: http://localhost:8080"