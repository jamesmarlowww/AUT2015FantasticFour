<!Doctype html>
<head>
	<title>Submit Practice</title>
	<link href="style.css" rel="stylesheet">
	<!--This is the creation of the header that is applied to ALL registered user's pages-->

	<?php include "header.php" ?>

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
	$table = mysqli_query($dbconn, "SELECT 1 FROM submittedPracticeInfo");
	if(!$table) {
		$sql = "CREATE TABLE IF NOT EXISTS submittedPracticeInfo(
 		title VARCHAR(50) NOT NULL,
 		author VARCHAR(50) NOT NULL,
 		credibilityrating VARCHAR(10),
 		whorated VARCHAR(200),
 		reasonforrating VARCHAR(500),
		researchlevel VARCHAR(1000),
		journaltitle VARCHAR(300),
		journalvolume VARCHAR(1000),
		journalpages VARCHAR(50),
		articleversion VARCHAR(50),
		year VARCHAR(50),
		researchpractice VARCHAR(50),
		researchdescription VARCHAR(1000),
		results VARCHAR(1000),
		benefits VARCHAR(1000),
		contextwho VARCHAR(1000),
		contextwhat VARCHAR(1000),
		contextwhere VARCHAR(1000),
		contextwhen VARCHAR(1000),
		contexthow VARCHAR(1000),
		contextwhy VARCHAR(1000),
		integrity VARCHAR(1000),
		confidencerating VARCHAR(10),
		researchquestion VARCHAR(1000),
		researchmethod VARCHAR(1000),
		researchmetrics VARCHAR(1000),
		participants VARCHAR(1000)
 		)";
 		mysqli_query($dbconn, $sql) or die(mysqli_error());	
	
 		
	}	
	//POST from form
	$title = ($_GET["title"]);
	$author = ($_GET["author"]);
	$journalname = ($_GET["journalname"]);
	$journalvolume = ($_GET["journalvolume"]);
	$year = ($_GET["year"]);
	$andor = ($_GET["andor"]);
	
	
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
	
	//Validation for author
	if (empty($author)) {
		$author = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $author)) {
			$output = $output . "Author uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Journal Name
	if (empty($journalname)) {
		$journalname = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $journalname)) {
			$output = $output . "Journal Name uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Journal Volume
	if (empty($journalvolume)) {
		$journalvolume = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $journalvolume)) {
			$output = $output . "Journal volume uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for what
	if (empty($year)) {
		$year = "%";
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $year)) {
			$output = $output . "year uses unallowed values *<br>";
			$pass = false;
		}	
	}
	
	if($andor == "and") {
		$sql_query = "SELECT * FROM submittedPracticeInfo WHERE title LIKE '%$title%' AND author LIKE '%$author%' AND journaltitle LIKE '%$journalname%' AND journalvolume LIKE '%$journalvolume%' AND year LIKE '%$year%'";
		
		$sqlresults = mysqli_query($dbconn, $sql_query);
		if($sqlresults) {	
			$output = "No results found <br>";
		} 
		$firstrun = true;
		while($row = mysqli_fetch_array($sqlresults,MYSQLI_ASSOC)) {
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
		}
			$output = "";
			echo "Title: ".$row['title']."<br>";
			echo "Author: ".$row['author']."<br>";
			echo "Journal Name: ".$row['journaltitle']."<br>";
			echo "Journal Volume: ".$row['journalvolume']."<br>";
			echo "Year: ".$row['year']."<br>";
			echo "--------------------------------------------------------------------------------<br>";
		
		
	} else {
		$sql_query = "SELECT * FROM submittedPracticeInfo WHERE title LIKE '%$title%' OR author LIKE '%$author%' OR journaltitle LIKE '%$journalname%' OR journalvolume LIKE '%$journalvolume%' OR year LIKE '%$year%'";
		
		$sqlresults = mysqli_query($dbconn, $sql_query);
		if($sqlresults) {	
			$output = "No results found <br>";
		} 
		$firstrun = true;
		while($row = mysqli_fetch_array($sqlresults,MYSQLI_ASSOC)) {
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
				echo "Author: ".$row['author']."<br>";
				echo "Journal Name: ".$row['journaltitle']."<br>";
				echo "Journal Volume: ".$row['journalvolume']."<br>";
				echo "Year: ".$row['year']."<br>";
				echo "--------------------------------------------------------------------------------<br>";
		}
		
	}
	
	
		
	echo $output;
?>
</div>
</body>
</html>
