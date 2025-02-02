<!-- Saat nanti clone project di komputer lain, lakukan ini setelah git clone: -->

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve