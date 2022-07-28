<?php namespace Javacream\Training\Books\Warehouse\Api;
;
class Book
{
    public $isbn;
    public $title;
    public $pages;
    public $price;
    public $available;

    function __construct($isbn, $title, $pages, $price, $available)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->price = $price;
        $this->pages = $pages;
        $this->available = $available;

    }

    public function __toString()
    {
        return "Book: isbn=$this->isbn, title=$this->title, price=$this->price, pages=$this->pages, available=$this->available".PHP_EOL;
    }
}


interface BooksService{
    function create($title);
    function findAll();
    function findByIsbn($isbn);
    function deleteByIsbn($isbn);
    function update($book);

}

class BookException extends \Exception
{
    
}
?>

<?php namespace Javacream\Training\Books\Warehouse\Impl;

use Javacream\Training\Books\Warehouse\Api\BooksService;
use Javacream\Training\Books\Warehouse\Api\Book;
use Javacream\Training\Books\Warehouse\Api\BookException;

class MapBooksService implements BooksService
{
    public $books = array();
    public $isbnGenerator;
    public $storeService;
    function __construct($isbnGenerator, $storeService)
    {
        $this->isbnGenerator = $isbnGenerator;
        $this->storeService = $storeService;
    }   

    function create($title)
    {
        $isbn = $this->isbnGenerator->next();
        $book = new Book($isbn, $title, 100, 19.99, false);
        $this->books[$isbn] = $book;
        return $isbn;
    }
    function findAll()
    {
        return array_map(function($b)
        {
            return $this->setAvailability($b);
        }, array_values($this->books));
    }
    function findByIsbn($isbn)
    {
        if (isset($this->books[$isbn]))
        {
            $book = $this->books[$isbn];
            $this->setAvailability($book);
            return $book;      
    
        }else
        {
            throw new BookException("not found: ".$isbn);
        }
    }
    function deleteByIsbn($isbn)
    {
        unset($this->books[$isbn]);
    }
    function update($book)
    {
        $this->books[$book->isbn] = $book;

    }
    private function setAvailability($book)
    {
        $book->available = ($this->storeService->getStock("books", $book->isbn) > 0);
        return $book;
    }  
}
?>