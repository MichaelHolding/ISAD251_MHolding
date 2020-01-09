<?php
class item
{
    private $id;
    private $item_Name;
    private $item_Desc;
    private $item_Type;
    private $price;
    private $stock;
    private $out_of_stock;
    public function __construct($id, $item_Name, $item_Desc, $item_Type, $price, $stock, $out_of_stock)
    {
        $this->id = $id;
        $this->item_Name = $item_Name;
        $this->item_Desc = $item_Desc;
        $this->item_Type = $item_Type;
        $this->price = $price;
        $this->stock = $stock;
        $this->out_of_stock = $out_of_stock;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getItemName()
    {
        return $this->item_Name;
    }
    public function getItemDesc()
    {
        return  $this->item_Desc;
    }
    public function getItemType()
    {
        return $this->item_Type;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getStockStatus()
    {
        return $this->out_of_stock;
    }
}
