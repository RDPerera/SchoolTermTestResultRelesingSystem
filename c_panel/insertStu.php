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
	<title>insertStu</title>
</head>
<body>
	
<form action='insertStu.php' method='POST'><fieldset >
	<legend>Insert Data</legend>
	<table>
		<tr><td>Student Adm No* :</td><td><input type="text" name="admNo"></td></tr>
		<tr><td>Student Full Name :</td><td><input type="text" name="fname"></td></tr>
		<tr><td>Student Address:</td><td><input type="text" name="Address"></td></tr>
		<tr><td>Fixed Telephone No:</td><td><input type="text" name="ftel"></td></tr>
		<tr><td>Mobile Telephone No:</td><td><input type="text" name="mtel"></td></tr>
		<tr><td>Date Of Birth:</td><td><input type="date" name="dob" <?php if(isset($_POST["submitx"])){echo " value=".$_POST["dob"];}?>></td></tr>
		<tr><td>e-Mail:</td><td><input type="text" name="email"></td></tr>
		<tr><td><fieldset><legend>Parent Details</legend><table>
			<tr><td>Parent Name:</td><td><input type="text" name="pname"></td></tr>
			<tr><td>Occupation:</td><td><input type="text" name="pwork"></td></tr>
			<tr><td>Mobile:</td><td><input type="text" name="pmtel"></td></tr>
			<tr><td>Office Tel:</td><td><input type="text" name="potel"></td></tr>			
			<tr><td>Relation:</td><td><input type="text" name="prelation"<?php if(isset($_POST["submitx"])){echo " value=".$_POST["prelation"];}?>></td></tr></table>
		</fieldset></td><td><fieldset><legend>Parent Details ll</legend>
			<table>
			<tr><td>Parent Name:</td><td><input type="text" name="pname2"></td></tr>
			<tr><td>Occupation:</td><td><input type="text" name="pwork2"></td></tr>
			<tr><td>Mobile:</td><td><input type="text" name="pmtel2"></td></tr>
			<tr><td>Office Tel:</td><td><input type="text" name="potel2"></td></tr>			
			<tr><td>Relation:</td><td><input type="text" name="prelation2"<?php if(isset($_POST["submitx"])){echo " value=".$_POST["prelation2"];}?>></td></tr></table>
		</fieldset></td></tr>
		<tr><td>House*:</td><td>
						<?php include ("connect.class.php");
						$use=new connect();$use->getHouse();?></td></tr>
		<tr><td>Leadership:</td><td>
						<?php $use->getLead();?></td></tr>				
		<tr><td>Status:</td><td><input type="text" name="status" value="N/A"></td></tr>
		<tr><td>Grade*:
			<?php
			$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
			if($conn->connect_error){die("Some Error".$conn->connect_error);}
			if(isset($_POST["submitx"])){echo "<select name='grade' ><option value='".$_POST["grade"]."'>Prev Grade</option>";}
			else{echo "<select name='grade' ><option value=''>Select Grade</option>";}
			$result=$conn->query("SELECT * FROM grade");
				if ($result->num_rows>0) {
					while ($row=$result->fetch_assoc()) {
						$gid=$row["gid"];
						$gradename=$row["gradename"];
						echo "<option value=".$gid.">".$gradename."</option>";
				}
			}
			echo"</select>";
			$conn->close();?>
			</td><td>
			Class*:
			<?php
			$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
			if($conn->connect_error){die("Some Error".$conn->connect_error);}
			if(isset($_POST["submitx"])){echo "<select name='class' ><option value='".$_POST["class"]."'>Prev Class</option>";}
			else{echo "<select name='class' ><option value=''>Select Class</option>";}
			$result=$conn->query("SELECT * FROM class");
				if ($result->num_rows>0) {
					while ($row=$result->fetch_assoc()) {
						$cid=$row["cid"];
						$classname=$row["classname"];
						echo "<option value=".$cid.">".$classname."</option>";
				}
			}
			echo"</select>";
			$conn->close();?>
				
			</td></tr>
			
				<?php 
				$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
				if($conn->connect_error){die("Some Error".$conn->connect_error);}
				for ($i=1;$i<17;$i++){
				$strin="subject".$i;
				echo "<tr><td>Subject  ".$i."</td><td><select name=".$strin."><option value=''>None</option>";
				$result=$conn->query("SELECT * FROM subject");
					if ($result->num_rows>0) {
						while ($row=$result->fetch_assoc()) {
							$subid=$row["subid"];
							$subname=$row["subname"];
							$s1="";
							if(isset($_POST["submitx"])){if ($_POST[$strin] ==$subid){$s1=' selected="selected"';}}
							echo "<option value=".$subid.$s1.">".$subname."</option>";

						}
					}
					echo "</select></td></tr>";}
		$conn->close();?>
		<tr><td>Enter Number Of Subject You Used(important)</td><td><input type="text" name="numofsub" <?php if(isset($_POST["submitx"])){echo "value='".$_POST["numofsub"]."'";}?>></td></tr>
			<tr><td></td><td align='righ'><input type='submit' name='submitx' value='Submit'></td></tr></table></fieldset>
