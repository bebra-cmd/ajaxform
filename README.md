0. apt install redis && apt install php-redis
1. composer install
1.0 composer require predis
2. Create .env
3. Insert it in .env[
Generate artisan key
Create db and role and give permissions (or don't lara anyways create sqlite .db)
SMTP information
information about redis connection
]
4. php artisan migrate
5. php artisan serve
6. php artisan queue:work redis
url: localhost:8000/testform


todo: 5 sec for response? lol just send your mail task in worker pool
so, basically add redis driver and configurate connection
make job and define data inside
put data from controller to job
start workerpool
!for production need supervisor!
