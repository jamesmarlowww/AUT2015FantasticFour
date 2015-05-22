<!Doctype html>

<head>

<title>Submit Practice</title>

<link href="style.css" rel="stylesheet">
</head>

<!--This is the creation of the header that is applied to ALL pages-->

<?php include "header.php" ?>

<body>
<h4>Submit Practice Form</h4>
<form action = "submitpracticeprocess.php" method = "post">
		Title:
		<input type="text" name="title"/><p>
        Description:
        <input type="text" name="description"/><p>
        Evidence:
        <input type="evidence" name="description"/><p>
        Why Practice was used:
      	<input type="why" name="description"/><p>
        What Practice was used:
      	<input type="what" name="description"/><p>
        Where Practice was used:
      	<input type="where" name="description"/><p>
        How Practice was used:
      	<input type="how" name="description"/><p>
        Benefits and outcomes of the practice:
      	<input type="benefits" name="description"/><p>
      	 Results of using the practice:
      	<input type="why" name="description"/><p>
        
        
		<input type = "submit" value = "Submit For Review"/>
	</form>
    
    
</body>