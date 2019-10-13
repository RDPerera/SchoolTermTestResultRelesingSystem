<!DOCTYPE html>
<html>
<head><link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<title>Change Class</title>
</head>
<body>

<?php 
	$c=1;
	if (isset($_POST["submit58"])!=true) {
	session_start();
	include ("connect.class.php");
	$use=new connect();
	$_SESSION['gradeid']=$_POST["grade"];
	$_SESSION['classid']=$_POST["class"];
	echo "<form method='post' action='chng.php' target='_self'><fieldset><legend>Change Class </legend>";
	echo "Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo "<input type='submit' name='submit58' value='Submit'></fieldset></form>";}
	if (isset($_POST["submit58"])) {
	session_start();
	$rgradeid=$_POST["grade"];
	$rclassid=$_POST["class"];
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	if($conn->query("UPDATE student SET gid='".$rgradeid."',cid='".$rclassid."' WHERE gid='".$_SESSION['gradeid']."' AND cid='".$_SESSION['classid']."'")){
		echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='success.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>D A T A  &nbsp;&nbsp; C H A N G E D !</h2></font></td></tr></table>";}} 
	?>

</body></html>