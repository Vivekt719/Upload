<?php
$servername = "localhost";
$username = "root";
$password = "Jairamji123$";

// Create connection
$conn = new mysqli($servername, $username, $password, "demo");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = $nameErr = "";
$phone = "";

// check state
if (isset($_REQUEST['submit'])) {
	// validate data
	
	$allGood = true;
	
	$name = $_REQUEST['name'];
	if (empty($name)) {
		$nameErr = "Name is required";
		$allGood = false;
	}
	
	$phone = $_REQUEST['phone'];
	
	// if data validated
	if ($allGood) {
		// insert record
		$sql = "insert into gladiator (name, phone) values ('$name', '$phone')";
		if ($conn->query($sql)) {
			die("data was inserted");
		} else {
			die($conn->error);
		}
	}
}

// state 1 - display form
print "<form method='post' action=''>
Name <input type = 'text' name='name' value='$name' />$nameErr<br />
Phone <input type='text' name='phone' value='$phone' /><br />
<input type='submit'  name='submit' value='Save record' />
</form>";

?>

