<!Doctype html>

<head>

<title>Saved Searches</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages-->

<?php include "registereduserheader.php" ?>

<body>
<?php
	//Output text
	$output = "";
	//Database connection
	include_once("settings.php");
	$dbconn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
	//If cannot connect, exit
	if(!$dbconn) {
		$output = $output . "Cannot connect to the database";
		echo $output;
		exit;
	}
	//Check table exists. If not, create one
	$table = mysqli_query($dbconn, "SELECT 1 FROM searchsave");

	if(!$table) {
		$sql = "CREATE TABLE IF NOT EXISTS searchsave(
 		savename VARCHAR(50) NOT NULL,
 		savequery TEXT
 		)";
 		mysqli_query($dbconn, $sql) or die(mysqli_error());	
	}	
	
	//POST from form
	
	$savename = ($_GET["savename"]);
	$savequery = ($_GET["link"]);
	
	//Whether the information should be inputted value
	$pass = true;
	//Validation for title
	if (empty($savename)) {
		$output = $output . "Query name is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $savename)) {
			$output = $output . "Query name uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Form validation
	if($pass) {
		
		//Check for duplicate entries in database
		$sql_valid = "SELECT savename FROM searchsave WHERE savename = '$savename'";
		echo $sql_valid;
		$sql_call = mysqli_query($dbconn, $sql_valid) or die(mysqli_error());
		//Call entry/ query
		if(mysqli_fetch_assoc($sql_call)) {
			$output = $output . "This Query name already exists<br> Please try another, could not save<br>";
		} else {
			$sql_post = "INSERT INTO searchsave VALUES('$savename', '$savequery')";
			$post_query = mysqli_query($dbconn, $sql_post) or die(mysqli_error());
			if($post_query) {
				$output = $output . "Successfully entered status!";
			}
		}
	}
	
?>


</body>

</html>