<?php

namespace Paymentsample\Test;
use JsonSerializable;

class Product implements JsonSerializable{
  private String $orderItemId;
	private String $productId;
	private String $productName;
	private float $price;
	private String $quantity;
	private String $itemdescription;

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    
        return $this;
      }

      public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}

?>