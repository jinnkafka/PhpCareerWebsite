<?php


if(!$_SESSION["login"]){
    if(!empty($_POST["password"])){
        if(strtoupper($_POST["username"])=="N/A" && $_POST["password"] == "N/A"){
            $_SESSION["login"] = true;
            $_SESSION["username"] = $_POST["username"];
        }
        else{
            echo "Username and/or password is not correct!";
            include "career_login.php";
            exit();
        }
    }else{
        include "career_login.php";
        exit();
    }
}
?>