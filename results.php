<?php require_once('Connections/student_projectdb.php'); ?>
<?php
mysql_select_db($database_student_projectdb, $student_projectdb);
$query_rsResult = "SELECT * FROM project_management_tb WHERE Project_title = 'Project_title' ORDER BY Project_title ASC";
$rsResult = mysql_query($query_rsResult, $student_projectdb) or die(mysql_error());
$row_rsResult = mysql_fetch_assoc($rsResult);
$totalRows_rsResult = mysql_num_rows($rsResult);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH RESULT</title>
</head>

<body>
<form id="Results" name="Results" method="post" action="">
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
  <?php } while ($row_All_projects_record) = mysql_fetch_assoc($All_projects_record))); ?>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($rsResult);
?>
