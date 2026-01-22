migrate:
	@echo "Migrating..."
	docker exec -it web php artisan migrate
	@echo "Migration completed."