<?php namespace Javacream\Training\Util\IdGenerator;
    class IdGenerator {
        public $counter = 0;
        function nextId(){
            return $this->counter++;
        }
    }
?>

?>