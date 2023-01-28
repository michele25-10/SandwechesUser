<?php
function getArchiveProduct()
{
    $url = 'http://localhost/sandweches_user/food-api/API/product/getArchiveProductsPaninara.php';

    $json_data = file_get_contents($url);
    if ($json_data != false) {
        $decode_data = json_decode($json_data, $assoc = true);
        $prod_data = $decode_data;
        $prod_arr = array();
        if (!empty($prod_data)) {
            foreach ($prod_data as $prod) {
                $prod_record = array(
                    'ID' => $prod['ID'],
                    'name' => $prod['Nome prodotto'],
                    'quantity' => $prod['Quantita'],
                    'Price' => $prod['Prezzo'],
                );
                array_push($prod_arr, $prod_record);
            }

            return $prod_arr;
        } else {
            return -1;
        }
    } else {
        return -1;
    }
}

function getProduct($data)
{
    $url = 'http://localhost/sandweches_user/food-api/API/product/getProduct.php?PRODUCT_ID=' . $data;

    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $prod_data = $decode_data;

    if (!empty($prod_data)) {
        return $prod_data;
    } else {
        return -1;
    }
}

function getTag()
{
    $url = 'http://localhost/sandweches_user/food-api/API/tag/getArchiveTag.php';

    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $prod_data = $decode_data;

    if (!empty($prod_data)) {
        return $prod_data;
    } else {
        return -1;
    }
}

?>