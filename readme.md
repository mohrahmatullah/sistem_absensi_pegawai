## Project to manage company with their employees
Please make sure it is connected to the internet

### Project install
		
		git clone https://github.com/mohrahmatullah/sistem_absensi_pegawai
		

### Composer
		Composer install

### Database connection
Duplicate .env.example , rename to .env
Create database and create find these fields in the .env file and enter your information

		
		DB_DATABASE=
		DB_USERNAME=
		DB_PASSWORD=
		

### key
	
		php artisan key:generate

### Cache clear
		
		php artisan config:cache
		
### If Use Docker
		
		docker exec -it container_id bash

### Make migrate
		
		php artisan migrate
		

### Make seed
		
		php artisan db:seed
		

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
		
		email    : admin@admin.com
		password : password
		
