--- Requisitos ---

-> PHP 8.2 ou superior <-
-> MySql 8 ou superior <-
-> Composer <-
-> Node.js 22.14 ou superior <-

--- Como rodar o projeto ---

-> composer require laravel/breeze --dev
-> php artisan breeze:install
-> php artisan migrate
-> php artisan make:seeder UserSeeder  
-> php artisan db:seed

-> Esta parte de baixo está correta

-> composer install
-> npm install
-> npm run dev


--- Tradução --- 

-> php artisan lang:publish 
-> composer require lucascudo/laravel-pt-br-localization --dev
-> php artisan vendor:publish --tag=laravel-pt-br-localization
-> alterar no arquivo .env para "APP_LOCALE=pt_BR"
