<?php

interface IShopFunctions
{
    public function addProduct($product);
    public function sellProduct($product, $quantity, $bill, $customerData);
}
