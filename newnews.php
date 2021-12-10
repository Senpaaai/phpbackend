<?php
    require('connect.php');
    if(isset($_POST['info']) && isset($_POST['path']) && isset($_POST['date'])){
            $info = ($_POST['info']);
            $path = ($_POST['path']);
            $date = ($_POST['date']);
            $id = mysqli_query($db, "SELECT * FROM news ORDER BY id DESC LIMIT 1");
            $id_data = mysqli_fetch_row($id);
            $newid = $id_data[0]+1;
            
            $query = mysqli_query($db, "INSERT INTO news VALUES ('$newid', '$info', '$path', '$date')");
            if(mysqli_affected_rows($db) > 0)
                echo json_encode(array('response' => 'success'));
            else
                echo json_encode(array('response' => 'error', 'result' => 'Could not delete your tweet'));
    } else {
        echo json_encode(array('response' => 'error', 'result' => 'Invalid Activity'));
    }
    ?>