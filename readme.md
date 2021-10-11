## Project to manage company with their employees
Please make sure it is connected to the internet

### Project install
		
		git clone https://gitlab.com/mohrahmatullah/grtech_test_teknik
		

### Composer
		Composer install

### Database connection
Duplicate .env.example , rename to .env
Create database and create find these fields in the .env file and enter your information

		
		DB_DATABASE=
		DB_USERNAME=
		DB_PASSWORD=
		

### Cache clear
		
		php artisan config:cache
		
### If Use Docker
		
		docker exec -it container_id bash

### Make migrate
		
		php artisan migrate
		

### Make seed
		
		php artisan db:seed
		

### Or export database on directory
		
		sql/sql.sql
		

### If use linux

		php artisan route:clear
		php artisan config:clear
		php artisan cache:clear
		chmod -R 777 storage
		chmod -R 777 bootstrap/cache

### Make Storage Link
		
		php artisan storage:link
		

### Run project
		
		php artisan serve
		  
### Login info for admin
		
		email    : admin@grtech.com.my
		password : password
		
### Login info for user
		
		email    : user@grtech.com.my
		password : password
		
