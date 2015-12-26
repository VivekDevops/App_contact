<?php
session_start();
include("includes/connect_sql.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pager Tool</title>
		<link rel="stylesheet" href="css/main.css">
	</head>

	<body>
		<div id="wrapper">		
			
			<?php include("includes/header.php"); ?> <!-- Header Div -->
			<?php include("includes/nav.html"); ?>    <!-- Nav Div -->
			<!-- Main_section Div -->			
			<div id="main_section">
				
				<?php
				if(isset($_SESSION['name'])){
					header("Location: index.php");
				} else{
				?>
				<form method="POST" action="">
				<center><table>
				<?php
						echo "<tr><td>Username: </td><td><input type=\"text\" name=\"Username\"></td></tr>";
						echo "<tr><td>Password:</td><td><input type=\"password\" name=\"password\"></td></tr>";
						echo "<center><tr rowspan=2><td><input type=\"submit\" name=\"login\" value=\"Login!\"></td></tr></center>";
				?>
				</table></center>
				</form>
				<?php
				if((isset($_POST['Username'])) AND (isset($_POST['password']))){
						//if(($_POST['Username']=='vivek') AND ($_POST['password']=='password')){
							$username = $_POST['Username'];
							$password = $_POST['password'];
							$sql = "select ID from user where name='$username' and password='$password'";
							$result = mysql_query($sql,$connect);
							if((mysql_num_rows($result))==1){
							$result = mysql_query("SELECT * FROM `user` WHERE name='$username'", $connect) or mysql_error('could not connect');
							while($row = mysql_fetch_array($result)){
							$_SESSION['name'] = $row[1];
							}
							header("Location: index.php");
							}else {
							echo "user credentials not matched";
							}
						}
						
				}
				
				
				?>				
			</div>
			
			<?php include("includes/footer.html") ?> <!-- footer Div -->
			
		</div> <!-- End of Wrapper Div -->
		
	</body>
	
</html>
