![AlurKerja](https://github.com/user-attachments/assets/7ba8d456-1d98-4057-a728-767ed5232f7e)
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
