<?php

class BillItem
{
    protected $name;
    protected $type;
    protected $price;
    protected $quantity;

    public function __construct($name, $type, $price, $quantity)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
