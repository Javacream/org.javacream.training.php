<?php namespace Javacream\Training\Books\Order\Api;
    class Order{
        public $orderId;
        public $isbn;
        public $number;
        public $totalPrice;
        public $status;

        function __construct($orderId, $isbn, $number, $totalPrice, $status)
        {
            $this->orderId = $orderId;
            $this->isbn = $isbn;
            $this->number = $number;
            $this->totalPrice = $totalPrice;
            $this->status= $status;

        }
        public function __toString()
        {
            return "Order: orderId=$this->orderId, isbn=$this->isbn, number=$this->number, totalPrice=$this->totalPrice, status=$this->status".PHP_EOL;
        }
    
    }

    class OrderStatus{
        const OK = "OK";
        const PENDING = "Pending";
        const UNAVAILABLE = "UNAVAILABLE";
    }

    interface OrderService{
        function order($isbn, $number);
    }
?>

<?php namespace Javacream\Training\Books\Order\Impl;

use Exception;
use Javacream\Training\Books\Order\Api\Order;
    use Javacream\Training\Books\Order\Api\OrderService;
    use Javacream\Training\Books\Order\Api\OrderStatus;

    class OrderServiceImpl implements OrderService{
        public $booksService;
        public $idGenerator;
        public $storeService;
        function order($isbn, $number){
            $orderId = $this->idGenerator->nextId();
            $totalPrice = 0;
            try{
                $book = $this->booksService->findByIsbn($isbn);
                $totalPrice = $book->price * $number; 
                if ($this->storeService->getStock("books", $isbn) >= $number){
                    $status= OrderStatus::OK;
                }else{
                    $status = OrderStatus::PENDING;
                }
            }
            catch(Exception $exception){
                $status = OrderStatus::UNAVAILABLE;
            }
            return new Order($orderId, $isbn, $number, $totalPrice, $status); 
        
        }

    }


?>