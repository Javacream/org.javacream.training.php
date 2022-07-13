<?php

include (dirname(__FILE__).'/Books.Isbngenerator.php');  
include (dirname(__FILE__).'/Books.Warehouse.php');  
include (dirname(__FILE__).'/Store.php');  
use Javacream\Training\Books\Warehouse\Impl\MapBooksService;
use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
use Javacream\Training\Store\Impl\SimpleStoreService;


function applicationContext()
{
    $isbnGenerator = new CounterIsbnGenerator();
    $isbnGenerator->prefix = "Isbn:";
    $isbnGenerator->countryCode = "-dk";
    $storeService = new SimpleStoreService();
    $storeService->defaultStock = 42;
    $booksService = new MapBooksService($isbnGenerator, $storeService);
    return $booksService;
}

$booksService = applicationContext();
$books = $booksService->findAll();
$startSize = sizeOf($books);
$title = "Spring";
$isbn = $booksService->create($title);
$books = $booksService->findAll();
array_map (function($b){print($b);}, $books);
?>