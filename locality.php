<?php
     include('config.php');
    //fetch department names from the department table
    $sql = "select distinct locality from add_posting";
    $result = $mysqli->query($sql);
    $dname_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $dname_list[] = $row['locality'];
    }
    echo json_encode($dname_list);
?>