<?php namespace Javacream\Training\Books\Isbngenerator\Test;

use PHPUnit\Framework\TestCase;
use Javacream\Training\Books\Isbngenerator\Impl\CounterIsbnGenerator;
use Javacream\Training\Util\IdGenerator\IdGenerator;

final class CounterIsbnGeneratorUnitTest extends TestCase
{
    private $isbnGenerator;

    function setUp(): void
    {
        $this->isbnGenerator = new CounterIsbnGenerator();
        $idGeneratorMock = $this->createMock(IdGenerator::class);
        $idGeneratorMock->method("nextId")->willReturn(42);
        $this->isbnGenerator->idGenerator = $idGeneratorMock;

        $this->isbnGenerator->prefix = "Isbn:";
        $this->isbnGenerator->countryCode = "-dk";
        
    }
    function testIsbnGeneratorCreatesIsbn()
    {
        $this->assertEquals("Isbn:42-dk", $this->isbnGenerator->next());
    }

}

?>