<?php
session_start();
$subjectid= $_SESSION['subject'];
$sid= $_POST["admNo"];
$examid= $_SESSION['exam'];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
if($conn->query("DELETE FROM studentmarks WHERE admNo='".$sid."' AND eid='".$examid."' AND subid='".$subjectid."'")){echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='success.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>D A T A  &nbsp;&nbsp; D E L E T E D !</h2></font></td></tr></table>";}else{echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='failed.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>Faield !<br>Error :".$conn->error()."</h2></font></td></tr></table>";};
$conn->close();
?>