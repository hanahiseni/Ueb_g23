<?php 
class Product {
    private $name;
    private $price;

    public function__construct($name, $price)
    {
        $this->name=$name;
        $this->price=$price;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price){
        $this->price=$price;
    }
}

class CarProduct extends Product {
    private $brand;
    public function__construct($name, $price $brand) {
        parent::__construct($name, $price);
        $this->brand=$brand;
    }
    public function getBrand() {
        return $this->brand;
    }
    public function setBrand($brand) {
        $this->brand=$brand;
    }
}
$car = new CarProduct("BMW Car", 25000, "BMW");
echo "<h2> OOP NE PHP</h2>";
echo "<p>Produkti:" .$car->getName()."</p>";
echo "<p>Çmimi: " . $car->getPrice() . " €</p>";
echo "<p>Brendi:".$car->getBrand()."</p>";

?>
