<?php
include('connect.php');

$login = trim(filter_var($_POST['login']), FILTER_SANITIZE_STRING);
$pass = trim(filter_var($_POST['pass']), FILTER_SANITIZE_STRING);
if(!empty($_POST['login'])&&(!empty($_POST['pass'] != ''))) {
    $SQL = "SELECT * FROM user WHERE Login = '$UserLogin'";
    $exeSQL = mysqli_query($conn, $SQL);
    $checkLogin =  mysqli_num_rows($exeSQL);

    if ($checkLogin != 0) {
        $arrayu = mysqli_fetch_array($exeSQL);
        if ($arrayu['UserPw'] != $UserPW) {
            $Message = "Password wrong";
        } else {
            $Message = "Success";
        }
    } else {
        $Message = "No account yet";
    }
}
$response[] = array("Message" => $Message);
echo json_encode($response)
?>