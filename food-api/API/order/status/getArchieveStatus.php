<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../../MODEL/status.php';

$database = new Database();
$db = $database->connect();

$status = new Status($db);

$stmt = $status->getArchieveStatus();

if ($stmt->num_rows > 0) {
    $status_arr = array();
    while ($record = $stmt->fetch_assoc()) {
        extract($record);
        $status_record = array(
            'id' => $id,
            'description' => $description,
        );
        array_push($status_arr, $status_record);
    }
    http_response_code(200);
    echo json_encode($status_arr, JSON_PRETTY_PRINT);
    //return json_encode($status_arr);
} else {
    http_response_code(404);
    echo json_encode(["Message" => "No record"]);

    //return json_encode(array("Message" => "No record"));
}
die();
?>