<?php
   include('config.php');
    //fetch department names from the department table
    $sql = "select distinct city from add_posting";
    $result = $mysqli->query($sql);
    $dname_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $dname_list[] = $row['city'];
    }
    echo json_encode($dname_list);
?>
