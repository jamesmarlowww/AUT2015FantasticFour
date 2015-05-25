<!Doctype html>

<head>

<title>Saved Searches</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages-->

<?php include "registereduserheader.php" ?>

<body>
<?php

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


	$sql_query = "SELECT * FROM searchsave";
	
	$sqlresults = mysqli_query($dbconn, $sql_query);
		if($sqlresults) {	
			$output = "No results found <br>";
		}
	echo "Saved Searches: <br>";	
	while($row = mysqli_fetch_array($sqlresults,MYSQLI_ASSOC)) {
		
		
		echo '<a href="' . $row['savequery'] . '">'. $row['savename'] . '</a>';
		echo "<br>";
	}

			

?>


</body>

</html>