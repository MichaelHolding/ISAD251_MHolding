<?php
include_once 'product.php';
class dbContext
{
    private  $db_server = 'Proj-mysql.uopnet.plymouth.ac.uk';
    private  $db_User = 'ISAD251_MHolding';
    private $db_Password = 'ISAD_22213022';
    private $db_Database = 'ISAD251_MHolding';
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
                $item =  new item($row['Item_No'], $row['Item_Name'], $row['Item_Desc'], $row['Item_Type'], $row['price'], $row['stock'],$row['Out_Of_Stock']);
                $items= $item;
            }
        }
        return $items;
    }
}