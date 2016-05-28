<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    //'default' => env('DB_CONNECTION', 'mongodb'),
    'default' => env('DB_CONNECTION', 'mysql2'),
    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', 'localhost'),
                'database' => env('DB_DATABASE', 'auth'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
                'collation' => 'utf8_unicode_ci',
                'charset' => 'utf8',
                'prefix' => '',
        ],

                'mysql2' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', 'sandbox.badr.co.id'),
                'database' => env('DB_DATABASE', 'ppl1_auth'),
                'username' => env('DB_USERNAME', 'ppl1'),
                'password' => env('DB_PASSWORD', 'password123'),
                'collation' => 'utf8_unicode_ci',
                'charset' => 'utf8',
                'prefix' => '',
        ],


			/*
		'mongodb' => [
			'driver'   => 'mongodb',
			'host'     => env('DB_HOST', 'localhost'),
			'port'     => env('DB_PORT', 27017),
			'database' => env('DB_DATABASE','InspireCrawler'),
			'username' => env('DB_USERNAME'),
			'password' => env('DB_PASSWORD'),
			'options' => [
				'db' => 'admin' // sets the authentication database required by mongo 3
			]
		],
		*/

		'mongodb' => [
			'driver'   => 'mongodb',
			'host'     => env('DB_HOST', 'ds023520.mlab.com'),
			'port'     => env('DB_PORT', 23520),
			'database' => env('DB_DATABASE','inspirecrawlerdb'),
			'username' => env('DB_USERNAME','admin'),
			'password' => env('DB_PASSWORD','admin'),
			'options' => [
				'db' => 'admin' // sets the authentication database required by mongo 3
			]
		],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
