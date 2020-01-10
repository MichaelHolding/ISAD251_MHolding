<?php
class orders
{
    private $orderNo;
    private $userNo;
    private $tableNo;

    public function __construct($orderNo, $userNo, $tableNo)
{
    $this->orderNo = $orderNo;
    $this->userNo = $userNo;
    $this->tableNo = $tableNo;
}
    public function getOrderNo()
{
    return $this->orderNo;
}
    public function setOrderNo($orderNo)
{
    $this->orderNo = $orderNo;
}
    public function getUserNo()
{
    return $this->userNo;
}
    public function setUserNo($userNo)
{
    $this->userNo = $userNo;
}
    public function getTableNo()
{
    return $this->tableNo;
}
    public function setTableNo($tableNo)
{
    $this->tableNo = $tableNo;
}
}