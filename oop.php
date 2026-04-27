<?php
class Car {
    private $brand;
    private $model;
    private $price;

    // Konstruktor
    public function __construct($brand, $model, $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
    }

    // Getter
    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getPrice() {
        return $this->price;
    }

    // Setter
    public function setPrice($price) {
        $this->price = $price;
    }
}


class DiscountCar extends Car {
    private $discount;

    public function __construct($brand, $model, $price, $discount) {
        parent::__construct($brand, $model, $price);
        $this->discount = $discount;
    }

    public function getFinalPrice() {
        $price = $this->getPrice();
        return $price - ($price * $this->discount / 100);
    }
}


?>