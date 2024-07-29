# User Roles

-   Client > Normal
-   Admin > Admin

# Setup

```bash
composer update
```

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

```bash
composer require laravel/ui
```

```bash
php artisan key:generate
```

# Env 

```bash
cp .env.example .env
```

```
# Env Database

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

