<?php

class connect{
###################################### PUBLIC Function For Make Dropdown Menu(Subject) #####################################
	public function getSubject(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='subject' ><option value=''>Select Subject</option>";
	$result=$conn->query("SELECT * FROM subject");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$subjectid=$row["subid"];
				$subjectname=$row["subname"];
				echo "<option value=".$subjectid.">".$subjectname."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}
###################################### PUBLIC Function For Make Dropdown Menu(House) #####################################
	public function getHouse(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='house' ><option value=''>Select House</option>";
	$result=$conn->query("SELECT * FROM house");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$hid=$row["hid"];
				$housename=$row["housename"];
				echo "<option value=".$hid.">".$housename."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}
###################################### PUBLIC Function For Make Dropdown Menu(Leadership) #####################################
	public function getLead(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='lead' ><option value=''>Select Lead</option>";
	$result=$conn->query("SELECT * FROM leadership");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$leadid=$row["lid"];
				$leadname=$row["leadname"];
				echo "<option value=".$leadid.">".$leadname."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}
###################################### PUBLIC Function For Make Dropdown Menu(Exam) #####################################
	public function getExam(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='exam' ><option value=''>Select Exam</option>";
	$result=$conn->query("SELECT * FROM exam");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$examid=$row["eid"];
				$examname=$row["examname"];
				echo "<option value=".$examid.">".$examname."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}
###################################### PUBLIC Function For Make Dropdown Menu(Class) #####################################
	public function getClass(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='class' ><option value=''>Select Class</option>";
	$result=$conn->query("SELECT * FROM class");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$classid=$row["cid"];
				$classname=$row["classname"];
				echo "<option value=".$classid.">".$classname."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}

###################################### PUBLIC Function For Make Dropdown Menu(Grade) #####################################
public function getGrade(){
	$conn=new mysqli("localhost","id7353507_auth","19980821.","id7353507_db");
	if($conn->connect_error){die("Some Error".$conn->connect_error);}
	echo "<select name='grade' ><option value=''>Select Grade</option>";
	$result=$conn->query("SELECT * FROM grade");
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$gradeid=$row["gid"];
				$gradename=$row["gradename"];
				echo "<option value=".$gradeid.">".$gradename."</option>";

			}
		}

		else{
		}
		echo"</select>";
		$conn->close();
	}}

?>