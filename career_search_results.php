<?php
/**
 * Creator: Chen Jin
 * Date: 10/9/2014
 * Time: 4:08 PM
 */

include "career_common.php";
?>

<?php
$company = $_REQUEST['company'];
$type_id = $_REQUEST['type_id'];
$city_id = $_REQUEST['city_id'];
$state_id = $_REQUEST['state_id'];
$country_id = $_REQUEST['country_id'];

$conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");

if(mysqli_connect_errno()){
    echo "Connection failed: " . mysqli_connect_error();
}

$sql = "SELECT *
 FROM jobs, cities, countries, states, types
 WHERE jobs.type_id = types.type_id
 AND jobs.city_id = cities.city_id
 AND jobs.state_id = states.state_id
 AND jobs.country_id = countries.country_id
 AND jobs.company LIKE '%" . $company. "%' ";

if($type_id != 'all'){
    $sql = $sql . " AND jobs.type_id = $type_id";
}
if($city_id != 'all'){
    $sql = $sql . " AND jobs.city_id = $city_id";
}
if($state_id != 'all'){
    $sql = $sql . " AND jobs.state_id = $state_id";
}
if($country_id != 'all'){
    $sql = $sql . " AND jobs.country_id = $country_id";
}
$sql = $sql . " ORDER BY jobs.company";

$results = mysqli_query($conn, $sql);
?>

<br/><br/>
<br/><br/>
<br/><br/>

<?php
echo " Search returned " . mysqli_num_rows($results) . " records<br /> <br />";
?>

    <style>
        div { float:left; width:150px; }
    </style>


    <div>Position<hr  /></div>
    <div>Company<hr /></div>
    <div>Type<hr  /></div>
    <div>City<hr  /></div>
    <div>State<hr  /></div>
    <div>Country<hr  /></div>
    <div>Deadline<hr  /></div>
    <div>Information/Edit/Delete<hr /></div>

    <br style="clear:both">

<?php
while ($currentrow = mysqli_fetch_array($results)) {
    echo "<div>" . $currentrow["position"] . "</div>";
    echo "<div>" . $currentrow["company"] . "</div>";
    echo "<div>" . $currentrow["type"] . "</div>";
    echo "<div>" . $currentrow["city"] . "</div>";
    echo "<div>" . $currentrow["state"] . "</div>";
    echo "<div>" . $currentrow["country"] . "</div>";
    echo "<div>" . $currentrow["deadline"] . "</div>";
    echo "<div><a href='career_details.php?job_id=" . $currentrow['job_id'] . "'>Click Here</a> </div>";
    echo "<br style='clear:both'/><br/>";
}

?>

