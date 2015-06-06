<!Doctype html>

<head>

<title>Request Logon</title>

<link href="style.css" rel="stylesheet">

</head>

<!--This is the creation of the header that is applied to ALL pages for registered user-->

<?php include "header.php" ?>

<body>

    <div id="main" style="width:500px; margin:left;">
    
    
    <form action = "submitpracticeprocess.php" method = "POST">
    
    <!--Article title-->
    <p>Article Title:<br>
    <input type="text" name="title" size="50"/><br>
    
    <!--Research Author-->
    Article Author(s):<br>
    <input type="text" name="author" size="50"/><br><br>
    
    <!--Credibility Rating-->
    Credibility Rating:<br>
    Worst<--- 1  <input type="radio" name="one" value="one" checked>  
      2 <input type="radio" name="one" value="two" checked>
      3 <input type="radio" name="one" value="three" checked>
      4 <input type="radio" name="one" value="four" checked>
      5 <input type="radio" name="one" value="five" checked>--->Best<br>
      
    <!--Credibility Rating who-->  
    Who Rated Credibility?:<br>
    <input type="text" name="whocred" size="50"/><br>
    
    <!--Credibility Rating Reason-->
    Reason For Credibility Rating:<br>
    <input type="text" name="reasoncred" size="50"/><br>
    
    
    
    <!--Research level-->
    Research Level:<br>
    <select name="researchlevel">
    <option value="i">I</option>
    <option value="ii">II</option>
    <option value="iii">III</option>
    <option value="iv">IV</option>
    <option value="v">V</option>
    <option value="vi">VI</option>
    <option value="vii">VII</option></select> <a href="http://researchguides.ebling.library.wisc.edu/content.php?pid=325126&sid=2940230">help</a><br><br>
    
    <!--Journal-->
    Journal Name:<br>
    <input type="text" name="journtitle" size="50"/><br>
    Journal Volume:<br>
    <input type="text" name="journvol" size="50"/><br>
    Journal Page(s):<br>
    <input type="text" name="journpage" size="50"/><br>
    Article Version:<br>
    <input type="text" name="artversion" size="50"/><br>
    Year of Publish:<br>
    <input type="text" name="year" size="50"/><br>
    <br>
    
    <!--Practice being Researched-->
    Software Engineering Practice Being Researched:<br>
    <select name="engpractice">
    <option value="reqeng">Requirements Engineering</option>
    <option value="softdes">Software Design</option>
    <option value="softconst">Software Construction</option>
    <option value="softtest">Software Testing</option>
    <option value="softmain">Software Maintenance</option>
    <option value="softqual">Software Quality Management</option>
    <option value="softtools">Software Engineering Tools</option></select><br><br>
    
     <!--Description of being Researched-->
     Description Of Research:<br>
     <textarea rows=5 cols=50 name="descresearch"></textarea><br>
     Result From The Study:<br>
     <textarea rows=5 cols=50 name="resresearch"></textarea><br>
     Benefits/Outcomes From The Study:<br>
     <textarea rows=5 cols=50 name="beneresearch"></textarea><br>
     
     
     <br>Context Of The Study<br><br>
     
     <!--who,what etc-->
     Who Was Involved With The Study?:<br>
     <textarea rows=5 cols=50 name="whocont"></textarea><br>
     What Was Involved With The Study?:<br>
     <textarea rows=5 cols=50 name="whatcont"></textarea><br>
     Where Was The Study Performed?:<br>
     <textarea rows=5 cols=50 name="wherecont"></textarea><br>
     When Was The Study Performed?:<br>
     <textarea rows=5 cols=50 name="whencont"></textarea><br>
     How Was The Study Performed?:<br>
     <textarea rows=5 cols=50 name="howcont"></textarea><br>
     Why Was The Study Performed?:<br>
     <textarea rows=5 cols=50 name="whycont"></textarea><br>
     Integrity Of The Implementation Of The Practice/Method:<br>
     <textarea rows=5 cols=50 name="integ"></textarea><br>
     
     Confidence Rating Of Study:<br>
    Worst<--- 1  <input type="radio" name="two" value="one" checked>  
      2 <input type="radio" name="two" value="two" checked>
      3 <input type="radio" name="two" value="three" checked>
      4 <input type="radio" name="two" value="four" checked>
      5 <input type="radio" name="two" value="five" checked>--->Best<br>
     
     
   	<br><br>Research Design<br><br>
    
    Research Question:<br>
    <textarea rows=5 cols=50 name="resquest"></textarea><br>
    
    <!--Research Method-->
    Software Engineering Practice Being Researched:<br>
    <select name="resmethod">
    <option value="conexp">Controlled Experiment</option>
    <option value="casestud">Case Study</option>
    <option value="survresearch">Survey Research</option>
    <option value="ethno">Ethnographies</option>
    <option value="actres">Action Research</option>
    <option value="mixmeth">Mixed-Methods Approach</option>
    </select><br>
    Research Metrics:<br>
    <textarea rows=5 cols=50 name="resmet"></textarea><br>
    Nature Of Participants:<br>
	<select name="partic">
    <option value="stud">Student</option>
    <option value="researcher">Researcher</option>
    <option value="lect">Lecturer</option>
    <option value="other">Other</option>
    
    </select><br>
    <br>
<br>

    Please click on the Submit button to submit your practice for review.
    
    <input type = "submit" value = "Submit"/>
    
    </form>
    
    </div>

</body>

</html>