</form>
<form method="post" action="insertStu.php"> 
			<fieldset><legend>Delete Data</legend>Student Addmission Number <input type="text" name="adm" value=" ADM Number"> <input type="submit" name="submity" value="Delete All Data About Him"></fieldset></form>
<?php
$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
if($conn->connect_error){die("Some Error".$conn->connect_error);}
if (isset($_POST["submitx"])&&$_POST["admNo"]!="") {
	$class=ucwords($_POST["class"]);
	$admNo=$_POST["admNo"];
	$ftel=$_POST["ftel"];
	$dob=$_POST["dob"];
	$email=$_POST["email"];
	$grade=$_POST["grade"];
	$numOfSub=$_POST["numofsub"];
	$fname=ucwords($_POST["fname"]);
	$Address=ucwords($_POST["Address"]);
	$mtel=$_POST["mtel"];
	$pname=$_POST["pname"];
	$pwork=$_POST["pwork"];
	$potel=$_POST["potel"];
	$pmtel=$_POST["pmtel"];
	$prelation=$_POST["prelation"];
	$pname2=$_POST["pname2"];
	$pwork2=$_POST["pwork2"];
	$potel2=$_POST["potel2"];
	$pmtel2=$_POST["pmtel2"];
	$prelation2=$_POST["prelation2"];
	$hid=$_POST["house"];
	$lid=$_POST["lead"];
	$status=$_POST["status"];
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
		if($hid==""){$hid=1;}
		if($gid!=""&&$cid!=""&&$_POST["numofsub"]!=""&&$_POST["numofsub"]!="0"){
		if($conn->query("INSERT INTO student (admNo,fname,dob,address,ftel,mtel,gid,cid,email,status,hid)VALUES ('".$admNo."','".$fname."','".$dob."','".$Address."','".$ftel."','".$mtel."','".$grade."','".$class."','".$email."','".$status."','".$hid."')")){echo "Row Inserted !";}else{echo "Faild !".$conn->error();}
		$pid1=$admNo."a";
		$pid2=$admNo."b";
		if($pname!=""){
		if($conn->query("INSERT INTO gradient VALUES ('".$pid1."','".$pname."','".$pwork."','".$pmtel."','".$potel."')")){echo "@@";}else{echo "Faild !".$conn->error();}
		if($conn->query("INSERT INTO parent VALUES ('".$admNo."','".$pid1."','".$prelation."')")){echo "@@";}else{echo "Faild !".$conn->error();}}
		if($pname2!=""){
		if($conn->query("INSERT INTO gradient VALUES ('".$pid2."','".$pname2."','".$pwork2."','".$pmtel2."','".$potel2."')")){echo "@@";}else{echo "Faild !".$conn->error();}
		if($conn->query("INSERT INTO parent VALUES ('".$admNo."','".$pid2."','".$prelation2."')")){echo "@@";}else{echo "Faild !".$conn->error();}}
		if ($lid!=""){
		if($conn->query("INSERT INTO studentleader VALUES ('".$admNo."','".$lid."')")){echo "@@";}else{echo "Faild !".$conn->error();}}
		$sid=$admNo;

		for ($i=1;$i<$numOfSub+1;$i++){	
			$text1="subject".$i;
			$mysubjectid=$_POST[$text1];
		if($conn->query("INSERT INTO studentsubject(admNo,subid)VALUES ('".$sid."','".$mysubjectid."')")){echo "#";}else{echo "Faild !".$conn->error();}}}

		
}
if (isset($_POST["submity"])&&$_POST["adm"]!=" ADM Number") {
	if($conn->connect_error){die("Connction Error".$conn->connect_error);}
	$sid=$_POST["adm"];
	$pid1=$sid."a";
	$pid2=$sid."b";
	if($conn->query("DELETE FROM studentmarks WHERE admNo='".$sid."'")){echo "#8";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM studentrank WHERE admNo='".$sid."'")){echo "#7";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM studenttotal WHERE admNo='".$sid."'")){echo "#6";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM studentavg WHERE admNo='".$sid."'")){echo "#5";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM studentleader WHERE admNo='".$sid."'")){echo "#4";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM parent WHERE admNo='".$sid."'")){echo "#3";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM gradient WHERE pid='".$pid1."' OR pid='".$pid2."'")){echo "#2";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM studentsubject WHERE admNo='".$sid."'")){echo "#1";}else{echo "Delete Faild !".$conn->error();}
	if($conn->query("DELETE FROM student WHERE admNo='".$sid."'")){echo "All About ".$_POST["adm"]."Were Deleted !";}else{echo "Delete Faild !".$conn->error();}
	
	}
$conn->close();?>

</body>
</html>