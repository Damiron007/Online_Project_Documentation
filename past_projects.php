<?php require_once('Connections/student_projectdb.php'); ?>
<?php
$maxRows_rsAll_projects_record = 50;
$pageNum_rsAll_projects_record = 0;
if (isset($_GET['pageNum_rsAll_projects_record'])) {
  $pageNum_rsAll_projects_record = $_GET['pageNum_rsAll_projects_record'];
}
$startRow_rsAll_projects_record = $pageNum_rsAll_projects_record * $maxRows_rsAll_projects_record;

mysql_select_db($database_student_projectdb, $student_projectdb);
$query_rsAll_projects_record = "SELECT * FROM project_management_tb";
$query_limit_rsAll_projects_record = sprintf("%s LIMIT %d, %d", $query_rsAll_projects_record, $startRow_rsAll_projects_record, $maxRows_rsAll_projects_record);
$rsAll_projects_record = mysql_query($query_limit_rsAll_projects_record, $student_projectdb) or die(mysql_error());
$row_rsAll_projects_record = mysql_fetch_assoc($rsAll_projects_record);

if (isset($_GET['totalRows_rsAll_projects_record'])) {
  $totalRows_rsAll_projects_record = $_GET['totalRows_rsAll_projects_record'];
} else {
  $all_rsAll_projects_record = mysql_query($query_rsAll_projects_record);
  $totalRows_rsAll_projects_record = mysql_num_rows($all_rsAll_projects_record);
}
$totalPages_rsAll_projects_record = ceil($totalRows_rsAll_projects_record/$maxRows_rsAll_projects_record)-1;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>ALL PROJECTS RECORD</title>
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
a {
	font-weight: bold;
}
.style1 {color: #FFFFFF}
-->
</style>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body bgcolor="#FFFFFF">
<div align="center">
  <table width="950" height="518" border="1" bgcolor="#FFFFFF">
    <!--DWLayoutTable-->
    <tr>
      <td height="48" colspan="2" bgcolor="#0000FF"><a href="home.php">HOME</a> <span class="style3 style1">|</span> <a href="student.php">STUDENTS </a><span class="style3 style1">|</span><a href="past_projects.php"> PROJECTS RECORD </a> <span class="style3 style1">| </span><a href="upload.php">UPLOAD PROJECT </a> <span class="style3 style1">|</span> <a href="search.php">PROJECT SEARCH </a><span class="style3 style1"> | </span><a href="index.php">LOGOUT</a></td>
    </tr>
    <tr>
      <td colspan="2"><img src="banner.jpg" width="850" height="120" /></td>
    </tr>
    <tr>
      <td width="850" height="151" valign="top"><h1>PROJECT DOCUMENTATION RECORD </h1>
        <p>This page is where past projects can be retrieved. </p>        <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
          <table border="1">
            <tr>
              <td><strong>Student name</strong></td>
              <td><strong>Student Regno</strong></td>
              <td><strong>Project title</strong></td>
              <td><strong>Case study</strong></td>
              <td><strong>Student Phone no</strong></td>
              <td><strong>Academic session</strong></td>
              <td><strong>Project supervisor</strong></td>
              <td><strong>Type of project</strong></td>
              <td><strong>Nature of project</strong></td>
              <td><strong>Date of submission</strong></td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_rsAll_projects_record['Student_name']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Student_Regno']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Project_title']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Case_study']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Student_Phone_no']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Academic_session']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Project_supervisor']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Type_of_project']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Nature_of_project']; ?></td>
                <td><?php echo $row_rsAll_projects_record['Date_of_submission']; ?></td>
              </tr>
              <?php } while ($row_rsAll_projects_record = mysql_fetch_assoc($rsAll_projects_record)); ?>
          </table>
        </form></td>
    </tr>
    <tr>
      <td height="100" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" name="form1">
        <input type="hidden" name="MM_insert" value="form1" />
        </form>
     </td>
    </tr>
    <tr>
      <td height="37" colspan="2"><div align="center">Copyright &copy; 2018 All rights reserved</div></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($rsAll_projects_record);
?>