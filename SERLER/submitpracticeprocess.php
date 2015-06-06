<!Doctype html>
<head>
	<title>Submit Practice</title>
	<link href="style.css" rel="stylesheet">
	<!--This is the creation of the header that is applied to ALL registered user's pages-->

	<?php include "header.php" ?>

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
		journalvolume VARCHAR(5),
		journalpages VARCHAR(50),
		articleversion VARCHAR(50),
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
	$title = ($_POST["title"]);
	$author = ($_POST["author"]);
	$credebilityRating = ($_POST["credebilityRating"]);
	$whoRated = ($_POST["whocred"]);
	$reasonForRating = ($_POST["reasoncred"]);
	$reasearchLevel = ($_POST["researchlevel"]);
	$journalTitle = ($_POST["journtitle"]);
	$journalVolume = ($_POST["journvol"]);
	$journalPages = ($_POST["journpage"]);
	$articleVersion = ($_POST["artversion"]);
	$researchPractice = ($_POST["engpractice"]);
	$researchDescription = ($_POST["descresearch"]);
	$results = ($_POST["resresearch"]);
	$benefits = ($_POST["beneresearch"]);
	$contextWho = ($_POST["whocont"]);
	$contextWhat = ($_POST["whatcont"]);
	$contextWhere = ($_POST["wherecont"]);
	$contextWhen = ($_POST["whencont"]);
	$contextHow = ($_POST["howcont"]);
	$contextWhy = ($_POST["whycont"]);
	$integrity = ($_POST["integ"]);
	$confidenceRating = ($_POST["confidenceRating"]);
	$researchQuestion = ($_POST["resquest"]);
	$researchMethod = ($_POST["resmethod"]);
	$researchMetrics = ($_POST["resmet"]);
	$researchMethod = ($_POST["resmethod"]);
	$participants = ($_POST["partic"]);
	
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
	//Validation for author
	if (empty($author)) {
		$output = $output . "Author is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $title)) {
			$output = $output . "Author uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for who rated 
	if (empty($whoRated)) {
		$output = $output . "Who rated is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $whoRated)) {
			$output = $output . "Who rated uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for credebility rating reasons
	if (empty($reasonForRating)) {
		$output = $output . "Reasons for credebility rating is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $reasonForRating)) {
			$output = $output . "Reasons for credebility rating uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for research level
	if (empty($reasearchLevel)) {
		$output = $output . "Research level is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $reasearchLevel)) {
			$output = $output . "Research level uses unallowed values *<br>";
			$pass = false;
		}	
	}
	
	//Validation for journal name
	if (empty($journalTitle)) {
		$output = $output . "Journal name is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $journalTitle)) {
			$output = $output . "Journal name uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for journal volume
	if (empty($journalVolume)) {
		$output = $output . "Journal volume is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $journalVolume)) {
			$output = $output . "Journal volume uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for journal page
	if (empty($journalPages)) {
		$output = $output . "Journal page is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $journalPage)) {
			$output = $output . "Journal page uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for journal page
	if (empty($articleVersion)) {
		$output = $output . "Article version is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $articleVersion)) {
			$output = $output . "Article version uses unallowed values *<br>";
			$pass = false;
		}	
	}
	
	//Validation for practice being researched
	if (empty($researchPractice)) {
		$output = $output . "Practice being researched is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $researchPractice)) {
			$output = $output . "Practice being researched uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for description
	if (empty($researchDescription)) {
		$output = $output . "Description is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $researchDescription)) {
			$output = $output . "Description uses unallowed values *<br>";
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
	//Validation for benefits
	if (empty($benefits)) {
		$output = $output . "Benefits are required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $benefits)) {
			$output = $output . "Benefits uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for who
	if (empty($contextWho)) {
		$output = $output . "Who is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextWho)) {
			$output = $output . "Who uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for what
	if (empty($contextWhat)) {
		$output = $output . "What is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextWhat)) {
			$output = $output . "What uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for where
	if (empty($contextWhere)) {
		$output = $output . "Where is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextWhere)) {
			$output = $output . "Where uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for when
	if (empty($contextWhen)) {
		$output = $output . "When is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextWhen)) {
			$output = $output . "When uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for how
	if (empty($contextHow)) {
		$output = $output . "How is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextHow)) {
			$output = $output . "How uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for why
	if (empty($contextWhy)) {
		$output = $output . "Why is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $contextWhy)) {
			$output = $output . "Why uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for integrity
	if (empty($integrity)) {
		$output = $output . "Integrity is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $integrity)) {
			$output = $output . "Integrity uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for Research Question
	if (empty($researchQuestion)) {
		$output = $output . "Research Question is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $researchQuestion)) {
			$output = $output . "Research Question uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for Research method
	if (empty($researchMethod)) {
		$output = $output . "Research Method is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $researchMethod)) {
			$output = $output . "Research method uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for Research metrics
	if (empty($researchMetrics)) {
		$output = $output . "Research metrics is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $researchMetrics)) {
			$output = $output . "Research metrics uses unallowed values *<br>";
			$pass = false;
		}	
	}
	//Validation for Research participants
	if (empty($participants)) {
		$output = $output . "Research participants is required *<br>";
		$pass = false;
	} else {
		$pattern = "/[^A-Za-z0-9.,?! ]/";
		if(preg_match($pattern, $participants)) {
			$output = $output . "Research participants uses unallowed values *<br>";
			$pass = false;
		}	
	}
	echo $output;
	
	
	//Form validation
	if($pass) {
		$output = $output . "All input is in correct format.<br>";
	echo $output;
		
		//Call entry/ query
		
		
			$sql_post = "INSERT INTO submittedPracticeInfo(title, author, credibilityrating, whorated, reasonforrating, researchlevel, journaltitle, journalvolume, journalpages, articleversion, researchpractice, researchdescription, results, benefits, contextwho, contextwhat, contextwhere, contextwhen, contexthow, contextwhy, integrity, confidencerating, researchquestion, researchmethod, researchmetrics, participants) 
			VALUES('$title', '$author', '$credebilityRating', '$whoRated', '$reasonForRating', '$reasearchLevel', '$journalTitle', '$journalVolume', '$journalPages', '$articleVersion', '$researchPractice', '$researchDescription', '$results', '$benefits', '$contextWho', '$contextWhat', '$contextWhere', '$contextWhen', '$contextHow', '$contextWhy', '$integrity', '$confidenceRating', '$researchQuestion', '$researchMethod', '$researchMetrics', '$participants')";
		
			
			
			$post_query = mysqli_query($dbconn, $sql_post) or die(mysqli_error());
			if($post_query) {
				$output = $output . "Successfully entered status!";
			}
				
		
	
	
	

		
 		
	}
	echo $output;
?>
</div>
</body>
</html>