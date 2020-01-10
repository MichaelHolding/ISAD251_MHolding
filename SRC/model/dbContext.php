<?php
include_once 'item.php';
include_once  'users.php';
include_once 'order_details.php';
include_once  'orders.php';
class dbContext
{
    private  $db_server = 'Proj-mysql.uopnet.plymouth.ac.uk';
    private  $dbUser = 'ISAD251_MHolding';
    private $dbPassword = 'ISAD251_22213022';
    private $dbDatabase = 'ISAD251_MHolding';
    private  $dataSourceName;
    private $connection;
    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try {
            if ($this->connection === null) {
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }
    }
    public function items()
    {
        $sql = "SELECT * FROM `item`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        $items = [];
        if($resultSet)
        {
            foreach($resultSet as $row)
            {
                $item =  new item($row['Item_No'], $row['Item_Name'], $row['Item_Desc'], $row['Item_Type'], $row['Price'], $row['Stock'],$row['Out_Of_Stock']);
                $items[] = $item;
            }
        }
        return $items;
    }
    public function enterUserRequest($user)
    {
        $sql = "CALL AddUser(:User_No, :Name, :Email)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':User_No', $user->getUser_No(), PDO::PARAM_INT);
        $statement->bindParam(':Name', $user->getName(), PDO::PARAM_STR);
        $statement->bindParam(':Email', $user->getEmail(), PDO::PARAM_STR);
        $user = $statement->execute();
        return $user;
    }
    public function enterOrderRequest($orders)
    {
        $sql = "CALL AddOrder(:Order_No, :User_No, :Table_No)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Order_No', $orders->getOrderNo(), PDO::PARAM_INT);
        $statement->bindParam(':User_No', $orders->getUserNo(), PDO::PARAM_INT);
        $statement->bindParam(':Table_No', $orders->getTableNo(), PDO::PARAM_INT);

        $orders = $statement->execute();
        return $orders;

    }

    public function getNextUserNo()
    {
        $sql="SELECT MAX(User_No) FROM `user` ORDER BY User_No DESC ";
        $order = $this->connection->prepare($sql);
        $order->execute();
        $resultSet = $order->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSet as $row){
            $result = $row['MAX(User_No)'];
        }
        return ($result +1);
    }

    public function getNextOrderNo()
    {
        $sql="SELECT MAX(Order_No) FROM orders ORDER BY Order_No DESC ";
        $order = $this->connection->prepare($sql);
        $order->execute();
        $resultSet = $order->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSet as $row){
            $result = $row['MAX(Order_No)'];
        }
        return ($result +1);
    }
    public function enterOrder_Details($orderDetails)
    {
        $sql = "CALL AddOrderContents (:Order_No, :Item_No,:Quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Order_No', $orderDetails->getOrderNo(), PDO::PARAM_INT);
        $statement->bindParam(':Item_No', $orderDetails->getItemNo(), PDO::PARAM_INT);
        $statement->bindParam(':Quantity', $orderDetails->getQuantity(), PDO::PARAM_INT);
        $orderDetails = $statement->execute();
        return $orderDetails;
    }
    }