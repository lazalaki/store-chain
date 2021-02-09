<?php


include_once "shop_functions_interface.php";

abstract class Shop implements IShopFunctions
{
    protected $type;
    protected $name;
    protected $products = [];
    protected $billNumber = 0;
    abstract function isAvailableInShop($product);


    public function addProduct($product)
    {
        echo "You need to override this";
    }

    public function sellProduct($product, $quantity, $bill, $customerData)
    {
        echo "You need to override this";
    }

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function __toString()
    {
        return "$this->name: $this->type";
    }
}
