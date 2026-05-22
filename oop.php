<?php

class Car {
    private string $brand;
    private string $model;
    private float $price;

    public function __construct(string $brand, string $model, float $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        if ($price > 0) {
            $this->price = $price;
        }
    }
}

class DiscountCar extends Car {
    private float $discount;

    public function __construct(string $brand, string $model, float $price, float $discount) {
        parent::__construct($brand, $model, $price);
        $this->discount = $discount;
    }

    public function getDiscount(): float {
        return $this->discount;
    }

    public function getDiscountAmount(): float {
        return $this->getPrice() * $this->discount / 100;
    }

    public function getFinalPrice(): float {
        return $this->getPrice() - $this->getDiscountAmount();
    }
}
?>