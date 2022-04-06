<?php

namespace Paymentsample\Test;
use JsonSerializable;
class PaymentResponse implements JsonSerializable{
    private int $paymentTransactionId;

	private int $merchantOrderId;

	private float $totalOrderAmount;

	private String $redirectURL;

	private float $amount;

	private String $currency;

	private String $transactionId;

	private String $status;

	private int $httpResponseCode;

	private String $httpResponseReason;

	private String $errorReason;

	private String $errorMessage;

	private String $errorField;

	private String $errorFieldReason;

	private int $informationApprovalCode;

	private int $informationResponseCode;

	private String $avsCode;

	private String $avsCodeRaw;

	private String $reconciliationId;

	private String $orderSubmitTimeUtc;

	private String $cardVerificationResultCode;

	private String $cvvStatus;

	private String $refundId;

	private int $productId;

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

	public function jsonToObject($data) {
        foreach ($data AS $key => $value)
		if(!is_null($value)) 
		$this->{$key} = $value;
    }
}

?>