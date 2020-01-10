<?php
class orderDetails
{

    private $orderNo;
    private $itemNo;
    private $quantity;
    public function __construct($itemNo,$orderNo, $quantity)
    {

        $this->orderNo = $orderNo;
        $this->itemNo = $itemNo;
        $this->quantity =$quantity;
    }

    public function getOrderNo()
    {
        return $this->orderNo;
    }
    public function setOrderNo($orderNo)
    {
        $this->orderNo = $orderNo;
    }
    public function getItemNo()
    {
        return $this->itemNo;
    }
    public function setItemNo($itemNo)
    {
        $this->itemNo = $itemNo;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


}