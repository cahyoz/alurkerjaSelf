# User Roles

-   Client > Normal
-   Admin > Admin

# Setup

```
composer update
```

```
php artisan migrate:fresh
or
php artisan migrate:refresh
```

```
php artisan key:generate
```

```
composer require laravel/ui
```

# Env 

```
cp .env.example .env
```

```
# Env Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

