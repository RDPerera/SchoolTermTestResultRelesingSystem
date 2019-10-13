
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<title></title>
</head>
<body>
<?php
		echo "<table align='center' border='1'>";
		echo "<thead><tr><th colspan='2'>Student Infromation </th></tr></thead><tbody>";
$name=$_POST["text1"];
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
$result=$conn->query("SELECT * FROM student WHERE admNo='".$name."' OR fname LIKE '".$name."'");
if ($result->num_rows==1) {
	while ($row=$result->fetch_assoc()) {
		$adm=$row["admNo"];
		$cid=$row["cid"];
		$gid=$row["gid"];
		$hid=$row["hid"];

		echo "<tr><td>Student ADM </td><td>".$row['admNo']."</td></tr>";
		echo "<tr><td>Student Name </td><td>".$row['fname']."</td></tr>";
		echo "<tr><td>Student DOB </td><td>".$row['dob']."</td></tr>";
		echo "<tr><td>Student Address </td><td>".$row['address']."</td></tr>";
		echo "<tr><td>Student Mobile </td><td>".$row['mtel']."</td></tr>";
		echo "<tr><td>Student FixedLine </td><td>".$row['ftel']."</td></tr>";
		echo "<tr><td>Student e-Mail </td><td>".$row['email']."</td></tr>";
		echo "<tr><td>Student Status </td><td>".$row['status']."</td></tr>";
		$result2=$conn->query("SELECT * FROM class WHERE cid='".$cid."'");
		$row2=$result2->fetch_assoc();
		echo "<tr><td>Student Class </td><td>".$row2['classname']."</td></tr>";
		$result3=$conn->query("SELECT * FROM grade WHERE gid='".$gid."'");
		$row3=$result3->fetch_assoc();
		echo "<tr><td>Student Grade </td><td>".$row3['gradename']."</td></tr>";
		$result4=$conn->query("SELECT * FROM house WHERE hid='".$hid."'");
		$row4=$result4->fetch_assoc();
		echo "<tr><td>Student House </td><td>".$row4['housename']."</td></tr>";
		$result5=$conn->query("SELECT * FROM parent INNER JOIN gradient ON parent.pid=gradient.pid WHERE admNo='".$adm."'");
		$row5=$result5->fetch_assoc();
		echo "<tr><td>Relationship :".$row5['relation']."<br>";
		echo "Name :".$row5['pname']."<br>";
		echo "Occupation :".$row5['work']."<br>";
		echo "Mobile :".$row5['mtel']."<br>";
		echo "Office Tel :".$row5['otel']."</td>";
		$row5=$result5->fetch_assoc();
		echo "<td>Relationship :".$row5['relation']."<br>";
		echo "Name :".$row5['pname']."<br>";
		echo "Occupation :".$row5['work']."<br>";
		echo "Mobile :".$row5['mtel']."<br>";
		echo "Office Tel :".$row5['otel']."</td></tr>";
		$result6=$conn->query("SELECT * FROM studentleader INNER JOIN leadership ON studentleader.lid=leadership.lid WHERE admNo='".$adm."'");
		if ($result6->num_rows>0) {
			echo "<tr><td>Leadership Details<br></td>";
		while ($row6=$result6->fetch_assoc()) {
			echo "<td>".$row6['leadname']."<br></td>";
		}}
		else{echo "<td colspan='2'>No Leadership</td>";}
		echo "</tr></tbody></table>";
	}}
	else{
		echo "<body bgcolor='DAD6C3'><table align='center'><tr><td><img src='failed.png' align='center'></td></tr><tr><td><br><br><font color='white'><h2 align='center'>No DATA Found !<br></h2></font></td></tr></table>";
	}
?>
</div>
</body>
</html>

