<?php
$data_file = 'data.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier_name = $_POST['supplier_name'];
    $telephone_number = $_POST['telephone_number'];
    $email_address = $_POST['email_address'];
    $contract_title = $_POST['contract_title'];
    $last_meeting_date = $_POST['last_meeting_date'];
    $comments = $_POST['comments'];

    $data = [
        'supplier_name' => $supplier_name,
        'telephone_number' => $telephone_number,
        'email_address' => $email_address,
        'contract_title' => $contract_title,
        'last_meeting_date' => $last_meeting_date,
        'comments' => $comments,
    ];

    file_put_contents($data_file, json_encode($data) . PHP_EOL, FILE_APPEND);
    header('Location: index.php');
    exit;
}
$data_lines = file($data_file);
$records = [];

foreach ($data_lines as $line) {
    $records[] = json_decode(trim($line), true);
}

header('Content-Type: application/json');
echo json_encode($records);
