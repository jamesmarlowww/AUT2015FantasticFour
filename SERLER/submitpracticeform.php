<!Doctype html>

<head>

<title>Request Logon</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages for registered user-->

<?php include "registereduserheader.php" ?>

<body>

<div id="main" style="width:500px; margin:auto;">


<form action = "submitpracticeprocess.php" method = "POST">

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

<p>Please click on the Submit button to submit your practice for review.</p>

<input type = "submit" value = "Submit"/>

</div>

</body>

</html>
