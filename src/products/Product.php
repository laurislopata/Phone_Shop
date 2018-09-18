<?php
class Product {
    private $id;
    private $price;
    private $quality;
    private $name;
    private $details;
    
    function __construct($price, $quality, $name, $id, $details) {
        $this->price =$price;
        $this->quality =$quality;
        $this->name=$name;
        $this->id=$id;
        $this->details=$details;           
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPrice() {
        return $this->price;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function getQuality() {
        return $this->quality;
    }
    function setQuality($quality) {
        $this->quality=$quality;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
    function getDetails() {
        return $this->details;
    }
    function setDetails($details) {
        $this->details=$details;
    }
} 
