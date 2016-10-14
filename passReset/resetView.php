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
			<script src="../javascript/utils.js"></script>
			
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
				<h1 class="title"> Cambia password </h1>
				<form action="reset.php" method="post" style="margin-left: 10%;margin-right: 10%;">
					<fieldset>
						<?php if(!empty($tokenErr)): ?>
							<p><?php echo $tokenErr ?></p>
							<a class="submit" style ="display: block;text-decoration: none;" href="<?php echo ROOT ?>" >Torna alla Home</a>
						<?php else: ?>
						<p style="text-align: left;">
							Inserisci qui la tua nuova password
						</p>
						<ol>
							<li style="height: 40px;">
								<input class="input-text fillrow" name="password" placeholder="Password" value="" type="password" required="">
								<?php echo $passwordErr;?>
							</li>
								<input name="token" placeholder="token" value=<?php echo "'".$token."'"; ?> type="text" hidden>
						</ol>
						
						<input type="submit" class="submit" value="Invia" style="float: right;width: 100px;"> 	
						<?php endif; ?>
						<br>
						<br>
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>