<?php

require 'bootstrap.php';
$booksService = $Context->booksService;
$books = $booksService->findAll();
$startSize = sizeOf($books);
$title = "Spring";
$isbn = $booksService->create($title);
$books = $booksService->findAll();
array_map (function($b){print($b);}, $books);
?>