<?php namespace Javacream\Training\Store\Api;
    interface StoreService
    {
        function getStock(string $category, string $item) : int;
    }
?>

<?php namespace Javacream\Training\Store\Impl;
    use Javacream\Training\Store\Api\StoreService;

    class SimpleStoreService implements StoreService{
        public int $defaultStock;
        function getStock(string $category, string $item) : int{
            return $this->defaultStock;
        }
    }
?>