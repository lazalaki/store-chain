<?php


abstract class Product
{
    protected $type;
    protected $name;
    protected $price;
    protected $quantities;

    public function __construct($type, $name, $price, $quantities)
    {
        $this->type = $type;
        $this->name = $name;
        $this->price = $price;
        $this->quantities = $quantities;
    }
}
