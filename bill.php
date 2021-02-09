<?php

include_once "bill_item.php";
include_once "constants.php";

class Bill
{
    protected $numberOfBill;
    protected $dateOfCreation;
    protected $customerData;
    protected $billItems;
    protected $totalPrice;
    protected $serialNumber;

    public function __construct($customerData, $numberOfBill)
    {
        $this->customerData = $customerData;
        $this->billItems = [];
        $this->numberOfBill = $numberOfBill;
        $this->dateOfCreation = date("d/m/Y");
        $this->totalPrice = 0;
        $this->serialNumber = null;
    }

    public function addProductsToBill($product, $quantity)
    {
        $price = $product->getPrice() * $quantity;
        $billItem = new BillItem($product->getName(), $product->getType(), $price, $quantity);
        array_push($this->billItems, $billItem);
        $this->totalPrice = $this->totalPrice + $price;

        if ($product->getType() === MEDICINE || $product->getType() === PARKING_TICKETS) {
            $this->serialNumber = "serialNo" . rand();
        }
    }

    public function __toString()
    {
        return "$this->numberOfBill--- $this->dateOfCreation--- $this->customerDate--- $this->billItems--- $this->totalPrice--- $this->serialNumber";
    }
}
