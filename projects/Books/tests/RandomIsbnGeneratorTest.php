<?php namespace Javacream\Training\Books\Isbngenerator\Test;

use PHPUnit\Framework\TestCase;
use Javacream\Training\Books\Isbngenerator\Impl\RandomIsbnGenerator;

final class RandomIsbnGeneratorTest extends TestCase
{
    private $isbnGenerator;

    function setUp(): void
    {
        $this->isbnGenerator = new RandomIsbnGenerator();
        $this->isbnGenerator->prefix = "Isbn:";
        $this->isbnGenerator->countryCode = "-dk";
        
    }
    function testIsbnGeneratorCreatesIsbn()
    {
        $this->assertTrue(str_starts_with($this->isbnGenerator->next(), 'Isbn:'));
        $this->assertTrue(str_ends_with($this->isbnGenerator->next(), '-dk'));
    }

}

?>