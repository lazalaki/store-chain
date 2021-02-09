<?php

include_once "shop.php";

class Supermarket extends Shop
{
    public function __construct($name, $type)
    {
        parent::__construct($name, $type);
    }

    public function addProduct($product)
    {
        if (!$this->isAvailableInShop($product)) {
            echo "Can not add medicine or cigarettes";
            return;
        }
        array_push($this->products, $product);
    }

    public function sellProduct($product, $quantity, $bill, $customerData)
    {
        if (!$bill) {
            $bill = new Bill($customerData, $this->billNumber);
        }

        $hasProductInStock = false;
        foreach ($this->products as $shopProduct) {
            if ($shopProduct->getName() === $product->getName() && $shopProduct->getQuantity() >= $quantity) {

                $hasProductInStock = true;
            }
        }

        if (!$hasProductInStock) {
            throw new Exception("Not enoguh product in store");
        }

        $bill->addProductsToBill($product, $quantity);


        return $bill;
    }
    public function isAvailableInShop($product)
    {
        return $product->getType() !== 'Medicine' || $product->getType() !== 'Cigarettes';
    }
}
