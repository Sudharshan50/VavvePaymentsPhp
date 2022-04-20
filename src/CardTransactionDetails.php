<?php

namespace Paymentsample\vavve;
use JsonSerializable;
class CardTransactionDetails implements JsonSerializable{
    private int $paymentTransactionId;

	private String $merchantId;

	private int $merchantOrderId;

	private String $ipAddress;

	private String $machineName;

	private String $requestURL;

	private String $createdDate;

	private float $totalOrderAmount;

	private String $cardNumberLast4Digit;

	private String $currency;
	
	private float $amount;

	private String $paymentType;

	private String $avsCode;

	private String $avsCodeRaw;

	private String $cardSubTypeId;

	private String $cardTypeId;

	private String $cardVerificationResultCode;

	private String $cvvStatus;

	private String $errorReason;

	private String $errorMessage;

	private String $errorField;

	private String $errorFieldReason;

	private int $httpResponseCode;

	private String $httpResponseReason;

	private String $processingStartTime;

	private String $processingEndTime;

	private String $status;

	private int $informationApprovalCode;

	private int $informationResponseCode;

	private String $reconciliationId;

	private String $orderSubmitTimeUtc;

	private String $processorRefundId;

	private String $transactionId;

	private float $capturePaymentResponseAmount;

	private String $capturePaymentResponseCurrency;

	private int $oldCardPaymentTransactionId;

	private String $geoLocationId;

	private String $paymentThru;

	private String $paymentApp;

	private String $paymentAppType;

	private String $modeOfPayment;

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