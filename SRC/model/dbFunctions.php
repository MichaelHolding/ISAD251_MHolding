<?php

const DB_SERVER = 'Proj-mysql.uopnet.plymouth.ac.uk';
const DB_USER = 'ISAD251_Mholding';
const DB_PASSWORD = 'ISAD251_22213022';
const DB_DATABASE = 'ISAD251_MHolding';
?>
function getConnection()
{
    $dataSourceName = 'mysql:dbname='.DB_DATABASE.';host='.DB_SERVER;
    $dbConnection = null;
    try
    {
        $dbConnection = new PDO($dataSourceName, DB_USER, DB_PASSWORD);

    }  catch (PDOException $err)
    {
        echo 'Connection failed: ', $err->getMessage();
    }
    return $dbConnection;
}

function getAll($tablename)
{
    $statement = getConnection()->prepare("SELECT * FROM ".$tablename);
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $resultSet;
}