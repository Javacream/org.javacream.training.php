<?php namespace Javacream\Training\Store\Api;
    interface StoreService
    {
        function getStock(string $category, string $item) : int;
    }
?>

<?php namespace Javacream\Training\Store\Impl;
    use Javacream\Training\Store\Api\StoreService;
    use mysqli;


    class SimpleStoreService implements StoreService{
        public int $defaultStock;
        function getStock(string $category, string $item) : int{
            return $this->defaultStock;
        }
    }


    class DatabaseStoreService implements StoreService{
        private $servername = "h2908727.stratoserver.net:3406";
        private $username = "user";
        private $password = "user";
        private $db = "javacream";

        function getStock(string $category, string $item) : int{
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
            if ($conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conn -> connect_error;
                exit();
            }
            $stmt = $conn->prepare("SELECT stock from STORE where category = ? and item = ?");
            $stmt->bind_param("ss", $category, $item);
            $stmt->execute();
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            if ($row) {
                return $row['stock'];
            }else{
                return 0;
            }

            mysqli_free_result($res);
            mysqli_close($conn);

        }

    }
?>