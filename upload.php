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
  $insertSQL = sprintf("INSERT INTO project_upload (Student_name, Project_topic, Reg_number, Supervisor_name, Project_type, Academic_session, filename) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Student_name'], "text"),
                       GetSQLValueString($_POST['Project_topic'], "text"),
                       GetSQLValueString($_POST['Reg_number'], "text"),
                       GetSQLValueString($_POST['Supervisor_name'], "text"),
                       GetSQLValueString($_POST['Project_type'], "text"),
                       GetSQLValueString($_POST['Academic_session'], "text"),
                       GetSQLValueString($_POST['filename'], "text"));

  mysql_select_db($database_student_projectdb, $student_projectdb);
  $Result1 = mysql_query($insertSQL, $student_projectdb) or die(mysql_error());

  $insertGoTo = "upload.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO project_management_tb (Student_name, Student_Regno, Project_title, Case_study, Student_Phone_no, Academic_session, Project_supervisor, Type_of_project, Nature_of_project, Date_of_submission) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Student_name'], "text"),
                       GetSQLValueString($_POST['Student_Regno'], "text"),
                       GetSQLValueString($_POST['Project_title'], "text"),
                       GetSQLValueString($_POST['Case_study'], "text"),
                       GetSQLValueString($_POST['Student_Phone_no'], "text"),
                       GetSQLValueString($_POST['Academic_session'], "text"),
                       GetSQLValueString($_POST['Project_supervisor'], "text"),
                       GetSQLValueString($_POST['Type_of_project'], "text"),
                       GetSQLValueString($_POST['Nature_of_project'], "text"),
                       GetSQLValueString($_POST['Date_of_submission'], "text"));

  mysql_select_db($database_student_projectdb, $student_projectdb);
  $Result1 = mysql_query($insertSQL, $student_projectdb) or die(mysql_error());

  $insertGoTo = "upload.php";
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
<title>UPLOAD PROJECTS</title>
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
.style1 {color: #0000FF}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
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
      <td height="48" colspan="2" bgcolor="#0000FF"><a href="home.php">HOME</a> <span class="style2">|</span> <a href="student.php">STUDENTS </a><span class="style2">|</span><a href="past_projects.php"> PROJECTS RECORD </a> <span class="style2">| </span><a href="upload.php">UPLOAD PROJECT </a> <span class="style2">|</span> <a href="search.php">PROJECT SEARCH </a><span class="style2"> | </span><a href="index.php">LOGOUT</a></td>
    </tr>
    <tr>
      <td colspan="2"><img src="banner.jpg" width="850" height="120" /></td>
    </tr>
    <tr>
      <td width="694" height="420" valign="top"><h1>UPLOAD DEPARTMENTAL PROJECT </h1>
        <p>This page is where past projects can be retrieved. Upload all student project on this page. Ensure all projects are properly documented. Kindly use our search page to confirm authenticity of the project topic. </p>        
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Student name:</td>
              <td><input type="text" name="Student_name" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Student Regno:</td>
              <td><input type="text" name="Student_Regno" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Project title:</td>
              <td><input type="text" name="Project_title" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Case study:</td>
              <td><input type="text" name="Case_study" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Student Phone no:</td>
              <td><input type="text" name="Student_Phone_no" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Academic session:</td>
              <td><input type="text" name="Academic_session" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Project supervisor:</td>
              <td><input type="text" name="Project_supervisor" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Type of project:</td>
              <td><select name="Type_of_project" id="Type_of_project">
			  <option value="">Select...</option>
              <option value="single">Single</option>
              <option value="Group">Group</option>
			  </select>
			  </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Nature of project:</td>
              <td><select name="Nature_of_project" id="Nature_of_project">
			  <option value="">Select...</option>
              <option value="Agriculture">Agriculture</option>
              <option value="Accounting">Accounting</option>
			  <option value="Architure">Architure</option>
              <option value="Banking and Finance">Banking and Finance</option>
			  <option value="Commputer Science">Commputer Science</option>
              <option value="Economics">Economics</option>
			  <option value="Education">Education</option>
              <option value="Engineering">Engineering</option>
			  <option value="Estate Management">Estate Management</option>
              <option value="Health">Health</option>
			  <option value="Insurance">Insurance</option>
              <option value="Legal">Legal</option>
			  <option value="Marketing">Marketing</option>
              <option value="Mass communication">Mass communication</option>
			  <option value="Other Project Type">Other Project Type</option>
              <option value="Political science">Political science</option>
			  <option value="Scientific">Scientific</option>
			  <option value="Security">Security</option>
			  <option value="Group">Statitics</option>
			  <option value="Group">Urban planning</option>
			  </select>
			  </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Date of submission:</td>
              <td><input type="date" name="Date_of_submission" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Submit"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>
      <p>&nbsp;</p></td>
      <td width="150" rowspan="3" valign="top" bgcolor="#0000FF"><p><strong><font color="#FFFFFF">Our Objective</font></strong></p>
        <p><font color="#FFFFFF">1. Creating a robust database that will help keep information about all student projects in the department of Computer Science. </font></p>
        <p><font color="#FFFFFF">2. Create a robust application where project informaton (title, case study, area of specilization etx) and session can be easily accessed.. </font></p>
        <p></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>   </td>
    </tr>
    
    <tr>
      <td height="50" valign="top" bgcolor="#CCCCCC"><form method="post" name="form2" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
        <input type="hidden" name="MM_insert" value="form2">
      </form>
        <p align="center"><a href="Upload File/index.php" class="style1">CLICK TO UPLOAD</a> SOFTCOPY OF THIS PROJECT </p>        
        <p align="center">&nbsp;</p></td>
    </tr>
    
    <tr>
      <td height="56" colspan="2" valign="top"><div align="center">Copyright &copy; 2018 All rights reserve</div></td>
    </tr>
  </table>
</div>
</body>
</html>