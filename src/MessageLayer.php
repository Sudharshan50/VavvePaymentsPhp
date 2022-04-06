<?php

namespace Paymentsample\vavve;
use JsonSerializable;

class MessageLayer implements JsonSerializable{
    private String $msgidentifier;

	private String $merchantId;

	private String $orderId;

	private float $totalOrderAmount;

	private float $amount;

	private String $currency;

	private String $account;

	private String $holdername;

	private String $bankname;

	private String $bankId;

	private String $accounttype;

	private String $routingnumber;

	private String $cvv2;

	private String $expiry; // format YYMM

	private String $modeofpayment; // online or offline

	private String $paymentApp; // Appointment/Giftcard/etc

	private String $paymentAppType; // Hosted/Self/API

	private String $paymentMethodType; // card/ach/digital

	private String $paymentThru; // online or vavve

	private String $requestURL;

	private String $track;

	private String $address1;

	private String $address2;

	private String $city;

	private String $state;

	private String $country;

	private String $zipcode;

	private String $customerid;

	private String $firstname;

	private String $lastname;

	private String $phone;

	private String $email;

	private String $exitingStatus;

	private String $memberId;

	private String $merchantLocationId;

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