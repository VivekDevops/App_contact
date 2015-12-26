<?php

include("connect_sql.php");
if (isset($_POST['submit'])){
	$a = $_POST['App_Name'];
	$b = $_POST['Comp_Code'];
	$c = $_POST['Primary_POC'];
	$d = $_POST['Pager'];
	$e = $_POST['Wiki'];
	$f = $_SESSION['name'];
	
	$query = "INSERT INTO application (`App_Name`, `Comp_Code`, `Primary_POC`, `Pager`, `Wiki`, `last_updated`)
	VALUES('$a', '$b', '$c', '$d', '$e', '$f')";
	mysql_query($query, $connect) or mysql_error();
	header('Location:../index.php');
	
	
}
				
?>

<form method="POST" action="">
<center><table>
<tr><td>App Name</td><td><input type="text" name="App_Name"></td></tr>
<tr><td>Comp Code</td><td><input type="text" name="Comp_Code"></td></tr>
<tr><td>Primary POC</td><td><input type="text" name="Primary_POC"></td></tr>
<tr><td>Pager</td><td><input type="text" name="Pager"></td></tr>
<tr><td>Wiki</td><td><textarea rows="4" cols="30" name="Wiki"></textarea></td></tr>
<tr><td><input type="submit" name="submit" value="Add App!!" /> </td></tr>
</table></center>