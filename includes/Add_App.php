<?php

include("connect_sql.php");
if (isset($_POST['submit'])) {
	if(!empty($_POST['App_Name'])){
	$a = $_POST['App_Name'];
	$b = $_POST['Comp_Code'];
	$c = $_POST['Primary_POC'];
	$d = $_POST['Pager'];
	$e = $_POST['Wiki'];
	$f = $_SESSION['name'];
	
	$query = "select App_Name from application where App_Name='$a'";
	$result = mysql_query($query, $connect);
	if(mysql_num_rows($result)==0){
	$query = "INSERT INTO application (`App_Name`, `Comp_Code`, `Primary_POC`, `Pager`, `Wiki`, `last_updated`)
	VALUES('$a', '$b', '$c', '$d', '$e', '$f')";
	mysql_query($query, $connect) or mysql_error();
	header('Location:../index.php');
	} else{
			echo "<br><span style=\"font-family:'Copperplate Gothic Bold'; color:gray\">Sorry!! The App_Name you entered already exists.</span>";
		}
	
} else{
	echo "<br><span style=\"font-family:'Copperplate Gothic Bold'; color:gray\">Please make sure you do not leave App_Name field empty </span>";
	}
}
?>

<form method="POST" action="">
<center><table>
<tr><td>App Name</td><td width="70%"><input type="text" name="App_Name"></td></tr>
<tr><td>Comp Code</td><td><input type="text" name="Comp_Code"></td></tr>
<tr><td>Primary POC</td><td><input type="text" name="Primary_POC"></td></tr>
<tr><td>Pager</td><td><input type="text" name="Pager"></td></tr>
<tr><td>Wiki</td><td><textarea rows="4" cols="30" name="Wiki"></textarea></td></tr>
<tr><td><input type="submit" name="submit" value="Add App!!" /> </td></tr>
</table></center>