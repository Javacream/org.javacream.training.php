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
        $isbn = $this->isbnGenerator->next();
        $this->assertTrue(substr($isbn, 0, 5) === 'Isbn:');
        $len = strlen($isbn);
        $this->assertTrue(substr($isbn, $len-3, $len) === '-dk');
    }

}

?>