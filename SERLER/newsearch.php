<!Doctype html>

<head>

<title>New Search</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages-->

<?php include "header.php" ?>

<body>

<div id="main" style="width:500px; margin:left;">


<form action = "newsearchprocess.php" method = "GET">

<!--User inputs title-->
Article Title:<br> <input type="text" maxlength="50" name="title" /><br>

<!--User inputs author-->
Article Author:<br> <input type="text" maxlength="300" name="author" /><br>

<!--User inputs Journal Name-->
Journal Name:<br> <input type="text" maxlength="1000" name="journalname" /><br>

<!--User inputs journal volume -->
Journal Volume:<br> <input type="text" maxlength="1000" name="journalvolume" /><br>


Year Of Publish:<br> <input type="text" maxlength="1000" name="year" /><br>

How To Search:<br>
 <select name="andor">
    <option value="and">All Fields Matching(AND)</option>
    <option value="or">Atleast One Field Matching(OR)</option>
    </select>


<p>Please click on the search button to search for your queries</p>

<input type = "submit" value = "Search"/>
</form>

</div>

</body>

</html>