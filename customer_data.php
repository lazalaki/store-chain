<?php


class CustomerData
{
    protected $firstName;
    protected $lastName;
    protected $phone;

    public function __construct($firstName, $lastName, $phone)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
    }

    public function getFullName()
    {
        return "$this->firstName" . " " . "$this->lastName";
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
