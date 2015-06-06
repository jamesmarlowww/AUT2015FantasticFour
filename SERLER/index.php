<!Doctype html>
<head>
	<title>SERLER Home Page</title>
	<link href="style.css" rel="stylesheet">
	
</head>

<!--This is the header -->
<?php include "header.php" ?>
<body>
	
	
	

	<!--This is the search line, with text box and search button.-->
	<form action = "searchstatusprocess.php" method = "get">
		<p>Practice:
		<input type="text" name="searchPractice"/>
		<input type = "submit" value = "Search"/>
	</form>

</body>
</html>
