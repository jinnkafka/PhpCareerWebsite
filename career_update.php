<?php

session_start();
include "career_common.php";
if(empty($_REQUEST['job_id'])){
    exit("You reached this page in an error.");
}

$conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");

if(mysqli_connect_errno()){
    exit("MySQL Connection Failed. " . mysqli_connect_error());
}

$update_sql = "UPDATE jobs
                SET position = '" . $_REQUEST['position'] . "',
                type_id = " . $_REQUEST['type_id'] . ",
                city_id = " . $_REQUEST['city_id'] . ",
                state_id = " . $_REQUEST['state_id'] . "
                WHERE job_id = " . $_REQUEST['job_id'];


$update_results = mysqli_query($conn, $update_sql);
if(!$update_results) {
    exit("Update SQL Error: " . mysqli_error($conn));
} else {
    echo "Record was successfully updated.";
    echo "<br/>";
    echo "Please go to Homepage for searching: " ;
    echo "<a href='career_main.php'>Homepage</a>";
}