<?php
session_start();
include "career_common.php";
?>

<p>Please fill out the form below to share the website to a friend.</p>
<form action="career_email.php"  method="get">

    Friend's Email: <input type="text" name="email" />
    <br />
    Subject: <input type="text" name="subject" />
    <br />
    Content: <textarea name="content"></textarea>
    <br />
    <input type="submit" name="submit" value="Send Email" />
</form>