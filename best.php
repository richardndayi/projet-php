<! doctype html> 
<html>
<head> <title> ajouter dans le base de donnees </title></head>
<body>
<?php
if(isset($_POST['add'])){
$dbhost='localhost:3036';
$dbuser='root';
$dbpass='rootpassword';
$conn= mysqli_connect($dbhost,$dbuser,$dbpass);
if(! $conn){
die('could not connect:' .mysqli_error());
}
if(! get_magic_quotes_gpc()){
$emp_name=addslashes($_POST['emp_name']);
$emp_address=addslashes($_POST['emp_address']);
}
else
{
$emp_name=$_POST['emp_name'];
$emp_address=$_POST['emp_address'];
}
$emp_salary=$_POST['emp_salary'];
$sql="INSERT INTO employee".
     "(emp_name,emp_address,emp_salary, join_date)".
	 "VALUES('$emp_name','emp_address',$emp_salary,now())";
	 mysqli_select_db('test_db');
$retval=msqli_query($sql,$conn);
if(! $retval)
{
die('could not enter data:' .mysqli_error());
}
echo"entre data successful\n";
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">employee Name </td>
<td><input name="emp_name" type="text" id="emp_name"></td>
</tr>
<tr>
<td width="100">employee Address </td>
<td><input name="emp_address" type="text" id="emp_address"></td>
</tr>
<tr>
<td width="100">employee Salary </td>
<td><input name="emp_salary" type="text" id="emp_salary"></td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Employee">
</td>
</tr>
</table>
</form>
<?php }?>
</body>
</html>











</body>
</html>