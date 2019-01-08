<?php require_once('Connections/student_projectdb.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO student_registration_tb (Student_First_name, Student_Last_name, Student_Registration_number, Academic_Session, Phone_number, Date_of_birth) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Student_First_name'], "text"),
                       GetSQLValueString($_POST['Student_Last_name'], "text"),
                       GetSQLValueString($_POST['Student_Registration_number'], "text"),
                       GetSQLValueString($_POST['Academic_Session'], "text"),
                       GetSQLValueString($_POST['Phone_number'], "text"),
                       GetSQLValueString($_POST['Date_of_birth'], "text"));

  mysql_select_db($database_student_projectdb, $student_projectdb);
  $Result1 = mysql_query($insertSQL, $student_projectdb) or die(mysql_error());

  $insertGoTo = "student.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>STUDENT DATABASE</title>
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
.style1 {color: #FFFFFF}
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
      <td height="48" colspan="2" bgcolor="#0000FF"><a href="home.php">HOME</a> <span class="style3 style1">|</span> <a href="student.php">STUDENTS </a><span class="style3 style1">|</span><a href="past_projects.php"> PROJECTS RECORD </a> <span class="style3 style1">| </span><a href="upload.php">UPLOAD PROJECT </a> <span class="style3 style1">|</span> <a href="search.php">PROJECT SEARCH </a><span class="style3 style1"> | </span><a href="index.php">LOGOUT</a></td>
    </tr>
    <tr>
      <td colspan="2"><img src="banner.jpg" width="850" height="120" /></td>
    </tr>
    <tr>
      <td width="671" height="95" valign="top"><h1>FINAL YEAR STUDENT RECORD </h1>
        <p>This page is where all projects documented in the department database can be retrived </p>        <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
      </form>
        <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Student First name:</td>
              <td><input type="text" name="Student_First_name" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Student Last name:</td>
              <td><input type="text" name="Student_Last_name" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Student Registration number:</td>
              <td><input type="text" name="Student_Registration_number" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Academic Session:</td>
              <td><input type="text" name="Academic_Session" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Phone number:</td>
              <td><input type="text" name="Phone_number" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Date of birth:</td>
              <td><input type="text" name="Date_of_birth" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Save record"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form2">
        </form>
      <p>&nbsp;</p></td>
      <td width="176" rowspan="3" bgcolor="#0000FF"><p><strong><font color="#FFFFFF">Our Objective</font></strong></p>
        <p><font color="#FFFFFF">1. Creating a robust database that will help keep information about all student projects in the department of Computer Science.</font></p>
        <p><font color="#FFFFFF"> 2. Create a robust application where project informaton (title, case study, area of specilization etx) and session can be easily accessed.. </font></p>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="50" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" name="form1">
        <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>  </td>
    </tr>
    <tr>
      <td height="37" colspan="2"><div align="center">Copyright &copy; 2018 All rights reserved</div></td>
    </tr>
  </table>
</div>
</body>
</html>