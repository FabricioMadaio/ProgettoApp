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
			<link rel="stylesheet" type="text/css" href="../css/modal.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			
			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
		
			<script src="../javascript/imageUtils/exif.js"></script>
			<script src="../javascript/imageUtils/ImageUploader.js"></script>
			
			<script src="../javascript/inventoryList.js"></script>
			
			<script> 
				function start(){ 
					/* responsiveness*/
					startStylesheet();
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
			
			<!-- The Modal -->
			<div id="myModal" class="modal">
		
			  <!-- Modal content -->
			  <div class="modal-content">
				<form class="form" id="formNew" action="login" method="POST">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Caricamento</p>
						</li>
					</ul>
					<div class="modal-body">
						
							<div class="progress-container">
							  <div id="progressBar" class="progressbar" style="width:0%">
							  </div>
							</div>

							<p id="progressValue">0%</p>
							
							<div id="response" style="text-align:center">
								
							</div>
							<br>
					</div>
					
				</form>
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<br>
		
			<section  id="section" class="sectionbox" style="max-width:800px;text-align: center;">	

			<h1 class="title"><?php echo $item->name; ?></h1>
				
				<form class="form" id="formNew" action="javascript:document.openModal();" method="POST" style="margin: 3px 2%;">	
					<aside class="left">
						<div class="itemImageContainer">
							<img src=<?php echo "'../uploads/".$item->imageUrl."'" ?> id="previewImage" class="itemImage circle" alt="Product" />
						</div>
					</aside>
					<aside>
						<fieldset>
							<ol class="Item">
									<li style="height: 153px">		
									<textarea class="fillrow" style="height: 100%;"  id="description" name="descrizione" readonly>
										<?php echo $item->description; ?>
									</textarea>
								</li>
								<li style="margin-top: 14px;height: auto;">		
									<input type="submit" class="submit submitRightButton" value="Carica">
								</li>
							</ol>
						</fieldset>
					</aside>
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
	
	<script>
			start();
	</script>

</html>