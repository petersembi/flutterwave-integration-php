<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $curl = curl_init();

    $customer_email = $email;
    $amount = 5000;
    $currency = "KES";
    $txref = generateTxRef(15);  
    $apikey = "FLWSECK_TEST-ac03fc1e9e1ced7ae56f59a87f1c28e1-X"; //use secret key here
    $redirect_url = "http://localhost:8080/paymentfeedback.php";
    $api_url = 'https://api.flutterwave.com/v3/payments';
    

    $request_data = [
            'amount' => $amount, 
            'customer' => [
                'email' => $email
            ],
            'currency' => $currency,
            'tx_ref' => $txref,           
            'redirect_url' => $redirect_url
        ];

    $payload = json_encode($request_data);
    

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url, 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>  $payload,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer " . $apikey,
            "content-type: application/json",
            "cache-control: no-cache"
        ],
    ));


    $response = curl_exec($curl);

    $err = curl_error($curl);
    curl_close($curl);

    if($err){
        echo 'curl did not execute';
        die('Curl returned error: ' . $err);        
    }

    
    $paymentResponse = json_decode($response, true);
   
    if ($paymentResponse['status'] === 'success'){
        // payment is successful
        echo 'payment success';
        header('Location: '. $paymentResponse["data"]["link"]);
    }  else {
        //payment failed
        echo $paymentResponse['message'];
    }

}


// function to generate a custom tx reference 
function generateTxRef($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $txref = '';
        
    for ($i = 0; $i < $length; $i++) {
        $txref .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $txref;
}
