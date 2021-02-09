<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
$file = fopen('log.log', 'a+');
ftruncate($file, 0);
fclose($file);


include_once "logger.php";
include_once "store_chain.php";
include_once "pharmacy.php";
include_once "corner_shop.php";
include_once "supermarket.php";
include_once "medicine.php";
include_once "drink.php";
include_once "food.php";
include_once "cigarettes.php";
include_once "toys.php";
include_once "constants.php";
include_once "customer_data.php";




$medicine = new Medicine(MEDICINE, "Brufen", 300, 4);
$cigarettes = new Cigarettes(CIGARETTES, "Dunhil", 350, 3);
$drink = new Drink(DRINK, "Coca-Cola", 100, 10);
$food = new Food(FOOD, "Bread", 50, 8);
$toys = new Toys(TOYS, "Car", 250, 7);


$pharmacy = new Pharmacy("Pharmacy shop", "Benu");
$pharmacy->addProduct($medicine);

$cornerShop = new CornerShop("Corner Shop", "Mikromarket");
$cornerShop->addProduct($cigarettes);
$cornerShop->addProduct($drink);

$supermarket = new Supermarket("Supermarket", "Maxi");
$supermarket->addProduct($toys);

$lazar = new CustomerData("Nikola", "Mrkela", 12345667);
$firstBill = $cornerShop->sellProduct($drink, 8, null, $lazar);
$firstBill = $cornerShop->sellProduct($cigarettes, 2, $firstBill, null, $lazar);
print_r($firstBill);

$jelena = new CustomerData("Jovana", "Jovanovic", 12345656);
$jelenaBill = $pharmacy->sellProduct($medicine, 2, null, $jelena);
print_r($jelenaBill);

try {
    $invalidCustomer = new CustomerData("Janko", "Trbusa", 456234);
    $invalidBill = $cornerShop->sellProduct($cigarettes, 200, null, $invalidCustomer);
} catch (Exception $ex) {
    print_r($ex);
}

$storeChain = new StoreChain("Store Chain", [$pharmacy, $cornerShop, $supermarket]);

print_r($storeChain);
