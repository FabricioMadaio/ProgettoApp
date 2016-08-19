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

	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $websiteErr = "";
	$name = $email = $gender = $comment = $website = "";
	?>

<body style="text-align:center">
			<?php session_start(); echo $_SESSION["name"]; ?></span>
			<h2>PHP Form Validation Example</h2>
			<p><span class="error">* required field.</span></p>
			<form method="post" action="signupControl.php">  
			  Name: <input type="text" name="name" value="<?php echo $name;?>">
			  <span class="error">* <?php echo $nameErr;?></span>
			  <br><br>
			  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			  <span class="error">* <?php echo $emailErr;?></span>
			  <br><br>
			  Website: <input type="text" name="website" value="<?php echo $website;?>">
			  <span class="error"><?php echo $websiteErr;?></span>
			  <br><br>
			  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
			  <br><br>
			  Gender:
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
			  <span class="error">* <?php echo $genderErr;?></span>
			  <br><br>
			  <input type="submit" name="submit" value="Submit">  
			</form>

			<?php
			echo "<h2>Your Input:</h2>";
			echo $name;
			echo "<br>";
			echo $email;
			echo "<br>";
			echo $website;
			echo "<br>";
			echo $comment;
			echo "<br>";
			echo $gender;
			?>
	
			<header class="bigHeader">
				<a href="javascript:toHome()">
					<img src="../img/logoFinal.png" class="logo" alt="Company Inventory" />
				</a>
			</header>
			
			<section class="sectionbox">
				<h1 class="title"> Registrazione </h1>
				<form action="UserSignup" method="post">
					<fieldset>
						<ol>
							
							<li>
								<input class="input-text midrow-l" name="nome" placeholder="Nome" type="text" value="${user.name}" required autofocus="autofocus">
								<input class="input-text midrow-r" name="cognome" placeholder="Cognome" value="${user.surname}" type="text" required>
							</li>
							
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="${user.username}" type="text" required >
							</li>
							
							<li>
								<input class="input-text fillrow" name="password" placeholder="Password" value="${user.password}" type="password" required>
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
							<li>
								<select id="provincia" name='provincia' class="midrow-l" onchange="requestComuni(this.value)" required>
								</select>
								<select id="comune" name='comune' class="midrow-r" required>
								</select>
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