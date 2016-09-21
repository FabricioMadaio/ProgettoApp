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
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">


			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/productsListSearch.js"></script>
			
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					startProductsList();
					
				}
			</script>
	</head>
	<body>
	<?php 
    	/*load session controll*/
	    include '../php/sessionControl.php';
	 ?>
			<header>
				<a href="javascript:toHome()">
					<img src="../img/LogoFinal.png" class="logo" alt="Company Inventory" />
					<!--Font logo rockwell-->
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
									<a  href="javascript:toHome()"> Info </a>
								</li>
								<li>
									<a href="UserSignupForm"> Il tuo profilo </a>
								</li>
							</ul>
						  </div>
						
					</li>
					
					<li class = "fullmenu">
						<a href="javascript:toHome()"> Info </a>
					</li>
					<li class = "fullmenu">
						<a href="UserSignupForm"> Il tuo profilo </a>
					</li>
					
				</ul>
				
				<ul class="searchBar">
					
					<li class="search">
						<div style="margin-left: 12px;">
						<div class="search">
							<a class="search">
								<img src="../img/search.png" class="product-preview" alt="formaggio" />
							</a>
							<div style="overflow: hidden;">
								<input class="search" id="ricerca" onchange="startProductsList()" placeholder="Cerca" type="text"">
							</div>
						</div>
						</div>
					</li>
				</ul>
			</nav>
			
			<section class="responsiveGrid">
			
				<span id="elementGrid">
	                <div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
	                <div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
					<div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
					
				</span>
			</section>
			
				
			
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