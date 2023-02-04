<?php

function getStatus()
{
    $url = 'http://localhost/sandweches_user/food-api/API/order/status/getArchieveStatus.php';

    $json_data = file_get_contents($url);

    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $status_data = $decode_data;
        $status_arr = array();
        if (!empty($status_data)) {
            foreach ($status_data as $status) {
                $status_record = array(
                    "id" => $status['id'],
                    "description" => $status['description'],
                );
                array_push($status_arr, $status_record);
            }

            return $status_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}

function getOrder($user)
{
    $url = 'http://localhost/sandweches_user/food-api/API/order/getArchiveOrderUser.php?USER_ID=' . $user;

    $json_data = file_get_contents($url);

    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $order_data = $decode_data;
        $order_arr = array();
        if (!empty($order_data)) {
            foreach ($order_data as $ord) {
                $order_record = array(
                    "id" => $ord['id'],
                    "pickup" => $ord['pickup'],
                    "break" => $ord['break'],
                    "status" => $ord['status'],
                );
                array_push($order_arr, $order_record);
            }

            return $order_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}

function getPickup()
{
    $url = 'http://localhost/sandweches_user/food-api/API/order/pickup/getPickup.php';

    $json_data = file_get_contents($url);

    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $pickup_data = $decode_data;
        $pickup_arr = array();
        if (!empty($pickup_data)) {
            foreach ($pickup_data as $pick) {
                $pickup_record = array(
                    "id" => $pick['id'],
                    "name" => $pick['name'],
                );
                array_push($pickup_arr, $pickup_record);
            }

            return $pickup_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}


?>