<?php
/*
FUNCTIONS
select(); // function to select Application drop down 
view_details(); //function to show All details from DB

*/

// function to select Application drop down menu
function select(){

		include("connect_sql.php");
		echo 	"<form action=\"\" method=\"GET\"> 
				<select name=\"select_app\">";
				$select_app = mysql_query("select `App_Name` from `Application`", $connect);
				echo "<option value=\"*\">All</option> ";
				while($row = mysql_fetch_array($select_app)){
				echo "<option value=\"" . $row['App_Name'] . "\">" . $row['App_Name'] . "</option>";
				}
		echo 	"</select>
				<input type=\"submit\" name=\"submit\" value=\"Select App\" class=\"button\" />
				</form><br>";
		}

//function to show All details from DB
function view_details(){
$a = $_GET['select_app'];
include("connect_sql.php");
		if($a=='*'){
		$query = "select * from `Application`";
		
		} else {		
		$query = "select * from `Application` where `App_Name`='$a'";
		}		
		$result = mysql_query($query, $connect);
		echo "<center><table><tr><th>App_Name<th>Comp_Code</th><th>Primary_POC</th><th>Pager</th><th>Wiki</th><th>Last_UpdatedBy</th></tr>";
		while($row = mysql_fetch_array($result)){
		$Application = $row['App_Name'];
		$Comp_Code = $row['Comp_Code'];
		$Primary_POC = $row['Primary_POC'];
		$Pager = $row['Pager'];
		$Wiki = $row['Wiki'];
				echo "<tr><td>". $row['App_Name'] . "</td><td>" . $row['Comp_Code'] . "</td><td>" . $row['Primary_POC'] . "</td><td>" . $row['Pager'] . 
				"</td><td><textarea rows=\"5\" cols=\"30\">" . $row['Wiki'] . "</textarea></td><td>"  .  $row['last_updated']  . "</td></tr>";
		}
		echo "</table></center>";
}

?>