<!Doctype html>

<head>

<title>New Search</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages-->

<?php include "registereduserheader.php" ?>

<body>
<?php
echo "Search using any combinations of the below fields!";
?>
<div id="main" style="width:500px; margin:left;">


<form action = "newsearchprocess.php" method = "GET">

<!--User inputs title-->
<p> Title: <input type="text" maxlength="50" name="title" /></p>

<!--User inputs description-->
<p> Description: <input type="text" maxlength="300" name="description" /></p>

<!--User inputs evidences-->
<p> Evidence/s: <input type="text" maxlength="1000" name="evidences" /></p>

<!--User inputs why practice was use-->
<p> Why practice was use: <input type="text" maxlength="1000" name="why" /></p>

<!--User inputs what practice was use-->
<p> What practice was use: <input type="text" maxlength="1000" name="what" /></p>

<!--User inputs how practice was use-->
<p> How practice was use: <input type="text" maxlength="1000" name="how" /></p>

<!--User inputs the benefits and outcomes of using a particular practice-->
<p> Benefits and outcomes of using a particular practice: <input type="text" maxlength="1000" name="benefits" /></p>

<!--User inputs the results of using a particular practice-->
<p> Results of using a particular practice: <input type="text" maxlength="1000" name="resultsofpractice" /></p>

<p>Please click on the search button to search for your queries</p>

<input type = "submit" value = "Search"/>

</div>

</body>

</html>