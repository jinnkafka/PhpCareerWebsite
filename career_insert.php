<?php
/**
 * Created by Chen Jin.
 */
include "career_common.php";

$conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");

if(mysqli_connect_errno()){
    echo "Connection failed: " . mysqli_connect_error();
}

$position = $_REQUEST['position'];
$company = $_REQUEST['company'];
$type_id = $_REQUEST['type'];
$city_id = $_REQUEST['city'];
$state_id = $_REQUEST['state'];
$country_id = $_REQUEST['country'];
$deadline = $_REQUEST['deadline'];
$information = $_REQUEST['information'];


$sql = "INSERT INTO jobs (position, company, type_id, city_id, state_id, country_id, deadline, information )
        VALUES ( '" . $position . "', '" . $company . "' ," . $type_id . " , " . $city_id . " , " . $state_id . "
        , " . $country_id . " , '" . $deadline . "', '" . $information . "')";


if(empty($position)) {
    echo "<a href='career_main.php'>Homepage</a><br/>";
    exit("Please enter the job position.");

}

if(empty($company)) {
    echo "<a href='career_main.php'>Homepage</a><br/>";
    exit("Please enter the job company.");
}

$result = mysqli_query($conn, $sql);

if($result){
    echo "You successfully added job position: ". $position;
}
else {
    echo "There was a SQL Error. ". mysqli_error($conn);
}
echo "<br/>";
echo "Please go to Homepage for searching: " ;
echo "<a href='career_main.php'>Homepage</a>";
exit();

?>
