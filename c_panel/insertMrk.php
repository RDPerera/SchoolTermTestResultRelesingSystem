<!DOCTYPE html>
<html>
<head><link rel="icon" type="image/png" href="images/icons/favicon.ico"/><style type="text/css">

	body{
	font-family: "Courier New";
	color:black;
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
	}
	input{border-radius: 4px;}
	select{border-radius: 4px;}
	fieldset
	{
	width: 60%;
	padding: 15px;
	background: rgb(54, 25, 25); 
	background: rgba(54, 25, 25, .5); 
	color:white;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;	
    border-radius:8px
	}
	legend
	{
background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
	color:white;
     border:2px solid white;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;	
    border-radius:8px;
	}

	</style>
	<title></title>
</head>
<body>
<form action="insert.php" method="post">
<fieldset><legend>Insert Data</legend>
<table >
<?php
session_start();
$grade=$_POST["grade"];
$class=$_POST["class"];
$exam=$_POST["exam"];
$subject=$_POST["subject"];
$counter=1;
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
$result=$conn->query("SELECT student.fname,student.admNo FROM student INNER JOIN studentsubject ON student.admNo=studentsubject.admNo WHERE studentsubject.subid='".$subject."' AND student.gid='".$grade."' AND student.cid='".$class."'");
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		$admNo=$row["admNo"];
		$resultA=$conn->query("SELECT mark FROM studentmarks WHERE studentmarks.admNo='".$admNo."' AND studentmarks.subid='".$subject."' AND studentmarks.eid='".$exam."'");
		if ($resultA->num_rows==0) {
		echo "<tr><td>".$row["fname"]."</td><td><input type='text' name='".$counter."'></td></tr>";
		$_SESSION['h'.$counter] = $admNo;
		$counter++;}else{echo " <br>";}}}
	
if($counter>1){echo "<tr><td></td><td align='right'><input type='submit' name='subm' value='Submit Data'></td></tr>";}
$_SESSION['varname'] = $counter-1;
$_SESSION['exam']=$_POST["exam"];
$_SESSION['subject']=$_POST["subject"];
?>	

</table></fieldset></form>
<form method="post" action="update.php">
	<fieldset><legend>Update Data</legend>
		Select Student Name:<select name="admNo"><?php
			$gradec=$_POST["grade"];
			$classc=$_POST["class"];
			$examc=$_POST["exam"];
			$subjectc=$_POST["subject"];
			$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
			if($conn->connect_error){die("Some Error".$conn->connect_error);}
			$resultc=$conn->query("SELECT student.fname,student.admNo FROM studentsubject INNER JOIN student ON student.admNo=studentsubject.admNo WHERE studentsubject.subid='".$subjectc."' AND student.gid='".$gradec."' AND student.cid='".$classc."'");
			if ($resultc->num_rows>0) {
				while ($rowc=$resultc->fetch_assoc()) {
					$admNoc=$rowc["admNo"];
						echo "<option value='".$admNoc."'>".$rowc['fname']."</option>";}}
		$conn->close();?>
	</select> New Marks : <input type="text" name="marks">  <input type="submit" name="update" value="Update">
	</fieldset>
</form>
</table></fieldset></form>
<form method="post" action="deletem.php">
	<fieldset><legend>Delete Data</legend>
		Select Student Name:<select name="admNo"><?php
			$graded=$_POST["grade"];
			$classd=$_POST["class"];
			$examd=$_POST["exam"];
			$subjectd=$_POST["subject"];
			$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
			if($conn->connect_error){die("Some Error".$conn->connect_error);}
			$resultd=$conn->query("SELECT student.fname,student.admNo FROM studentsubject INNER JOIN student ON student.admNo=studentsubject.admNo WHERE studentsubject.subid='".$subjectd."' AND student.gid='".$graded."' AND student.cid='".$classd."'");
			if ($resultd->num_rows>0) {
				while ($rowd=$resultd->fetch_assoc()) {
					$admNod=$rowd["admNo"];
						echo "<option value='".$admNod."'>".$rowd['fname']."</option>";}}
		$conn->close();?>
	</select> <input type="submit" name="update" value="Delete">
	</fieldset>
</form>
</body>
</html>
