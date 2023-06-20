<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Log.php';

$database = new Database();
$db = $database->connect();

$logs = new Log($db);

$result = $logs->get_all_records();
$count = $result->rowCount();

if ($count > 0) {
    $data = array();
    $data['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $record = array(
            'ISBN' => $ISBN,
            'email' => $email,
            'purchase_date' => $purchase_date,
            'amount' => $num_copies,
        );

        array_push($data['data'], $record);
    }

    echo json_encode($data);
} else {
    echo json_encode(
        array('message' => 'No books found')
    );
}
