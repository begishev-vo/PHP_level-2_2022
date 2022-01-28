<?php

abstract class Product
{
    protected $name;
    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getFinalCost(): float;

    public function getName()
    {
        return $this->name;
    }
}

class PriceProduct extends Product
{
    private $count;

    public function __construct($name, $price, $count)
    {
        parent::__construct($name, $price);
        $this->count = $count;
    }

    public function getFinalCost(): float
    {
        return $this->price * $this->count;
    }
}

class DigitalProduct extends Product
{
    public function __construct($name, $piesPrice)
    {
        parent::__construct($name, $piesPrice / 2);
    }

    public function getFinalCost(): float
    {
        return $this->price;
    }
}

class WeigthProduct extends Product
{
    private $weight;

    public function __construct($name, $price, $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }

    public function getFinalCost(): float
    {
        return $this->price * $this->weight;
    }
}

$piesPrice = 100;
$products = [
    new PriceProduct('piece', $piesPrice, 3 ),
    new DigitalProduct('digital', $piesPrice),
    new WeigthProduct('weigth', 500, 1.5),
];


foreach ($products as $product) {
    echo $product->getName() . ' costs '  .  $product->getFinalCost(), "\n";
}