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

			<title>Company inventory</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			
			<script src="../javascript/singup.js"></script>
			
			<script>
				window.onload = function(){
					initSignup();
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
				<form action="loginControl.php" method="post" style="margin-left: 10%;margin-right: 10%;">
					<fieldset>
						<ol>
							
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="<?php echo "$user->username"; ?>" type="text" required >
							</li>
							<?php echo $user->usernameErr;?>
							<li style="height: 40px;">
								<input class="input-text fillrow" name="password" placeholder="Password" value="" type="password" required="">
							</li>
							<?php echo $user->passwordErr;?>
							<?php echo $user->dbErr;?>
							<li style="text-align: right;height: 30px;">
								<a href=<?php echo ROOT."passwordReset.html"; ?> class="simple"">Hai dimenticato la password?</a>
							</li>
						</ol>
						
						<input type="submit" class="submit" value="Entra" > 	
						<br>
						<p>Oppure</p>
						<a class="submit" href="../signup" style="background-color:#08a9ea;display: block;text-decoration: none;">Registrati</a>
						
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>