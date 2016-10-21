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
			<link rel="icon" href="../icon.ico" />
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
				<h1 class="title"> Registrazione </h1>
				<form action="signupControl.php" method="post">
					<fieldset>
						<ol>
							
							<li>
								<input class="input-text midrow-l" name="nome" placeholder="Nome" type="text" value="<?php echo $user->name;?>" required autofocus="autofocus">
								<input class="input-text midrow-r" name="cognome" placeholder="Cognome" value="<?php echo $user->lastname;?>" type="text" required>
								<?php echo $user->nameErr;?>
								<?php echo $user->lastnameErr;?>
							</li>
							
							<li>
								<input class="input-text fillrow" name="email" placeholder="Email" value="<?php echo $user->email;?>" type="email" required >
								<?php echo $user->emailErr;?>
							</li>
							
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="<?php echo $user->username;?>" type="text" required >
								<?php echo $user->usernameErr;?>
							</li>
							
							<li>
								<input id="password" class="input-text fillrow" name="password" placeholder="Password" value="<?php echo $user->password;?>" type="password" required>
								<?php echo $user->passwordErr;?>
							</li>
							<li style="text-align:left;font-size:14px;font-family:Arial"> <input type="checkbox" style="float:left"  name="checkbox" onclick="showHidePassword()"> Show password</li>
							<li>
								<div style="display: inline-block;width: 100%;">
								
									<label class="littlerow">Data di nascita</label>
									<input class="bigrow" type="date" name="bday"  value="<?php echo $user->bday;?>" required >
									
								 </div>
								 <?php echo $user->bdayErr;?>
							</li>
							<li>
								<input class="input-text fillrow" name="residenza" placeholder="Residenza" value="<?php echo $user->residence;?>" type="text" required>
								<?php echo $user->residenceErr;?>
							</li>
							
						</ol>
						
					
						<br>
						<br>
						<input type="submit" class="submit" value="Registrati" > 	
						
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>