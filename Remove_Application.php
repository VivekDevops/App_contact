<?php

session_start();
if(!isset($_SESSION['name'])){
	
	header("Location: login.php");
	
} else{
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
			<?php include("includes/nav.html"); ?> <!-- Navigation Div -->
			<!-- Main_section Div -->
			<div id="main_section">
				<?php 
				include("includes/Remove_App.php"); 
				echo '<br>'				
				?>
			
			</div>
			
			<?php include("includes/footer.html") ?> <!-- footer Div -->
			
		</div>
	</body>
</html>
<?php
}
?>