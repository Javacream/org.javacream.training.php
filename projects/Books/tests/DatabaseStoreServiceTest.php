<?php namespace Javacream\Training\Store\Test;

use Javacream\Training\Store\Impl\DatabaseStoreService;
use PHPUnit\Framework\TestCase;
final class DatabaseStoreServiceTest extends TestCase
{
    private $storeService;

    function setUp(): void
    {
        $this->storeService = new DatabaseStoreService();
        
    }
    function testStoreServiceGetStockIs42()
    {
        $this->assertEquals(42, $this->storeService->getStock("books", "TEST-ISBN"));
        $this->assertEquals("integer", gettype($this->storeService->getStock("this", "that")));
    }

}

?>