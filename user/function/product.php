<?php
function getArchiveProduct(){
    $url = 'http://localhost/webApp_sandweches/food-api/API/product/getArchiveProductsPaninara.php';

    $json_data = file_get_contents($url);
    if($json_data != false){
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
        }else{
            return -1; 
        }
    }else{
        return -1; 
    }
}

?>