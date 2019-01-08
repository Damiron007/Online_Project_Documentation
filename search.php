<?php require_once('Connections/student_projectdb.php'); ?>
<?php
mysql_select_db($database_student_projectdb, $student_projectdb);
$query_rsSearch = "SELECT * FROM project_management_tb";
$rsSearch = mysql_query($query_rsSearch, $student_projectdb) or die(mysql_error());
$row_rsSearch = mysql_fetch_assoc($rsSearch);
$totalRows_rsSearch = mysql_num_rows($rsSearch);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>SEARCH PROJECTS</title>
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
	background-color: #999;
}
a {
	font-size: 14px;
	color: #FFF;
	font-weight: bold;
}
a:hover {
	color: #F00;
	text-decoration: none;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #FFF;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {font-weight: bold}
.style4 {color: #0000FF}
.style6 {font-size: 16px}
-->
</style>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body bgcolor="#FFFFFF">
<div align="center">
  <table width="858" height="518" border="1" bgcolor="#FFFFFF">
    <!--DWLayoutTable-->
    <tr>
      <td height="48" colspan="2" bgcolor="#0000FF"><a href="home.php">HOME</a> <span class="style3 style1">|</span> <a href="student.php">STUDENTS </a><span class="style1"><strong>|</strong></span> <strong><a href="past_projects.php"></a></strong><a href="past_projects.php">PAST PROJECTS </a> <span class="style1">| </span><a href="upload.php">UPLOAD PROJECT </a> <span class="style1">|</span> <a href="search.php">PROJECT SEARCH </a><span class="style1"> | </span><a href="index.php">LOGOUT</a></td>
    </tr>
    <tr>
      <td colspan="2"><img src="banner.jpg" width="850" height="120" /></td>
    </tr>
    <tr>
      <td width="671" height="95" valign="top"><h1>SEARCH UPLOADED PROJECT</h1>
        <p>Check newly uploaded  project for original work </p>        
		<form action="results.php" method="POST" name="form1" id="form1">
		<label></label>
		</form></td>
      <td width="176" rowspan="3" bgcolor="#0000FF"><p><strong><font color="#FFFFFF">Our Objective</font></strong></p>
        <p><font color="#FFFFFF">1. Creating a robust database that will help search any information on past studen project </font></p>
        <p><font color="#FFFFFF">2. Create a robust application where student projects can be easily accessed.. </font></p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="50" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" name="form1">
        <p>
          <input type="hidden" name="MM_insert" value="form1" />
        </p>
        <p>Cross check original work </p>
        <p>
          <textarea name="textarea" cols="50" rows="20"></textarea>
        </p>
        <p align="center">Use <a href="Plagiarism-detect.com" class="style4">External Pliagiarism Checker</a><strong> |</strong> <a href="http://www.scanmyessay.com/" class="style4">Pliagiarism Checker 2 <span class="style6">|</span> </a><a href="http://turnitin.com" class="style4">Pliagiarism Checker 3</a> </p>
        </form>
        <h3 align="center"><a href="Upload File/view.php" class="style4">Check uploaded project work</a> </h3>
        <p>&nbsp;</p>        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="37" colspan="2"><div align="center">Copyright &copy; 2018 All rights reserved</div></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($rsSearch);
?>