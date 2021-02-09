<?php


class StoreChain
{
    protected $name;
    protected $shops;

    public function __construct($name, $shops)
    {
        $this->name = $name;
        $this->shops = $shops;
    }


    public function __toString()
    {
        foreach ($this->shops as $shop) {
            return "$this->name: $shop->name";
        }
    }
}
