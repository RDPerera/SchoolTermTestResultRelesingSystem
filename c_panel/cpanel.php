<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<style type="text/css">

	body{
	font-family: "Courier New";
	color:black;
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
	}
	input{border-radius: 4px;}
	select{border-radius: 4px;}
	fieldset
	{
	width: 85%;
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

	</style><link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>	
	
<?php
	########################################  USE Connect Class ###################################
	include ("connect.class.php");
	$use=new connect();
	####################################### Cheak Admin Password ###################################
	$username=$_POST["username"];
	$passwd=$_POST["pass"];
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	$result=$conn->query("SELECT * FROM userinfo");
		if ($result->num_rows==1) {
			$row=$result->fetch_assoc();
			$un=$row["username"];
			$pw=$row["password"];}
	if ($username==$un && $passwd==$pw){
echo "<font color='white'>
<h2 align='center'>Control Panel</h2></font>";
	########################################  Devision 1  ##########################################
	echo "<form action='selectStu.php' method='POST' target='_blank' ><fieldset ><legend>Select Student Data</legend>Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo"<input type='submit' value='Find'></fieldset></form></br>";
	########################################  Devision 1.5  ##########################################
	echo "<form action='selectStu1.php' method='POST' target='_blank'><fieldset ><legend>Select Student Data(Using House)</legend>Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo "Class:";
	$use->getHouse();
	echo"<input type='submit' value='Find'></fieldset></form></br>";
	########################################  Devision 2  ##########################################
	echo "<form action='selectExa.php' method='POST' target='_blank'><fieldset ><legend>Select Exam Data</legend>Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo"Subject:";
	$use->getSubject();
	echo "Exam :";
	$use->getExam();
	echo "Order By :<select name='order'><option value='studentmarks.mark DESC'>Value DESC</option><option value='studentmarks.mark'>Value ASC</option><option value='student.fname'>Name</option></select><input type='submit' value='Select'></fieldset></form><br>";
	########################################  Devision 3  ##########################################
	echo "<form action='selectFexa.php' method='POST' target='_blank'><fieldset ><legend>Select Exam Data(All Related Subjects)</legend>Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo "Exam :";
	$use->getExam();
	echo"<input type='submit' value='Select'></fieldset></form><br>";
	########################################  Devision 4  ##########################################
	echo"<form action='insertStu.php' method='POST' target='_blank'>
	<fieldset ><legend>Insert Data InTo Student</legend>Click Insert Button To Insert Data 
	<input type='submit' value='Insert'></fieldset></form><br>";
	########################################  Devision 5  ##########################################
	echo "<form action='insertMrk.php' method='POST' target='_blank'>
	<fieldset ><legend>Insert Marks InTo Student</legend>";
	echo "Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo"Subject:";
	$use->getSubject();
	echo "Exam :";
	$use->getExam();      
	echo "<input type='submit' value='Insert'></fieldset></form><br>";
	########################################  Devision 6  ##########################################
	echo"<form action='set.php' method='POST' target='_blank'>
	<fieldset ><legend>Set Total-Average-Rank</legend>Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo "Exam :";
	$use->getExam();
	echo"<input type='submit' value='Set'></fieldset></form><br>";
	########################################  Devision 7  ##########################################
	echo "<form method='post' action='chng.php' target='_blank'><fieldset><legend>Change Class </legend>";
	echo "Grade:";
	$use->getGrade();
	echo "Class:";
	$use->getClass();
	echo "<input type='submit' name='submit4' value='change'></fieldset></form><br>";
	########################################  Devision 8  ##########################################
	echo "<form method='post' action='info.php' target='_blank'><fieldset><legend>Search For A Student </legend>";
	echo "Enter Student Name OR ADM Number <input type='text' name='text1' value='' > ";
	echo " <input type='submit' name='submit4' value='Search'></fieldset></form>";

}else{echo "<h1 align='center'>Username Or Password Incorrect!</h1><br><br><br><br><img src='failed.png' align='center'>";}

?>
</div>
</body>
</html>
