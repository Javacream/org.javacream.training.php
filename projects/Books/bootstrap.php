<?php

require 'vendor/autoload.php';

use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
use Javacream\Training\Books\Warehouse\Impl\MapBooksService;
use Javacream\Training\Store\Impl\SimpleStoreService;


function applicationContext()
{
    $isbnGenerator = new CounterIsbnGenerator();
    $isbnGenerator->prefix = "Isbn:";
    $isbnGenerator->countryCode = "-dk";
    $storeService = new SimpleStoreService();
    $storeService->defaultStock = 42;
    $booksService = new MapBooksService($isbnGenerator, $storeService);
    $context = (object)[
        "booksService" => $booksService,
        "storeService" => $storeService,
        "isbnGenerator" => $isbnGenerator
    ];
    $GLOBALS['Context'] = $context;

}

applicationContext();
?>