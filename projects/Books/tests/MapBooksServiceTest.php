<?php namespace Javacream\Training\Books\Warehouse\Test;

use Exception;
use PHPUnit\Framework\TestCase;
use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
use Javacream\Training\Books\Warehouse\Api\BookException;
use Javacream\Training\Books\Warehouse\Impl\MapBooksService;
use Javacream\Training\Store\Impl\SimpleStoreService;
use Javacream\Training\Util\IdGenerator\IdGenerator;

final class MapBooksServiceTest extends TestCase
{
    private $booksService;

    function setUp(): void
    {
        $isbnGenerator = new CounterIsbnGenerator();
        $isbnGenerator->prefix = "Isbn:";
        $isbnGenerator->countryCode = "-dk";
        $isbnGenerator->idGenerator = new IdGenerator();
        $storeService = new SimpleStoreService();
        $storeService->defaultStock = 42;
        $this->booksService = new MapBooksService($isbnGenerator, $storeService);
        
    }
    function testBooksServiceWorks()
    {
            $books = $this->booksService->findAll();
            $startSize = sizeOf($books);
            $title = "Spring";
            $isbn = $this->booksService->create($title);
            $books = $this->booksService->findAll();
            print($books[0]->available);
            $endSize = sizeOf($books);
            $this->assertTrue($endSize == $startSize + 1);
            $this->assertNotNull($isbn);
            $this->assertNotNull($this->booksService->findByIsbn($isbn));
            $this->booksService->deleteByIsbn($isbn);
            $this->assertTrue($startSize == sizeOf($this->booksService->findAll()));
            $this->expectException(BookException::class);
            $this->booksService->findByIsbn("UNKNOWN");
    }

}

?>