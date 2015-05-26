<!Doctype html>
<head>
	<title>Submit Practice</title>
	<link href="style.css" rel="stylesheet">
	<!--This is the creation of the header that is applied to ALL registered user's pages-->

	<?php include "registereduserheader.php" ?>

</head>
<body>
	<div id="main">
	<h1>Search Results</h1>

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
	$title = ($_GET["title"]);
	$description = ($_GET["description"]);
	$evidence = ($_GET["evidences"]);
	$why = ($_GET["why"]);
	$what = ($_GET["what"]);
	$how = ($_GET["how"]);
	$benefitsandoutcomes = ($_GET["benefits"]);
	$results = ($_GET["resultsofpractice"]);
	
	//check all fields for nulls and correct format
	$pass = true;
	//Validation for title
	if (empty($title)) {
		$title = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $title)) {
			$output = $output . "Title uses unallowed values *<br>";
			$pass = false;
		}	
	}
	
	//Validation for description
	if (empty($description)) {
		$description = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $description)) {
			$output = $output . "Description uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for evidence
	if (empty($evidence)) {
		$evidence = "";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $evidence)) {
			$output = $output . "Evidence uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for why
	if (empty($why)) {
		$why = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $why)) {
			$output = $output . "Why uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for what
	if (empty($what)) {
		$what = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $what)) {
			$output = $output . "What uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for how
	if (empty($how)) {
		$how = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $how)) {
			$output = $output . "How uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for benefits
	if (empty($benefitsandoutcomes )) {
		$benefitsandoutcomes = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $benefitsandoutcomes)) {
			$output = $output . "Benefits uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for results
	if (empty($results )) {
		$results = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $results)) {
			$output = $output . "Results uses unallowed values *<br>";
			$pass = false;
		}
	}
	
	
		//search 
		$sql_query = "SELECT * FROM submittedPracticeInfo WHERE title LIKE '%$title%' AND description LIKE '%$description%' AND evidence LIKE '%$evidence%' AND why LIKE '%$why%' AND what LIKE '%$what%' AND how LIKE '%$how%' AND benefitsandoutcomes LIKE '%$benefitsandoutcomes%' AND results LIKE '%$results%'";
		
		$sqlresults = mysqli_query($dbconn, $sql_query);
		if($sqlresults) {	
			$output = "No results found <br>";
		} 
		$firstrun = true;
		while($row = mysqli_fetch_array($sqlresults,MYSQLI_ASSOC)) {
			
			//save query feature.
			if($firstrun) {
				$numrows = mysqli_num_rows($sqlresults);
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				echo "This query gave ".$numrows." result/s would you like to save it?";
				echo'<form action = "savesearchprocess.php" method = "GET">';
				echo'Save query as(unique): <input type="text" name="savename">';
				echo'<input type="hidden" name = "link" value = "'.$actual_link.'">';
				echo'<input type ="submit" value = "Save">';
				echo'</form>';
				echo "<br><br>--------------------------------------------------------------------------------<br>";
				
				$firstrun = false;
			}
			$output = "";
			echo "Title: ".$row['title']."<br>";
			echo "Description: ".$row['description']."<br>";
			echo "Evidence: ".$row['evidence']."<br>";
			echo "Why: ".$row['why']."<br>";
			echo "What: ".$row['what']."<br>";
			echo "How: ".$row['how']."<br>";
			echo "Benefits: ".$row['benefitsandoutcomes']."<br>";
			echo "Results: ".$row['results']."<br>";
			echo "--------------------------------------------------------------------------------<br>";
		}	
	echo $output;
?>
</div>
</body>
</html>
