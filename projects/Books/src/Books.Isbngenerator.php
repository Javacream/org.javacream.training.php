<?php namespace Javacream\Training\Books\Isbngenerator\Api;
    interface IsbnGenerator
    {
        function next();
    }
?>

<?php namespace Javacream\Training\Books\Isbngenerator\Impl;
    use Javacream\Training\Books\Isbngenerator\Api\IsbnGenerator;
    use Javacream\Training\Util\IdGenerator;

    class RandomIsbnGenerator implements IsbnGenerator{
        public $prefix;
        public $countryCode;
        function next(){
            return $this->prefix.rand().$this->countryCode;
        }
    }
    class CounterIsbnGenerator implements IsbnGenerator{
        public $prefix;
        public $countryCode;
        public $idGenerator;
        function next(){
            return $this->prefix.$this->idGenerator->nextId().$this->countryCode;
        }
    }

?>