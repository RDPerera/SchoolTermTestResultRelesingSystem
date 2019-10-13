<!DOCTYPE html>
<html>
<head><link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>
	<table>
		<thead><tr><th>No</th><th>Student Name</th>
<?php
$class=$_POST["class"];
$grade=$_POST["grade"];
$exam=$_POST["exam"];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
$result3=$conn->query("SELECT DISTINCT subject.subname FROM (((studentmarks INNER JOIN student ON student.admNo = studentmarks.admNo)INNER JOIN exam ON exam.eid = studentmarks.eid)INNER JOIN subject ON subject.subid = studentmarks.subid) WHERE student.gid='".$grade."' AND student.cid='".$class."' AND exam.eid='".$exam."' ORDER BY subject.subid");
		if ($result3->num_rows>0) {
			$str2=0;
			while ($row3=$result3->fetch_assoc()) {
				$str1=$row3["subname"];
				$subarr[$str2]=$str1;
				echo "<th>".$str1."</th>";
				$str2++;
			}
			echo "</tr></thead><tbody>";
$result=$conn->query("SELECT DISTINCT student.admNo,student.fname FROM (((studentmarks INNER JOIN student ON student.admNo = studentmarks.admNo)INNER JOIN exam ON exam.eid = studentmarks.eid)INNER JOIN subject ON subject.subid = studentmarks.subid) WHERE student.gid='".$grade." ' AND student.cid='".$class."' AND exam.eid='".$exam."'");
		if ($result->num_rows>0) {
			$count=1;
			while ($row=$result->fetch_assoc()) {
				echo "<tr><td>$count</td><td>".ucwords($row["fname"])."</td>";
				foreach ($subarr as $subjectv) { 
				$result2=$conn->query("SELECT mark FROM (((studentmarks INNER JOIN student ON student.admNo = studentmarks.admNo)INNER JOIN exam ON exam.eid = studentmarks.eid)INNER JOIN subject ON subject.subid = studentmarks.subid) WHERE student.admNo='".$row["admNo"]."' AND subject.subname='".$subjectv."' AND exam.eid='".$exam."'");
						if ($result2->num_rows>0) {
							while ($row2=$result2->fetch_assoc()) {
								echo "<td>".$row2["mark"]."</td>";}}
								else{echo "<td>N/A</td>";}}
								echo "</tr>";


				$count++;
			}
			}}
$conn->close();?>
</tbody>
</table>

</body>
</html>