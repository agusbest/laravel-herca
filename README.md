<!-- Saat nanti clone project di komputer lain, lakukan ini setelah git clone: -->

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

<!-- link postmasn -->

<!-- Lihat Komisi -->

GET http://localhost:8000/commission

<!-- Lihat Pembayaran -->

GET http://127.0.0.1:8000/payments

<!-- Tambah Pembayaran -->
POST http://127.0.0.1:8000/payments