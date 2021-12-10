<?php
    require('connect.php');
    if(isset($_POST['info']) && isset($_POST['path']) && isset($_POST['date']) && isset($_POST['id'])){
            $id = ($_POST['id']);
            $info = ($_POST['info']);
            $path = ($_POST['path']);
            $date = ($_POST['date']);
            
            $query = mysqli_query($db, "UPDATE news SET (info = '$info', path = '$path', date = '$date') WHERE id = $id");
            if(mysqli_affected_rows($db) > 0)
                echo json_encode(array('response' => 'success'));
            else
                echo json_encode(array('response' => 'error', 'result' => 'Could not delete your tweet'));
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'Invalid Activity'));
    }
    ?>