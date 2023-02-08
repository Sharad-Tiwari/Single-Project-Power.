<?php
$generator="1357902468";
$otp="";
for($i=1;$i<6;$i++)
{
	$otp .= substr($generator,rand()%strlen($generator),1);
}
$mail=$_POST['email'];
$mobile=$_POST['mobile'];
$c=mysql_connect("localhost","root","");
mysql_select_db("nxt",$c);
mysql_query("Insert into otp values('$mail','$mobile','$otp')");
$set="Select * from otp";
$res=mysql_query($set,$c);
if(mysql_num_rows($res)>0)
{
	ini_set("sendmail_from","sharad969211@gmail.com");
	$sender="sharad969211@gmail.com \r\n";
	$message="The OTP for registration is \n".$otp."\n Thank You";
	$subject="Registration OTP";
	$header="From: $sender";
	$send = mail($mail, $subject, $message, $header);
	
	echo($send==true ? "Mail is send" : "<h1 align=center>There was an Error</h1>");
	header("location:OTP Page.html");
}
else
{
	echo ("Error creating Id:<br>".mysql_error());
}

mysql_close($c);
?>