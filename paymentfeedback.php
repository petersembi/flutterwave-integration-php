<?php
if (isset($_GET['tx_ref'])) {
    $ref = $_GET['tx_ref'];
    $transaction_id = $_GET['transaction_id'];
    $amount = "5000"; //Correct amount from server
    $currency = "KES"; //Correct Currency from server
    $apikey = "FLWSECK_TEST-ac03fc1e9e1ced7ae56f59a87f1c28e1-X"; //use secret key here

    $url = 'https://api.flutterwave.com/v3/transactions/'. $transaction_id .'/verify';

    $ch = curl_init($url);    
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apikey,
    ]);

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    // echo $response;
    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];    
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];

    if($chargeAmount == $amount && $chargeCurrency == $currency )
    {
        // transaction was successful
        echo "transaction successful";

    } else {
        //Dont give value and return to failure page
        // A payment error occurred

        echo "there was an error in your payment. Please try again";
        echo "<br>";
        echo "Wrong amount or currency entered";
    } 

} else {

    die('No reference supplied');

}