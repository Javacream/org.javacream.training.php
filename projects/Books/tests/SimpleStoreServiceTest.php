<?php namespace Javacream\Training\Store\Test;

use PHPUnit\Framework\TestCase;
use Javacream\Training\Store\Impl\SimpleStoreService;
final class SimpleStoreServiceTest extends TestCase
{
    private $storeService;

    function setUp(): void
    {
        $this->storeService = new SimpleStoreService();
        $this->storeService->defaultStock = 42;
        
    }
    function testStoreServiceGetStockIs42()
    {
        $this->assertEquals(42, $this->storeService->getStock("this", "that"));
        $this->assertEquals("integer", gettype($this->storeService->getStock("this", "that")));
    }

}

?>