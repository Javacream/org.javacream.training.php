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

    }

    enum OrderStatus{
        case OK;
        case PENDING;
        case UNAVAILABLE;
    }

    interface OrderService{
        function order($isbn, $number);
    }
?>

<?php namespace Javacream\Training\Books\Order\Impl;
    use Javacream\Training\Books\Order\Api;
use Javacream\Training\Books\Order\Api\Order;
use Javacream\Training\Books\Order\Api\OrderService;
use Javacream\Training\Books\Order\Api\OrderStatus;
use Javacream\Training\Util\IdGenerator\IdGenerator;

    class OrderServiceImpl implements OrderService{
        public $booksService;
        public $idGenerator;
        public $storeService;
        function order($isbn, $number){
            return new Order($this->idGenerator.nextId(), $isbn, $number, 0, OrderStatus::OK); 
        }

    }


?>