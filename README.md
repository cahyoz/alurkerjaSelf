# Setup

pertama jalankan

```bash
composer install

```

lalu

```bash
php artisan key:generate
```

# Env

buat copy dari .env.example

```bash
cp .env.example .env
```

```
# Env Database (pilih salah satu)

# Database PostgreSqL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=alurkerja
DB_USERNAME=postgres
DB_PASSWORD=postgres

# Database MySqL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alurkerja
DB_USERNAME=root
DB_PASSWORD=
```

# Database

```bash
php artisan migrate:fresh
or
php artisan migrate:refresh
```

```bash
php artisan db:seed --class=ProvincesTableSeeder
php artisan db:seed --class=CitiesTableSeeder
php artisan db:seed --class=CompanySizeTableSeeder

```
![Home](https://drive.google.com/uc?export=view&id=1frk3f2G7hDvlakaPjv_gMzcwlmbbY76o)
