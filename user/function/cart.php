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

?>