<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<title></title>
</head>
<body>
	<table>
		<thead><tr><th>No</th><th>Student Name</th>
<?php
$class=$_POST["class"];
$grade=$_POST["grade"];
$exam=$_POST["exam"];
$subject=$_POST["subject"];
echo "<th>Marks</th></tr></thead><tbody>";
$ord=$_POST["order"];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
$result=$conn->query("SELECT student.fname,mark FROM (((studentmarks INNER JOIN student ON student.admNo = studentmarks.admNo)INNER JOIN exam ON exam.eid = studentmarks.eid)INNER JOIN subject ON subject.subid = studentmarks.subid) WHERE student.gid='".$grade."' AND studentmarks.subid='".$subject."' AND studentmarks.eid='".$exam."' ORDER BY $ord");
		if ($result->num_rows>0) {
			$count=1;
			while ($row=$result->fetch_assoc()) {
				echo "<tr><td>$count</td><td>".ucwords($row["fname"])."</td><td>".$row["mark"]."</td></tr>";
				$count++;
			}
			}
$conn->close();?>

</tbody>
</table>
</body>
</html>

