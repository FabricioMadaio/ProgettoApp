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
				<h1 class="title"> Registrazione </h1>
				<form action="signupControl.php" method="post">
					<fieldset>
						<ol>
							
							<li>
								<input class="input-text midrow-l" name="nome" placeholder="Nome" type="text" value="<?php echo $name;?>" required autofocus="autofocus">
								<input class="input-text midrow-r" name="cognome" placeholder="Cognome" value="<?php echo $lastname;?>" type="text" required>
							</li>
							<?php if(!empty($nameErr)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$nameErr.'</p></li>';?>
						    <?php if(!empty($lastnameErr)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$lastnameErr.'</p></li>';?>
							
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="<?php echo $username;?>" type="text" required >
							<?php if(!empty($username)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$username.'</p></li>';?>	
							</li>
							
							<li>
								<input class="input-text fillrow" name="password" placeholder="Password" value="<?php echo $password;?>" type="password" required>
								<?php if(!empty($username)) echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$passwordErr.'</p></li>';?>
							</li>
							<li>
								<div style="display: inline-block;width: 100%;">
								
									<label class="littlerow">Data di nascita</label>
									<input class="bigrow" type="date" name="bday" value="${user.birthdate}" required >
									
								 </div>
							</li>
							<li>
								<input class="input-text fillrow" name="residenza" placeholder="Residenza" value="${user.residence}" type="text" required>
							</li>
							
						</ol>
						
					
						<br>
						<br>
						<input type="submit" class="submit" value="Registrati" > 	
						
					</fieldset>
					<br>
				</form>
			</section>

			<?php $nameErr = $emailErr = $genderErr = $websiteErr =$passwordErr =$lastnameErr=$usernameErr= "";
	$name = $email = $gender = $comment = $website =$password= $lastname =$username = ""; ?>

	</body>

</html>