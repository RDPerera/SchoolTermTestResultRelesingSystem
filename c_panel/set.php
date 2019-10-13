<?php
/*------------------------------------------------------------------------------------*/
$grade=$_POST["grade"];
$class=$_POST["class"];
$exam=$_POST["exam"];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db"); 
if($conn->connect_error){die("Some Error".$conn->connect_error);}
/*------------------------------------------------------------------------------------*/
$result=$conn->query("SELECT DISTINCT student.admNo FROM student INNER JOIN studentmarks ON student.admNo=studentmarks.admNo WHERE student.gid='".$grade."' AND student.cid='".$class."' AND studentmarks.eid='".$exam."'");
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
/*------------------------------------------------------------------------------------*/
		$total=0;
		$admNo=$row["admNo"];
		if($conn->query("DELETE FROM studentrank WHERE admNo='".$admNo."' AND eid='".$exam."' ")){}
		if($conn->query("DELETE FROM studenttotal WHERE admNo='".$admNo."' AND eid='".$exam."' ")){}
		if($conn->query("DELETE FROM studentavg WHERE admNo='".$admNo."' AND eid='".$exam."' ")){}
		$subresult=$conn->query("SELECT mark FROM studentmarks WHERE admNo='".$admNo."' AND eid='".$exam."' ");
		if ($subresult->num_rows>0) {
			while ($subrow=$subresult->fetch_assoc()) {
				$total=$total+$subrow["mark"];
			}}
		$avg=$total/($subresult->num_rows);
		$che=$conn->query("SELECT total FROM studenttotal WHERE admNo='".$admNo."' AND eid='".$exam."' ");
		if ($che->num_rows==0) {
			if($conn->query("INSERT INTO studenttotal VALUES ('".$admNo."','".$exam."','".$total."')")){}
			if($conn->query("INSERT INTO studentavg VALUES ('".$admNo."','".$exam."','".$avg."')")){}
		}
	}}
/*------------------------------------------------------------------------------------*/
$countr=1;
$results=$conn->query("SELECT DISTINCT student.admNo,studenttotal.total FROM student INNER JOIN studenttotal ON student.admNo=studenttotal.admNo WHERE student.gid='".$grade."' AND student.cid='".$class."' AND studenttotal.eid='".$exam."' ORDER BY studenttotal.total DESC");
if ($results->num_rows>0) {
	while ($rows=$results->fetch_assoc()) {
		$thiadmNo=$rows["admNo"];
		if($conn->query("INSERT INTO studentrank VALUES ('".$thiadmNo."','".$exam."','".$countr."')")){}
		
	$countr++;}}echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='success.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>D A T A  &nbsp;&nbsp; S E T E D !</h2></font></td></tr></table>";?>

