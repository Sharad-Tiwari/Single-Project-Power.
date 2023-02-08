<?php
$to="sharadtiwari969211@gmail.com";
$subject="test mail";
$message="Hello! This is simple email";
$from="sanjaydin@gamil.com";
$header="From:".$from;
mail($to,$subject,$message,$header);
echo "Email sent";
?>