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

			<script src="../javascript/utils.js"></script>
			<script src="../javascript/showcase.js"></script>
			<script src="../javascript/navBar.js"></script>
			<script src="../javascript/imageUpload.js"></script>
			
			<script> 
				window.onload = function(e){ 
					startNavBar();
					startShowcase();
				}
			</script>
	</head>

	<body>
	
			<header>
				<a href="javascript:toHome()">
					<img src="../img/LogoFinal.png" class="logo" alt="Company Inventory" />
				</a>
			</header>
			
			<nav>

				<ul>
					<li class="menu-dropdown">
						
							<div class="menu-icon" onclick="menuMobile();">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</div>
							
							<div class="menu-content" onclick="blockReset();">
							<ul>
								<li>
									<a  href="javascript:toHome()"> Prodotti </a>
								</li>
								<li>
									<a href = "UserCart"> Carrello </a>
								</li>
								<li>
									<a href="UserSignupForm"> Registrazione </a>
								</li>
							</ul>
						  </div>
						
					</li>
					
					<li class = "fullmenu">
						<a href="javascript:toHome()"> Prodotti </a>
					</li>
					<li class = "fullmenu">
						<a href = "UserCart"> Carrello </a>
					</li>
					<li class = "fullmenu">
						<a href="UserSignupForm"> Registrazione </a>
					</li>
					
				</ul>
				
			</nav>
			
			<br>
		
			<section class="sectionbox" style="max-width:800px;text-align: center;">
				
				<form class="form" id="formNew" action="ItemControl.php" method="POST" enctype="multipart/form-data">
					<br>
					<div class="productImageContainer">
						<img src="../img/prodotto1.jpg" id="previewImage" class="productImage" alt="Product" />
						<input type="file" id="inputImage" class="inputImage" onchange="loadPreview(this)" name="image">
					</div>
					
					<br>
					<fieldset>
						<ol>
							<li>
								<input class="input-text bigrow" name="nome" style="float: left;" placeholder="Nome" type="text" value="" required="">
							</li>
							
							<li style="height: 128px">		
								<textarea class="fillrow" style="height: 128px" name="descrizione" placeholder="Descrizione" required=""></textarea>
							</li>
							<li style="margin-top: 9px;height: auto;">		
								<input type="submit" class="submit submitRightButton" value="Carica">
							</li>
						</ol>
					</fieldset>
				</form>
			</section>
			
			<br>
			<br>	
			
			<footer style="text-align:center">
				<div class="background">
					<div class="wrapper">
					
						<img src="../img/logoFooter.svg" alt="logo"/>
						<label>
							Copyright @ Webmaster
						</label>
					</div>
				</div>
			</footer>

	</body>

</html>