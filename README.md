Postup sestavení:

composer install 
npm install
Vytvořit .env soubor a zkopírovat zde .env.example
php artisan key:generate
php artisan storage:link
Nastavit databázi v .env
nmp run build
php artisan migrate
php artisan db:seed
php artisan serve

AdminURL: http://127.0.0.1:8000/admin
Email: admin@example.cz
Heslo: KW9U4HdLm5!0
