<?php
class Order {
    private $id;
    private $price;
    private $product;
    private $quantity;
    private $name;
    
    function __construct($price, $product, $quantity, $name, $id) {
        $this->price =$price;
        $this->product = $product;
        $this->quantity =$quantity;
        $this->name=$name;
        $this->id=$id;           
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getProduct() {
        return $this->product;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function getPrice() {
        return $this->price;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function getQuantity() {
        return $this->quantity;
    }
    function setQuantity($quantity) {
        $this->quantity=$quantity;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
} 
