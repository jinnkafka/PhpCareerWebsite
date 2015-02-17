<?php

session_start();
include "career_common.php";
$job_id = $_REQUEST['job_id'];
if(empty($job_id)){
    exit("Error: No Job ID given.");
}

// Establish connection to MySQL Server
$conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");
if(mysqli_connect_errno()){
    echo "Connection failed: " . mysqli_connect_error();
}

$delete_sql = "DELETE FROM jobs
        WHERE job_id = " . $job_id;


$delete_results = mysqli_query($conn, $delete_sql);
if(!$delete_results) {
    exit("Update SQL Error: " . mysqli_error($conn));
} else {
    echo "Record was successfully deleted.";
    echo "<br/>";
    echo "Please go to Homepage for searching: " ;
    echo "<a href='career_main.php'>Homepage</a>";
}