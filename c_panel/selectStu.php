<!DOCTYPE html>
<html>
<head><link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>
	<table >
<?php
$class=$_POST["class"];
$grade=$_POST["grade"];
echo "<thead><tr><th>No</th><th>ADM No</th><th>Name</th><th>Date Of Birth</th><th>Address</th><th>Fixed</th><th>Mobile</th><th>Email</th><th>Status</th><th>House</th></tr></thead><tbody>";
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
if(!($class=="")&&$grade==""){
$result=$conn->query("SELECT * FROM student INNER JOIN house ON student.hid=house.hid WHERE cid='".$class."' ORDER BY admNo");
}
elseif (!($grade=="")&&$class=="") {
	$result=$conn->query("SELECT * FROM student INNER JOIN house ON student.hid=house.hid WHERE gid='".$grade."' ORDER BY admNo");
}
elseif (!($class=="" && $grade=="")) {
	$result=$conn->query("SELECT * FROM student INNER JOIN house ON student.hid=house.hid WHERE cid='".$class."' AND gid='".$grade."' ORDER BY admNo");
}
else{
	$result=$conn->query("SELECT * FROM student INNER JOIN house ON student.hid=house.hid ORDER BY admNo");
}
$count=1;
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo "<tr><td>$count</td><td>".ucwords($row["admNo"])."</td><td>".$row["fname"]."</td><td>".$row["dob"]."</td><td>".$row["address"]."</td><td>".$row["ftel"]."</td><td>".$row["mtel"]."</td><td>".$row["email"]."</td><td>".$row["status"]."</td><td>".$row["housename"]."</td></tr>";
		
		$count++;
	}
	echo "</tbody></table>";
}
else{echo "No records...";}
?>

</body>
</html>

