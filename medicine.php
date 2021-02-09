<?php

include_once "product.php";

class Medicine extends Product
{

    public function __construct($type, $name, $price, $quantities)
    {
        parent::__construct($type, $name, $price, $quantities);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQuantity()
    {
        return $this->quantities;
    }
}
