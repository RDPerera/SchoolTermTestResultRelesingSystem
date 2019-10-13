<?php
$state=true;
session_start();
$counti= $_SESSION['varname'];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
for ($i=1; $i <$counti+1 ; $i++) { 
	$subject= $_SESSION['subject'];
	$sid= $_SESSION['h'.$i];
	$examid= $_SESSION['exam'];
	$marks=$_POST["$i"];
	if($marks!=""){
	if($conn->query("INSERT INTO studentmarks VALUES ('".$sid."','".$subject."','".$examid."','".$marks."')")){}else{$state=false;};}
}
	if($state){echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='success.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>D A T A  &nbsp;&nbsp; I N S E R T E D !</h2></font></td></tr></table>";}else{echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='failed.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>Faield !<br>Error :".$conn->error()."</h2></font></td></tr></table>";};

$conn->close();?>