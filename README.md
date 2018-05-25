# VERSION

- Laravel `5.6`

# TODO:

## Architecture Concepts

- [x] Service Providers
  + https://laravel.com/docs/5.6/providers

## The Basics

- [x] Routing
  + https://laravel.com/docs/5.6/routing
- [ ] Middleware
  + https://laravel.com/docs/5.6/middleware
- [x] Responses (Response Macros)
  + https://laravel.com/docs/5.6/responses
- [ ] URL Generation
  + https://laravel.com/docs/5.6/urls
- [ ] Session
  + https://laravel.com/docs/5.6/session
- [x] Validation Layer
  + https://laravel.com/docs/5.6/validation
- [x] Error Handling (Global Exception)
  + https://laravel.com/docs/5.6/errors
- [x] Logging
  + https://laravel.com/docs/5.6/logging

## Security

- [ ] Encryption
  + https://laravel.com/docs/5.6/encryption
- [x] Hashing
  + https://laravel.com/docs/5.6/hashing
- [ ] Resetting password (Forgot password)
  + https://laravel.com/docs/5.6/passwords

## Digging Deeper

- [ ] Artisan Console
  + https://laravel.com/docs/5.6/artisan
- [ ] Broadcasting
  + https://laravel.com/docs/5.6/broadcasting
- [ ] Cache
  + https://laravel.com/docs/5.6/cache
- [ ] Events
  + https://laravel.com/docs/5.6/events
- [ ] File Storage (Upload file, Get file, Delete file, Overwrite file, ...)
  + https://laravel.com/docs/5.6/filesystem
- [x] Mail (mailtrap.io)
  + https://laravel.com/docs/5.6/mail
- [ ] Notifications
  + https://laravel.com/docs/5.6/notifications
- [x] Package Discovery
  + https://laravel.com/docs/5.6/packages#package-discovery
- [ ] Queues
  + https://laravel.com/docs/5.6/queues
- [ ] Task Scheduling
  + https://laravel.com/docs/5.6/scheduling

## Database

- [x] Pagination
  + https://laravel.com/docs/5.6/pagination
- [x] Migration
  + https://laravel.com/docs/5.6/migrations
- [x] Seeding (Model Factory with Faker)
  + https://laravel.com/docs/5.6/seeding

## Eloquent ORM

- [ ] Soft Deleting
  + https://laravel.com/docs/5.6/eloquent#soft-deleting
- [ ] Relationships
  + https://laravel.com/docs/5.6/eloquent-relationships
- [x] Mutators
  + https://laravel.com/docs/5.6/eloquent-mutators
- [x] API Resources (Transformation layer, Model -> JSON)
  + https://laravel.com/docs/5.6/eloquent-resources

## Official Packages

- [x] Laravel Socialite
  + https://laravel.com/docs/5.6/socialite

## Others

- [x] REST
- [x] Service Layer (BaseService)
- [x] Repository Layer
- [x] Helper Layer (Utils)
- [x] SQLite
- [ ] Enviroment: dev, prod
- [x] Transaction
- [ ] Create Base
  + [x] BaseRepository
  + [x] BaseService
  + [x] BaseValidation
  + [ ] BaseController
- [x] Custom response data {success, data, code, message, ...}
- [x] Get property from `env` (`env('key')`)
- [ ] HATEOAS
- [ ] OAuth2
- [x] JWT (tymon/jwt-auth)
- [ ] Swagger
- [ ] Cookie
- [ ] Multi languages
- [ ] Multi databases
- [x] PHP Formatter for VSCode (php cs fixer)
- [x] PHP Debug
- [x] PHP IntelliSense (PHP Intelephense)
- [x] Alias class
- [x] Model guarded
- [x] Package (barryvdh/laravel-ide-helper, doctrine/dbal)
- [ ] CORS (barryvdh/laravel-cors)
- [ ] Import/Export Excel/CSV (maatwebsite/excel)
- [ ] Migration (Alter table)

# RUN LOCALLY

- Install package: `composer install`
- Create env: `php -r "file_exists('.env') || copy('.env.example', '.env');"`
- Generate key: `php artisan key:generate`
- Run Dev: `php artisan serve`
- Run Prod: ``

# TIPS & TRICKS

- Local serve: `php -S localhost:8080 -t public/`
- Reload modules: `php --ini`
- View modules: `php -m` or `php -m | grep -i mongo`
```php
<?php
// Show all information, defaults to INFO_ALL
phpinfo();
```
- `composer dump-autoload`
- List route: `php artisan route:list`
- Create model & migration: `php artisan make:model Product -m`
- Create seeder: `php artisan make:seeder UsersTableSeeder`
- Create API controller: `php artisan make:controller Api/AdminController --api`
- Drop all table & migration & seeding: `php artisan migrate:refresh --seed`
- Seed 1 class: `php artisan db:seed --class=UsersTableSeeder`
- Create API resource: `php artisan make:resource Users --collection` or `php artisan make:resource UserCollection`
- Create form request: `php artisan make:request StoreBlogPost`
- Create rule: `php artisan make:rule Uppercase`
- PHP Shell: `php artisan tinker`
- Artisan console list: `php artisan list`
  + `make:channel`
  + `make:command`
  + `make:event`
  + `make:exception`
  + `make:factory`
  + `make:job`
  + `make:listener`
  + `make:mail`
  + `make:middleware`
  + `make:notification`
  + `make:policy`
  + `make:provider`
- Artisan console help: `php artisan help`
- JWT issues: https://appdividend.com/2018/02/24/laravel-jwt-authentication-tutorial/
- PHP check string is not null or empty: `!empty(trim($val))`

```php
// Getter & setter
<?php
class MyClass {
  private $firstField;
  private $secondField;

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
}
```

```php
// Static method in class
class Test {

    protected static function myProtected($test) {
        var_dump(__METHOD__, $test);
    }

    public static function __callStatic($method, $args) {
        switch($method) {
            case 'foo' :
                echo 'You have called foo()';
                var_dump($args);
                break;

            case 'helloWorld':
                echo 'Hello ' . $args[0];
                break;

            case 'myProtected':
                return call_user_func_array(
                    array(get_called_class(), 'myProtected'),
                    $args
                );
                break;
        }
    }
}
```

```json
/* Response format */
{
  "success": false,
  "payload": {
    /* Application-specific data would go here. */
  },
  "error": {
    "code": 123,
    "message": "An error occurred!"
  }
}
```

```php
<?php
$d = [];
$d[] = 'email';
$d[] = 'aaa';
print_r($d); // [0 => 'email', 1 => 'aaa']
```

# ACCESS LINK

- Swagger:
  + http://localhost:8000/docs
  + http://localhost:8000/swagger-ui.html

- Test mail:
  + http://localhost:8000/test-mailtrap

- Laravel Socialite:
  + http://localhost:8000/login/{provider}
