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
				<h1 class="title"> Recupero Password </h1>
				<form action="../login/" method="post" style="margin-left: 10%;margin-right: 10%;">
					<fieldset>
					<p><?php echo $emailErr; ?>
					</p>
						<br>
						<input type="submit" class="submit" value="Torna alla Home" > 	
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>