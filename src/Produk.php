<?php

namespace Mizz\Test;

class Produk {
    private string $id, $name, $description;
    private int $price, $quantity;

    public function getId():string {
        return $this->id;
    }    
    public function setId(string $id) {
        $this->id = $id;
    }
    public function getName():string {
        return $this->name;
    }
    public function setName(string $name) {
        $this->name = $name;
    }
    public function getDescription():string {
        return $this->description;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }
    public function getPrice():int {
        return $this->price;
    }
    public function setPrice(int $price) {
        $this->price = $price;
    }
    public function getQuantity():int {
        return $this->quantity;
    }
    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }
}