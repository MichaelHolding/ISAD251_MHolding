<?php
class currentOrder{

    private $itemNo1;
    private $item_Name;
    private $price;
    private $quantity;
    public function __construct($itemNo1,$item_Name,$price,$quantity)
    {
        $this->itemNo1=$itemNo1;
        $this->item_Name=$item_Name;
        $this->price = $price;
        $this->quantity = $quantity;
    }


    public function getItemNo1()
    {
        return $this->itemNo1;
    }


    public function getItemName()
    {
        return $this->item_Name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
