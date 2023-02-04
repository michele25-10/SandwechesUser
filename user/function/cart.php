<?php

function getCartUser($data)
{
    $url = 'http://localhost/sandweches_user/food-api/API/cart/getCart.php?user=' . $data;

    $json_data = file_get_contents($url);

    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $cart_data = $decode_data;
        $cart_arr = array();
        if (!empty($cart_data)) {
            foreach ($cart_data as $cart) {
                $cart_record = array(
                    'product' => $cart['product'],
                    'quantity' => $cart['quantity'],
                    'name' => $cart['name'],
                    'price' => $cart['price'],
                    'description' => $cart['description'],
                    'tag_id' => $cart['tag_id'],
                );
                array_push($cart_arr, $cart_record);
            }

            return $cart_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}

function addProductCart($data)
{
    $url = 'http://localhost/sandweches_user/food-api/API/cart/setAddItem.php';

    $curl = curl_init($url); //inizializza una nuova sessione di cUrl
    //Curl contiene il return del curl_init 

    curl_setopt($curl, CURLOPT_URL, $url); // setta l'url 
    curl_setopt($curl, CURLOPT_POST, true); // specifica che è una post request
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // ritorna il risultato come stringa


    $headers = array(
        "Content-Type: application/json",
        "Content-Lenght: 0",
    );


    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // setta gli headers della request

    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $responseJson = curl_exec($curl); //eseguo

    curl_close($curl); //chiudo sessione

    $response = json_decode($responseJson); //decodifico la response dal json

    return $response->message;
}

function deleteProduct($id, $user)
{
    $url = 'http://localhost/sandweches_user/food-api/API/cart/deleteItem.php?user=' . $user . '&product=' . $id;

    $json_data = file_get_contents($url);

    $json_decode = json_decode($json_data);

    return $json_decode;
}
?>