# Installing Log activity to monitor the user logs

For getting started, first you need to install the Laravel Geoip library. To install the library, you should have Composer available on your system. Open the terminal in your project root directory and run the command:

```php
composer require torann/geoip
```

Once installed you need to register the service provider with the application. Open up config/app.php and add below statement under the providers key.

```php
'providers' => [
    ......
    \Torann\GeoIP\GeoIPServiceProvider::class,
]
```

Next, add the below code in aliases key.

```php
'aliases' => [
    ....
    'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class,
];
```

After adding the above lines in the config/app.php, we need to publish the configuration. We do so by the command:

```php
php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config
```

Now go to config/geoip.php and replace the default cache settings to

```php
'cache' => 'none',
```
```php
'cache_tags' => null,
```
Then clear the config cache

```php
php artisan config:cache
```
# For AJAX datatables 

Now we have to install yajra datatable package in our laravel app. So run below command to install it.

```php
composer require yajra/laravel-datatables-oracle
```

After that you need to add providers and alias in the following path.

```php
'providers' => [
	Yajra\DataTables\DataTablesServiceProvider::class,
]
'aliases' => [
	'DataTables' => Yajra\DataTables\Facades\DataTables::class,
]
```

## Log-Activity Installation

After that add the files from the Log-Activity directory to your current project.

Once added all the files in your project update your config/app.php

```php
'aliases' => [
    ....
'LogActivity' => App\Helpers\LogActivity::class,
];
```

Now we are ready to run our your project:

```php
php artisan serve
```
