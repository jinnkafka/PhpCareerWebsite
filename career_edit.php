<?php

session_start();
include "career_common.php";
if(empty($_REQUEST['job_id'])){
    header("Location: career_main.php");
}

$conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");

if(mysqli_connect_errno()){
    exit("MySQL Connection Failed. " . mysqli_connect_error());
}

$record_sql = "SELECT * FROM jobs
              WHERE job_id = " . $_REQUEST['job_id'];

$record_results = mysqli_query($conn, $record_sql);
if(!$record_results){
    exit("Record SQL Error: " . mysqli_error($conn));
}

$record_row = mysqli_fetch_array($record_results);

// Type SQL
$type_sql = "SELECT * FROM types";
$type_results = mysqli_query($conn, $type_sql);
if(!$type_results) {
    exit("Type SQL Error: " . mysqli_error($conn));
}

// City SQL
$city_sql = "SELECT * FROM cities";
$city_results = mysqli_query($conn, $city_sql);
if(!$city_results) {
    exit("City SQL Error: " . mysqli_error($conn));
}

// State SQL
$state_sql = "SELECT * FROM states";
$state_results = mysqli_query($conn, $state_sql);
if(!$state_results) {
    exit("State SQL Error: " . mysqli_error($conn));
}

?>


<style>
    .title_input {
        width: 200px;
    }
</style>

<form method="get" action="career_update.php">
    Position: <input class="position_input" type="text" name="position" value="<?php echo $record_row['position']; ?>"/>
    <br/>
    Type:
    <select name="type_id">
        <?php
        while($type_row = mysqli_fetch_array($type_results)){
            if($record_row['type_id'] == $type_row['type_id']) {
                echo "<option selected='1' value='" . $type_row['type_id'] . "'>" . $type_row['type'] . "</option>";
            } else {
                echo "<option value='" . $type_row['type_id'] . "'>" . $type_row['type'] . "</option>";
            }
        }
        ?>
    </select>
    <br/>
    City:
    <select name="city_id">
        <?php
        while($city_row = mysqli_fetch_array($city_results)){
            if($record_row['city_id'] == $city_row['city_id']) {
                echo "<option selected='1' value='" . $city_row['city_id'] . "'>" . $city_row['city'] . "</option>";
            } else {
                echo "<option value='" . $city_row['city_id'] . "'>" . $city_row['city'] . "</option>";
            }
        }
        ?>
    </select>
    <br/>
    State:
    <select name="state_id">
        <?php
        while($state_row = mysqli_fetch_array($state_results)){
            if($record_row['state_id'] == $state_row['state_id']) {
                echo "<option selected='1' value='" . $state_row['state_id'] . "'>" . $state_row['state'] . "</option>";
            } else {
                echo "<option value='" . $state_row['state_id'] . "'>" . $state_row['state'] . "</option>";
            }
        }
        ?>
    </select>
    <br/>
    <input type="hidden" name="job_id" value="<?php echo $_REQUEST['job_id']; ?>"/>
    <br/>
    <input type="submit" value="Update Record"/>
</form>