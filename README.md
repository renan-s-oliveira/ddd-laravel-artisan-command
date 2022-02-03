Install 
```
composer require renan-s-oliveira/ddd-artisan
```

Config
```
php artisan vendor:publish --provider="DDDArtisan\DDDArtisanProvider\DDDArtisanProvider" --force

return [
    'base_path' => 'DDD', // Rename 
];

```


How to create DDD folder structure
```
php artisan make:domain
```

Change composer.json

```
{
        "Application\\": "name_structure/Application",
        "Domain\\": "name_structure/Domain",
        "Support\\": "name_structure/Support",
    }

```


More Commands
```
php artisan make:domain

php artisan make:application

php artisan make:support
```
