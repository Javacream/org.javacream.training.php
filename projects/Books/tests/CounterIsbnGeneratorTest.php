<?php namespace Javacream\Training\Books\Isbngenerator\Test;

use PHPUnit\Framework\TestCase;
use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
final class CounterIsbnGeneratorTest extends TestCase
{
    private $isbnGenerator;

    function setUp(): void
    {
        $this->isbnGenerator = new CounterIsbnGenerator();
        $this->isbnGenerator->prefix = "Isbn:";
        $this->isbnGenerator->countryCode = "-dk";
        
    }
    function testIsbnGeneratorCreatesIsbn()
    {
        $this->assertEquals("Isbn:0-dk", $this->isbnGenerator->next());
    }

}

?>