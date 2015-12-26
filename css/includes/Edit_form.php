<?php
echo "<br>";
//function select(){
		include("connect_sql.php");
		echo 	"<form action=\"\" method=\"GET\"> 
				<select name=\"select_app\">";
				$select_app = mysql_query("select `App_Name` from `Application`", $connect);
				echo "<option>--select app--</option> ";
				while($row = mysql_fetch_array($select_app)){
				echo "<option value=\"" . $row['App_Name'] . "\">" . $row['App_Name'] . "</option>";
				}
		echo 	"</select>
				<input type=\"submit\" name=\"submit\" value=\"Select App\" class=\"button\" />
				</form><br>";
	//			}
?>


	<?php
	if((isset($_GET['submit'])) AND ($_GET['select_app'] != "--select app--")){
	$a = $_GET['select_app']; 
	
	$query = " select * from Application where App_Name='$a'";
	$result = mysql_query($query, $connect)or mysql_error();
	while($row = mysql_fetch_array($result)){
	$_a1 = $row['App_Name'];
	$_a2 = $row['Comp_Code'];
	$_a3 = $row['Primary_POC'];
	$_a4 = $row['Pager'];
	$_a5 = $row['Wiki'];
	}
	?>
	
	<form action="" method="POST">
		<center><table><tr><th>Application</th><th>Comp_Code</th><th>Primary_POC</th><th>Pager</th><th>Wiki</th></tr>
					   <tr><td><input type="text" value="<?php echo $_a1; ?>" name="Application" /></td><td><input type="text" value="<?php echo $_a2; ?>" name="Comp_Code" /></td>
						   <td><input type="text" value="<?php echo $_a3; ?>" name="Primary_POC" /></td><td><input type="text" value="<?php echo $_a4; ?>" name="Pager" /></td>
							   <td><textarea rows="5" cols="30" name="Wiki"><?php echo $_a5; ?></textarea></td></tr>
				<tr><td><input type="submit" value="update" name="update" /></td></tr></table></center>
	</form>
	<?php
	}
	if(isset($_POST['update'])){
	$_a1 = $_POST['Application'];
	$_a2 = $_POST['Comp_Code'];
	$_a3 = $_POST['Primary_POC'];
	$_a4= $_POST['Pager'];
	$_a5 = $_POST['Wiki'];
		$query= "UPDATE application
				 SET `App_Name`='$_a1', `Comp_Code`='$_a2', `Primary_POC`='$_a3', `Pager`='$_a4', `Wiki`='$_a5'
				 WHERE `App_Name`='$a'";
		mysql_query($query, $connect);
				 
		echo "<br><br><b><i><h4 style=\"color:red\">Updated Successfully - Refresh once to notice the changes</h4></i></b><br><br>";
	}

	?>