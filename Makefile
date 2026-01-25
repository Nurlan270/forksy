build:
	@echo "Starting build process..."
	docker exec web composer install
	docker exec web npm install
	docker exec web npm run build
	docker exec web php artisan migrate
	@echo "Build completed. You can open website on http://localhost:8080"