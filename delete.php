<?php
    require('connect.php');
    if(isset($_POST['id'])){
        if(is_numeric($_POST['id'])){
            $query = mysqli_query($db, "DELETE FROM news WHERE id=".($_POST['id']));
            
            if(mysqli_affected_rows($db) > 0)
                echo json_encode(array('response' => 'success'));
            else
                echo json_encode(array('response' => 'error', 'result' => 'Could not delete your tweet'));
                
        } else {
            echo json_encode(array('response' => 'error', 'result' => 'Invalid Activity'));
        }
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'Invalid Activity'));
    }
    ?>