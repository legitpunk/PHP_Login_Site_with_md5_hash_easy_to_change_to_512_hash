<?php

header("Cache-Control: max-age=2592000");

//need to create an apache_alias to the folder that holds the file files you want the explorer to navigate

require_once "Core/Define.php";
require_once "Core/Init.php";

//make the browser cache last a long time
header("Cache-Control: max-age=2592000");

$User = new User();

if ($User->IsLoggedIn()) 
{
	?>
<html>

	<head>
		<?php require_once "Core/Head.php"; ?>
	</head>
	
	<body>
		
		<main>
			
			<content>
				
				<div id="PageWrapper">
				
					<div id="wBox">
					
						<div id="TitleBar">
						
							<img id="Img24" src="images/icons/Login_after.png"></img>
							
							<p id="Text_H1">index.php</p>
							
						</div>
						
						<div id="Contents">
						
							<p id="Text_H1">You're logged in</p>
							
							<button id="button" type="Submit" class="input" name="Logout" onclick="Logout();">Logout</button>
						
						</div>
					
					</div>
					
				</div>

			</content>
			
		</main>	
		
		<footer>
		
		</footer>
		
	</body>
	
</html>

<?php
} 
else
{
	Redirect::To('Login.php');
}

?>
<script>
function Logout()
{
	$.ajax
	(
		{	
			type: 'GET',
			url: "<?php echo $_SESSION['http_base_dir']; ?>Logout.php",
			success: function(data)
			{
				/*
				script = $(data).text();
				$.globalEval(script);
				alert(data);
				*/
				window.location="<?php echo $_SESSION['http_base_dir']; ?>Login.php";
			}
		}
	);
}
</script>
