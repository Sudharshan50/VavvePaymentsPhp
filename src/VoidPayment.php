<?php

namespace Paymentsample\Test;
use JsonSerializable;

class VoidPayment implements JsonSerializable{
  private String $paymentTransactionId;

	private String $merchantId;

	private float $voidAmount;

	private String $currency;

	private String $paymentMethodType;

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