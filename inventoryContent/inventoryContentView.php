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
			<link rel="stylesheet" type="text/css" href="../css/inventoryList.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">


			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/inventoryList.js"></script>
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var m = new Modal("myModal");
				}
			</script>
	</head>

	<body>
	
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
				
				<ul style="background-color: #4d4dcc;">
					<li class="positionFix">
					</li>
					<li class="removeButton">
						<span class="inventoryRemove">
									Rimuovi
						</span>
					</li>
					<li style="float: none;">
							<span class="inventoryTitle">
									Formaggi
							</span>
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
								<input class="search" id="ricerca" onchange="startShowcase()" placeholder="Cerca" type="text" required>
							</div>
						</div>
						</div>
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
							<p>Nuovo Inventario</p>
						</li>
					</ul>
					<div class="modal-body">
						
							<p>Inserisci un nome per il tuo inventario</p>
							<input type="text" class="input-text fillrow"/>
							<br>
							<br>
					</div>
					
					<div class="modal-footer">
							<input type="submit" class="submit submitRightButton" value="Conferma"/>
					</div>
					
				</form>
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<section class="responsiveGrid">
			
					<div class="inventoryElem">
						<a class="removeItemButton">×</a>	
						
						<div class="squareBox">
							<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
							<div style="bottom: 0;right: 0;position: absolute;">
									<input type="number" value="99" style="
										    color: #f9f9f9;
											background-color: #406be8;
											font-size: 19px;
											margin-bottom: 7px;
											margin-right: 8px;
											padding: 1px;
											border: 3px #dad7d7 solid;
											border-radius: 99px;
											width: 36px;
											text-align: center;
											display: block;
											box-shadow: 2px 3px 1px #EEE;
											padding-top: 2px;
									"/>
							</div>
							
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>					
				
				<div class="inventoryElem">
						<a class="removeItemButton">×</a>	
						
						<div class="squareBox">
							<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
							<div style="bottom: 0;right: 0;position: absolute;">
									<input type="number" value="99" style="
										    color: #f9f9f9;
											background-color: #406be8;
											font-size: 19px;
											margin-bottom: 7px;
											margin-right: 8px;
											padding: 1px;
											border: 3px #dad7d7 solid;
											border-radius: 99px;
											width: 36px;
											text-align: center;
											display: block;
											box-shadow: 2px 3px 1px #EEE;
											padding-top: 2px;
									"/>
							</div>
							
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>			
				
				<div class="inventoryElem">
						<a class="removeItemButton">×</a>	
						
						<div class="squareBox">
							<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
							<div style="bottom: 0;right: 0;position: absolute;">
									<input type="number" value="99" style="
										    color: #f9f9f9;
											background-color: #406be8;
											font-size: 19px;
											margin-bottom: 7px;
											margin-right: 8px;
											padding: 1px;
											border: 3px #dad7d7 solid;
											border-radius: 99px;
											width: 36px;
											text-align: center;
											display: block;
											box-shadow: 2px 3px 1px #EEE;
											padding-top: 2px;
									"/>
							</div>
							
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>			
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