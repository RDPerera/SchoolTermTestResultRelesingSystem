<!DOCTYPE html>
<html lang="en">
<head>
	<title>Result Table</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link type="text/css"  rel="stylesheet"href="css/style.css" >
<!--===============================================================================================-->
</head>
<body>
	
	
<?php
############################################### Get Data From Login Page ###########################################
$index=ucwords($_POST["adm_no"]);
$examid=ucwords($_POST["exam"]);
########################################### Make Connection With MySQL DB ##########################################
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
$result=$conn->query("SELECT * FROM studentmarks WHERE admNo='".$index."' AND eid='".$examid."'");
if ($result->num_rows==1) {
############################################### Make OutPUT Table ##################################################

	echo "<div class='limiter'><div class='container-table100'><div class='wrap-table100'><div class='table100 ver1 m-b-110'><div class='table100-head'><table><thead><tr class='row100 head'><th class='cell100 column1' colspan='2' align='center'> View Examination Results </th></tr></thead></table></div><div class='table100-body js-pscroll'><table><tbody><tr><td class='cell100 column1' >Student Name</td><td class='cell100 column1'>";

	$resultk=$conn->query("SELECT * FROM student WHERE admNo='".$index."'");
	if ($resultk->num_rows==1) {
	while ($row=$resultk->fetch_assoc()) {
		echo $row["fname"];

		echo "</th</tr></thead></table></div><div class='table100-body js-pscroll'><table><tbody><tr class='row100 head'><th class='cell100 column1' style='padding-top: 15px;padding-bottom: 15px;'> Subject Name </th>";

	}
	}
		while ($row=$result->fetch_assoc()) {
		$sid=$row["admNo"];
		$result3=$conn->query("SELECT examname FROM exam WHERE eid='".$examid."'");
		if ($result3->num_rows==1) {
			while ($row3=$result3->fetch_assoc()) {
				$str1=$row3["examname"];
				echo "<th class='cell100 column1'>".$str1."</th>";
			}
			echo "</tr></thead></table></div><div class='table100-body js-pscroll'><table><tbody>";
			}

		$result4=$conn->query("SELECT DISTINCT subject.subname FROM ((studentsubject INNER JOIN student ON student.admNo = studentsubject.admNo)INNER JOIN subject ON subject.subid = studentsubject.subid)WHERE studentsubject.admNo='".$index."'");

		if ($result4->num_rows>0) {
		while ($row4=$result4->fetch_assoc()) {
			$subn=$row4["subname"];
			echo "<tr class='row100 body'><td class='cell100 column1'>".$subn."</td>";
			$result2=$conn->query("SELECT mark FROM (((studentmarks INNER JOIN student ON student.admNo = studentmarks.admNo)INNER JOIN subject ON subject.subid = studentmarks.subid)INNER JOIN exam ON exam.eid = studentmarks.eid) WHERE student.admNo='".$index."' AND subject.subname='".$subn."' AND exam.eid='".$examid."'");

			if ($result2->num_rows>0) {
				while ($row2=$result2->fetch_assoc()) {
				echo "<td class='cell100 column1'>".$row2["mark"]."</td>";}}else{echo "<td class='cell100 column1'>N/A</td>";}}
				echo "</tr>";
		}}
	}
############################################### Login Failed Page ###########################################
else{echo "<div id='notfound'>
		<div class='notfound'>
			<div class='notfound-404'>
				<h1>Oops!</h1>
				<h2> Incorrect Addmission Number OR Results Are Not Available Yet!</h2>
			</div>
			<a href='/index.php'>Go TO Homepage</a>
		</div>
	</div>";}
############################################### Close DB Connection ###########################################
$conn->close();?>
</tbody>
</table>
</div>
</div>
</font>
</body>
</html>