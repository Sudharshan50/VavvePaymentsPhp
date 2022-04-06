<?php

namespace Paymentsample\vavve;
use JsonSerializable;

class Payment implements JsonSerializable{
    private String $merchantId;

	private String $paymentThru;

	private String $paymentInfo;

	private String $paymentAuthId;

	private String $paymentStatus;

	private String $storeDiscType;

	private float $amount;

	private float $totalAmount;

	private String $paymentReferrenceId;

	private String $createdBy;

	private Timestamp $createdDate;

	private String $updatedBy;

	private Timestamp $updatedDate;

	private String $description;

	private String $merchantLocationId;

	private String $memberId;

	private String $redeemType;

	private String $orderId;

	private String $orderType;

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