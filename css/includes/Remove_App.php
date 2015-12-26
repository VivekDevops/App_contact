<?php

include("connect_sql.php");
		echo 	"<form action=\"\" method=\"GET\"> 
				<select name=\"select_app\">";
				$select_app = mysql_query("select `App_Name` from `Application`", $connect);
				echo "<option>--select app--</option> ";
				while($row = mysql_fetch_array($select_app)){
				echo "<option value=\"" . $row['App_Name'] . "\">" . $row['App_Name'] . "</option>";
				}
		echo 	"</select>
				<input type=\"submit\" name=\"submit\" value=\"Remove :(\" class=\"button\" />
				</form><br>";
				
?>

<?php
	if((isset($_GET['submit'])) AND ($_GET['select_app'] != "--select app--")){
	$a = $_GET['select_app']; 
	
	$query = " DELETE FROM Application where App_Name='$a'";
	mysql_query($query, $connect)or mysql_error();
	// echo "<br><br><b><i><h4 style=\"color:red\">Application Removed Successfully - Refresh once to notice the changes</h4></i></b><br><br>";
	header('Location:../index.php');
	}
	?>