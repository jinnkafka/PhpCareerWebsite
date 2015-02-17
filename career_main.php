<?php
/**
 * Created by PhpStorm.
 * User: OWNER
 * Date: 12/4/2014
 * Time: 11:23 PM
 */
session_start();
include "career_common.php";
require "career_security.php";
?>


<div id="introduction" style="
		width:1000px;
		color:black;
		margin:auto;
		boarder: 1px solid teal;
		padding: 10px;
	">
    <strong> This system is to give college students a platform for storing and searching their part-time, internship, or full-time
        jobs. <br/>Use "Search a Job" section to search for existing listings in the database. Use "Add a Job" section
         to add a new listing to the database. <br/>The platform is easy and secure to use. </strong>
</div><!--end introduction-->

<div id="container" style="margin:auto; width:1100px;">

    <div id="box1" style="width:500px; height:300px; float:left; margin:10px; padding:10px; background-image: url(final_back.jpg);background-repeat;">
        <span style="font-size:25pt;font-family:architect;"><em>Search a Job</em></span>



            <?php
            // Establish connection to MySQL Server

            $conn = mysqli_connect("N/A", "N/A", "N/A", "N/A");

            if(mysqli_connect_errno()){
                echo "Connection failed: " . mysqli_connect_error();
            }

            $sql_type = "SELECT * FROM types";
            $sql_city = "SELECT * FROM cities";
            $sql_state = "SELECT * FROM states";
            $sql_country = "SELECT * FROM countries";

            $results_type = mysqli_query($conn, $sql_type);
            $results_city = mysqli_query($conn, $sql_city);
            $results_state = mysqli_query($conn, $sql_state);
            $results_country = mysqli_query($conn, $sql_country);

            if(!$results_type || !$results_city || !$results_state || !$results_country) {
                exit("SQL Error: " . mysqli_error($conn));
            }

            ?>
            <html>
            <head lang="en">
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
            <br/>
            <br/>

            <form method="get" action="career_search_results.php">
                Company: <input type="text" name="company">
                <br/>
                Type:
                <select name="type_id">
                    <option value='all'>All</option>
                    <?php
                    while($row = mysqli_fetch_array($results_type)) {
                        echo "<option value='" . $row['type_id'] . "'>" . $row['type'] . "</option>";
                    }
                    ?>
                </select>
                <br/>
                City:
                <select name="city_id">
                    <option value='all'>All</option>
                    <?php
                    while($row = mysqli_fetch_array($results_city)) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city'] . "</option>";
                    }
                    ?>
                </select>
                <br/>
                State:
                <select name="state_id">
                    <option value='all'>All</option>
                  <?php
                    while($row = mysqli_fetch_array($results_state)) {
                        echo "<option value='" . $row['state_id'] . "'>" . $row['state'] . "</option>";
                    }
                    ?>
                </select>
                <br/>
                Country:
                <select name="country_id">
                    <option value='all'>All</option>
                    <?php
                    while($row = mysqli_fetch_array($results_country)) {
                        echo "<option value='" . $row['country_id'] . "'>" . $row['country'] . "</option>";
                    }
                    ?>
                </select>
                <br/>
                <input type="submit">
            </form>

            </body>
            </html>


    </div><!--end box1-->

    <div id="box2" style="width:500px; height:300px; float:left; margin:10px; padding:10px; background-image: url(final_back.jpg);background-repeat;">
        <span style="font-size:25pt;font-family:architect;"><em>Add a Job</em></span>


            <?php
            /**
             * Created by Chen Jin
             */
            $conn = mysqli_connect("uscitp.com", "chenjin", "123456", "chenjin_career");

            if(mysqli_connect_errno()){
                echo "Connection failed: " . mysqli_connect_error();
            }

            $sql = "SELECT * FROM types";
            $results = mysqli_query($conn, $sql);
            if(!$results) {
                exit("SQL Error: " . mysqli_error($conn));
            }

            $sql1 = "SELECT * FROM cities";
            $results1 = mysqli_query($conn, $sql1);
            if(!$results1) {
                exit("SQL Error: " . mysqli_error($conn));
            }

            $sql2 = "SELECT * FROM states";
            $results2 = mysqli_query($conn, $sql2);
            if(!$results2) {
                exit("SQL Error: " . mysqli_error($conn));
            }

            $sql3 = "SELECT * FROM countries";
            $results3 = mysqli_query($conn, $sql3);
            if(!$results3) {
                exit("SQL Error: " . mysqli_error($conn));
            }
            ?>
            <html>
            <head lang="en">
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
            <br/>
            <br/>
            <form method="post" action="career_insert.php">
                Position:
                <input type="text" name="position">
                <br/>

                Company:
                <input type="text" name="company">
                <br/>

                Type:
                <select name="type">
                    <?php
                    while($row = mysqli_fetch_array($results)) {
                        echo "<option value='" . $row['type_id'] . "'>" . $row['type'] . "</option>";
                    }
                    ?>
                </select>
                <br/>

                City:
                <select name="city">
                    <?php
                    while($row = mysqli_fetch_array($results1)) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city'] . "</option>";
                    }
                    ?>
                </select>
                <br/>

                State:
                <select name="state">
                    <?php
                    while($row = mysqli_fetch_array($results2)) {
                        echo "<option value='" . $row['state_id'] . "'>" . $row['state'] . "</option>";
                    }
                    ?>
                </select>
                <br/>

                Country:
                <select name="country">
                    <?php
                    while($row = mysqli_fetch_array($results3)) {
                        echo "<option value='" . $row['country_id'] . "'>" . $row['country'] . "</option>";
                    }
                    ?>
                </select>
                <br/>

                Deadline:
                <input type="text" name="deadline">
                <br/>(Please input deadline date with following format: YYYY-MM-DD)
                <br/>

                Information/Notes:
                <input type="text" name="information">
                <br/>
                <input type="submit">
            </form>
            </body>
            </html>

    </div><!--end box2-->
</div><!--end container-->

<div id="end" style="width:500px; margin:auto; text-align:center; padding:30px; color:black;">
    Vincent J. 2014
</div><!--end end-->

</body>
</html>