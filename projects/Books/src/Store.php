<?php namespace Javacream\Training\Store\Api;
    interface StoreService
    {
        function getStock($category, $item);
    }
?>

<?php namespace Javacream\Training\Store\Impl;
    use Javacream\Training\Store\Api\StoreService;

    class SimpleStoreService implements StoreService{
        public $defaultStock;
        function getStock($category, $item){
            return $this->defaultStock;
        }
    }
?>