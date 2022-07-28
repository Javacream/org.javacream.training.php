<?php

require 'vendor/autoload.php';

use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
use Javacream\Training\Books\Order\Impl\OrderServiceImpl;
use Javacream\Training\Books\Warehouse\Impl\MapBooksService;
use Javacream\Training\Store\Impl\SimpleStoreService;
use Javacream\Training\Util\IdGenerator\IdGenerator;

function applicationContext()
{
    $idGenerator = new IdGenerator();
    $isbnGenerator = new CounterIsbnGenerator();
    $isbnGenerator->prefix = "Isbn:";
    $isbnGenerator->countryCode = "-dk";
    $isbnGenerator->idGenerator = $idGenerator;
    $storeService = new SimpleStoreService();
    $storeService->defaultStock = 42;
    $booksService = new MapBooksService($isbnGenerator, $storeService);
    $orderService = new OrderServiceImpl();
    $orderService->booksService = $booksService;
    $orderService->idGenerator = $idGenerator;
    $orderService->storeService = $storeService;
    $context = (object)[
        "booksService" => $booksService,
        "storeService" => $storeService,
        "orderService" => $orderService,
        "isbnGenerator" => $isbnGenerator
    ];
    $GLOBALS['Context'] = $context;

}

applicationContext();
?>