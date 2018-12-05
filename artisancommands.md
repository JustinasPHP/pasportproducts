### Composer commands
- `composer install` 
  - instaliuoja pirmiausia iš  **composer.lock** faillo, jei neranda tokio
failo, tada instaliuoja iš **package.json** failo.
- `composer update`
  -  instaliuoja iš **composer.json** failo ir jei yra nurodyta, ieško naujausios paketo versijos.

- `composer create-project --prefer-dist laravel/laravel blog`
  - sukuria Laravel projektą

- `composer dump-autoload`

### Laravel artisan commands
- `php artisan config:cache`
  - _surenka visus config cache failus į vieną_
- `php artisan config:clear`

- `php artisan `
- `php artisan serve`
#####artisan make
- `php artisan make:model Person -mc`
  - sukuria 3 failus: model, controller ir migration
- `php artisan make:model Person -m`
  - sukuria model bei migration
- `php artisan make:controller PersonController --recource --model=Person`
  - sukuria CRUD controller ir pritaiko modeliui Person
  - `php artisan make:controller API/Controller --api`
  - `php artisan make:model Role -m

````
start cmd.exe /k "echo laravel cron started & php artisan schedule:run > NUL 2>&1"
start chrome
`````


