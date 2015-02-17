<?php
session_start();
include "career_common.php";

if(empty($_REQUEST["email"])){
    echo "Go back to the Mail Page: " ;
    echo "<a href='career_share.php'>Share Site</a>";
    echo "<br/>";
    exit("Error: No email address given.");
}

if (!empty($_REQUEST["email"])) {
    // mail tag with variables plugged into mail command
    $to = $_REQUEST["email"];
    $subject = $_REQUEST["subject"];
    $content = "Hello. A friend suggested you might like this Career website: awesome.com!"
        . $_REQUEST["content"];
    $headers = "From: Integrated Personal Career Service Inc.";

    $test = mail($to, $subject, $content, $headers);

    if ($test) {
        echo "Mail sent to " . $_REQUEST["email"];
        echo "<br/>";
        echo "Go back to the Homepage: " ;
        echo "<a href='career_main.php'>Homepage</a>";
        exit();
    }
}
?>