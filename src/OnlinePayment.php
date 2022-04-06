<?php

namespace Paymentsample\Test;

class OnlinePayment
{
    public function get_payment()
    {
        return null;
    }

    public function authorize_payment(MessageLayer $messageLayer, string $apiKey, string $apiSecret): PaymentResponse
    {
        $onlinePayment = new OnlinePayment();
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/authorize";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        $enc = $this->encryt($messageLayer->account, $apiSecret, $apiKey);
        $messageLayer->account = $enc;

        $enc = $this->encryt($messageLayer->cvv2, $apiSecret, $apiKey);
        $messageLayer->cvv2 = $enc;

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($messageLayer),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function capture_payment(CapturePayment $capturePayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/capture";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($capturePayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function authorize_and_capture_payment(MessageLayer $messageLayer, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/authorizeandcapture";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        $enc = $this->encryt($messageLayer->account, $apiSecret, $apiKey);
        $messageLayer->account = $enc;

        $enc = $this->encryt($messageLayer->cvv2, $apiSecret, $apiKey);
        $messageLayer->cvv2 = $enc;

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($messageLayer),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function refund_authorize_payment(RefundPayment $refundPayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/authorize/" + $refundPayment->paymentTransactionId + "/refund";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($refundPayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function refund_capture_payment(RefundPayment $refundPayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/capture/" + $refundPayment->paymentTransactionId + "/refund";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($refundPayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function void_authorize_payment(VoidPayment $voidPayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/authorize/" + $voidPayment->paymentTransactionId + "/void";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($voidPayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function void_capture_payment(VoidPayment $voidPayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/capture/" + $voidPayment->paymentTransactionId + "/void";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($voidPayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    public function void_refund_payment(VoidPayment $voidPayment, string $apiKey, string $apiSecret): PaymentResponse
    {
        $curl = curl_init();
        $url = "http://164.90.146.112:8062/payments/authorize/" + $voidPayment->paymentTransactionId + "/voidrefund";

        $header = [
            "Content-Type:application/json",
            "X-API-KEY:$apiKey",
            "X-API-SECRET:$apiSecret"
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($voidPayment),
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $header
        ]);

        $response = curl_exec($curl);

        $response = substr($response, strripos($response, "{"), strlen($response));

        $paymentResponse = new PaymentResponse();

        $paymentResponse->jsonToObject(json_decode($response));

        return $paymentResponse;
    }

    private function encryt($strToEncrypt, $secret, $salt): string
    {

        $iv = implode(array_map("chr", array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)));

        $spec = hash_pbkdf2(
            'sha256',
            $secret,
            $salt,
            65536,
            256,
            true
        );

        $encryption = openssl_encrypt($strToEncrypt, 'aes-256-cbc', $spec, 0, $iv);

        return $encryption;
    }

    private function decryt($strToDecrypt, $secret, $salt): string
    {

        $iv = implode(array_map("chr", array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)));

        $spec = hash_pbkdf2(
            'sha256',
            $secret,
            $salt,
            65536,
            256,
            true
        );

        $decryption = openssl_decrypt($strToDecrypt, 'aes-256-cbc', $spec, 0, $iv);

        return $decryption;
    }

}

?>