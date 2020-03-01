start:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan config:cache
	php artisan config:clear
	php artisan route:clear
	php artisan migrate
	php artisan serve
