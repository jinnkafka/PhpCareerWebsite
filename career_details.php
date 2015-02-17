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

$sql = "SELECT information FROM jobs
        WHERE jobs.job_id = " . $job_id;

$results = mysqli_query($conn, $sql);

if(!$results){
    exit("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($results);

    echo "INFORMATION:";
    echo "<br/>";
    echo "<br/>";
    foreach($row as $var){
    echo $var."</br>";}

    echo "<br/>";
    echo "<br/>";
    echo "<a href='career_edit.php?job_id=" . $job_id . "'>Click to EDIT</a> ";
    echo "<br/>";
    echo "<br/>";
    echo "<a href='career_delete.php?job_id=" . $job_id . "'>Click to DELETE</a> ";

?>

