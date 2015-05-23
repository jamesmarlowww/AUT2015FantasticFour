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
	// Variable that contains the title
	$title =$_POST["title"];
	// Variable that contains the description
	$desciption =$_POST["description"];
	// Variable that contains evidences
	$evidence =$_POST["evidence"];
	// Variable that contains why practice was use
	$why =$_POST["why"];
	// Variable that contains what practice was use
	$what =$_POST["what"];
	// Variable that contains how practice was use
	$how =$POST["how"];
	// Variable that contains the benefits and outcomes of using a particular practice
	$benefitsAndOutcomes =$POST["benefitsAndOutcomes"];
	// Variablethat contains the results of the practice
	$results =$POST["results"];
	// Function that returns true if the title is not null, and false if it is null.
	function checkTitleisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the descriptionis not null, and false if it is null.
	function checkDescriptionisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the evidence is not null, and false if it is null.
	function checkEvidenceisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the why is not null, and false if it is null.
	function checkWhyisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the what is not null, and false if it is null.
	function checkWhatisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the how is not null, and false if it is null.
	function checkHowisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	
	// Function that returns true if the benefits and outcomes is not null, and false if it is null.
	function checkBenefitsAndOutcomesisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}
	// Function that returns true if the results is not null, and false if it is null.
	function checkResultsisNotNull($stri){
	if(!$stri == ''){
 		return TRUE;}}


	// Gets the setup info
 	require_once ("settings.php");
	// The database table is allocated a variable
 	$sql_tble = "submittedPracticeInfo";
	// The sql statement that connects to the database
	$link =@mysqli_connect("host", "username", "password", "database") or die( " Unable to connect to server ");  
 	// Selects the database
	mysql_select_db($sql_tble);
	// The sql statement that will create the required table if it doesn't already exist.
 	$sql = "CREATE TABLE IF NOT EXISTS sumittedPracticeInfo(
 		Title VARCHAR(50) NOT NULL,
 		Description VARCHAR(1000) NOT NULL,
 		Evidence VARCHAR(1000),
 		Why VARCHAR(1000),
 		What VARCHAR(1000),
		How VARCHAR(1000),
		BenefitsAndOutcomes VARCHAR(1000),
		Results VARCHAR(1000)
 	)";
 
 	// Implements the create table sql statement from above. Return an error if it doesn't work.
 	if (!@mysqli_query($link, $sql)){
 		echo "Error in CREATE TABLE.";
	}
 
 	echo "<p></p>";
 
	// The sql statement that will insert the status information into the table 
 	$tableQuery = "insert into $sql_tble"
						."(Title, Description, Evidence, Why, What, How, BenefitsAndOutcomes, Results)"
					." values "
						."('$title', '$desciption', '$evidence', '$why','$what', '$how','$benefitsAndOutcomes', '$results')";
	// A conditional statement to check that all the requirements of a prsctice is meet.
	
	if(
		(checkTitleisNotNull($title) == TRUE) &&
		(checkDescriptionisNotNull($title) == TRUE) &&
		(checkEvidenceisNotNull($evidence) == TRUE) &&
		(checkWhyisNotNull($why) == TRUE) &&
		(checkTitleisNotNull$what == null)
		///
		
	{
 		// display a success message
		echo "<p><center>Your practice was successfully submitted for review.</center></p>";
		$theTableResult = mysqli_query($link, $tableQuery);
		if(!$theTableResult) {
		} else {
			// display a success message
			echo "<p><center>Thank you for submitting your practice.</center></p>";}
		}else{
			// display an error message when a practice requirement is not met 
			echo "<p>ERROR cannot submit your pratice:</p>";}
 
 		
	
 			// close the database connection
 			mysqli_close($link);
 	?>
</div>
</body>
</html>
