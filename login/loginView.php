<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width">
			<meta name="description" content="Sito E-Commerce">
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="author" content="Fabricio Nicolas Madaio">

			<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
			<![endif]-->

			<title>Sito E-Commerce	</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			
			<script src="../javascript/singup.js"></script>
			<script src="../javascript/comuni.js"></script>
			
			<script>
				window.onload = function(){
					initSignup();
					initComuni();
				}
			</script>
	</head>

	<body style="text-align:center">
	
			<header class="bigHeader">
				<a href="javascript:toHome()">
					<img src="../img/LogoFinal.png" class="logo" alt="Company Inventory" />
				</a>
			</header>
			
			<section class="sectionbox">
				<h1 class="title"> Login </h1>
				<form action="loginControll.php" method="post" style="margin-left: 10%;margin-right: 10%;">
					<fieldset>
						<ol>
							
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="<?php echo "$username"; ?>" type="text" required >
							</li>
							<?php if(!empty($usernameErr)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$usernameErr.'</p></li>';?>
							<li>
								<input class="input-text fillrow" name="password" placeholder="Password" value="<?php echo "$password"; ?>" type="password" required>
							</li>
							<?php if(!empty($passwordErr)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$passwordErr.'</p></li>';?>
							<?php if(!empty($dbErr)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$dbErr.'</p></li>';?>
						</ol>
						
					
						<br>
						<input type="submit" class="submit" value="Entra" > 	
						<br>
						<p>Oppure</p>
						<input type="submit" class="submit" value="Registrati" style="background-color:#08a9ea">
						
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>