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
	<script type="text/javascript">
		function alerts(){
			alert("Sorry!! The Application you entered already exists");
		}
	</script>
		<title>Pager Tool</title>
		<link rel="stylesheet" href="css/main.css">
		<link rel="shortcut icon" href="images/favicon.ivo" type="image/x-icon">
	</head>

	<body>
		<div id="wrapper">		
			
			<?php include("includes/header.php"); ?> <!-- Header Div -->
			<?php include("includes/nav.html"); ?>    <!-- Nav Div -->
			<!-- Main_section Div -->			
			<div id="main_section">
				<?php include("includes/View_Details.php"); 
				
						 select(); //CALLING DROP DOWN MENU FUNCTION
						 
						if(isset($_GET['submit'])){
								view_details(); //CALLING SHOW ALL DETAILS FUNCTION
						}
				?>				
			</div>
			
			<?php include("includes/footer.html") ?> <!-- footer Div -->
			
		</div> <!-- End of Wrapper Div -->
		
	</body>
	
</html>
<?php
}
?>