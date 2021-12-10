<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost', 'root', '', 'react');
$sql = 'SELECT * from news';
$mysqli = mysqli_query($conn, $sql);
$json_data = array();

while($row = mysqli_fetch_assoc($mysqli )){
    $json_data[] = $row;
}

echo json_encode(['result'=>$json_data]);?>