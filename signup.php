<?php
    require('connect.php');
    if(isset($_POST['login']) && isset($_POST['password'])){
            $login = ($_POST['login']);
            $password = ($_POST['password']);
            $id = mysqli_query($db, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
            $id_data = mysqli_fetch_row($id);
            $newid = $id_data[0]+1;
            
            $query = mysqli_query($db, "INSERT INTO users VALUES ('$newid', '$login', '$password')");
            if(mysqli_affected_rows($db) > 0)
                echo json_encode(array('response' => 'success'));
            else
                echo json_encode(array('response' => 'error', 'result' => 'Could not delete your tweet'));
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'Invalid Activity'));
    }