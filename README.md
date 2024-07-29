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

# Env Google
```
GOOGLE_CLIENT_ID=1088120285078-51dfnhboccc3ch66q0aj7meaogd3c3m3.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
GOOGLE_CALLBACK=http://127.0.0.1:8000/auth/google/callback
```
