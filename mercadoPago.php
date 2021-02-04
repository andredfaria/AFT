<?php
    require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

    $valor = $_POST["valor"];

    fazerVenda($valor);   

    function fazerVenda($valor){
        MercadoPago\SDK::setAccessToken("TEST-b20e6d2f-0ddb-4c29-af7a-db7424b77d23"); // Either Production or SandBox AccessToken

        $payment = new MercadoPago\Payment();
        
        $payment->transaction_amount = $valor;
        $payment->token = "YOUR_CARD_TOKEN";
        $payment->description = "Ergonomic Silk Shirt";
        $payment->installments = 1;
        $payment->payment_method_id = "visa";
        $payment->payer = array(
        "email" => "larue.nienow@email.com"
        );

        $payment->save();

        echo $payment->status;

        var_dump($payment);
    }
  ?>