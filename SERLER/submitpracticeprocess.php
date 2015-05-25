<!Doctype html>
<head>
	<title>Submit Practice</title>
	<link href="style.css" rel="stylesheet">
	<!--This is the creation of the header that is applied to ALL registered user's pages-->

	<?php include "registereduserheader.php" ?>

</head>
<body>
	<div id="main">
	<h1>Submitting Practice</h1>

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
	$table = mysqli_query($dbconn, "SELECT 1 FROM sumittedPracticeInfo");
	if(!$table) {
		$sql = "CREATE TABLE IF NOT EXISTS submittedPracticeInfo(
 		title VARCHAR(50) NOT NULL,
 		description VARCHAR(1000) NOT NULL,
 		evidence VARCHAR(1000),
 		why VARCHAR(1000),
 		what VARCHAR(1000),
		how VARCHAR(1000),
		benefitsandoutcomes VARCHAR(1000),
		results VARCHAR(1000)
 		)";
 		mysqli_query($dbconn, $sql) or die(mysqli_error());	
	}	
	//POST from form
	$title = ($_POST["title"]);
	$description = ($_POST["description"]);
	$evidence = ($_POST["evidences"]);
	$why = ($_POST["why"]);
	$what = ($_POST["what"]);
	$how = ($_POST["how"]);
	$benefitsandoutcomes = ($_POST["benefits"]);
	$results = ($_POST["resultsofpractice"]);
	
	//Whether the information should be inputted value
	$pass = true;
	//Validation for title
	if (empty($title)) {
		$output = $output . "Title is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $title)) {
			$output = $output . "Title uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for description
	if (empty($description)) {
		$output = $output . "Description is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $description)) {
			$output = $output . "Description uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for evidence
	if (empty($evidence)) {
		$output = $output . "Evidence is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $evidence)) {
			$output = $output . "Evidence uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for why
	if (empty($why)) {
		$output = $output . "Why is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $why)) {
			$output = $output . "Why uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for what
	if (empty($what)) {
		$output = $output . "What is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $what)) {
			$output = $output . "What uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for how
	if (empty($how)) {
		$output = $output . "How is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $how)) {
			$output = $output . "How uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for benefits
	if (empty($benefitsandoutcomes )) {
		$output = $output . "Benefits are required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $benefitsandoutcomes)) {
			$output = $output . "Benefits uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for results
	if (empty($results )) {
		$output = $output . "Results are required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $results)) {
			$output = $output . "Results uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Form validation
	if($pass) {
		$output = $output . "All input is in correct format.<br>";
		//Check for duplicate entries in database
		$sql_valid = "SELECT title FROM submittedPracticeInfo WHERE title = '$title'";
		$sql_call = mysqli_query($dbconn, $sql_valid) or die(mysqli_error());
		//Call entry/ query
		if(mysqli_fetch_assoc($sql_call)) {
			$output = $output . "This title already exists<br> Please try another, could not save<br>";
		} else {
			$sql_post = "INSERT INTO submittedPracticeInfo VALUES('$title', '$description', '$evidence', '$why', '$what', '$how', 	'$benefitsandoutcomes', '$results')";
			$post_query = mysqli_query($dbconn, $sql_post) or die(mysqli_error());
			if($post_query) {
				$output = $output . "Successfully entered practice!";
			}
		}
	}
	echo $output;
?>
</div>
</body>
</html>
