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
			<script src="../javascript/inventoryContent.js"></script>
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var m = new Modal("myModal",{
						onOpen:null,
						onClose:null
					});
					
					loadInventoryContent(<?php echo $inventory->id ?>);
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
					<li style="float:right">
						<span class="inventoryButton specialButton" style="margin-left:0px">
									Rimuovi
						</span>
					</li>
					<li style="float:left">
						<span class="inventoryButton" style="margin-right:0px" onclick="toClientHome()">
									Indietro
						</span>
					</li>
					<li style="float: none;">
							<span class="inventoryTitle">
									<?php echo $inventory->name;?>
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
								<input class="search" id="ricerca" onchange="loadInventoryContent(<?php echo $inventory->id ?>);" placeholder="Cerca" type="text" required>
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
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Inserimento nuovo prodotto</p>
						</li>
					</ul>
					<div class="modal-body">
						
							<p>Scegli se inserire il prodotto dalla lista dei prodotti o inserirene uno nuovo</p>
							<button class="modal-button" onclick="toProductList()">Scegli dalla lista</button>
							<button class="modal-button" onclick="toItemUpload(<?php echo "'index.php?inventory=".$inventory->id."'" ?>)">Inserisci nuovo</button>
							<br>
					</div>
					<br>
					
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<section class="responsiveGrid">
			
					<div id="elementGrid">
						<div class="inventoryElem">
							<a class="removeItemButton">×</a>	
							
							<div class="squareBox">
								<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
								<div style="bottom: 0;right: 0;position: absolute;">
										<input type="number" value="99" />
								</div>
								
							</div>
							<span class="inventoryName">Vestiti con il nome lungo</span>	
						</div>					
					
						<div class="inventoryElem">
							<a class="removeItemButton">×</a>	
							
							<div class="squareBox">
								<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
								<div style="bottom: 0;right: 0;position: absolute;">
										<input type="number" value="99" />
								</div>
								
							</div>
							<span class="inventoryName">Vestiti con il nome lungo</span>	
						</div>			
					
						<div class="inventoryElem">
							<a class="removeItemButton">×</a>	
							
							<div class="squareBox">
								<div class="circle squareContent" style="background-image: url(../img/prodotto1.jpg);"></div>
								<div style="bottom: 0;right: 0;position: absolute;">
										<input type="number" value="99" />
								</div>
								
							</div>
							<span class="inventoryName">Vestiti con il nome lungo</span>	
						</div>		
					
					</div>
					
					<div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent myModal_open">
								<img class="imageAdd" src="../img/logoAdd.png" alt="logo aggiungi prodotto">
							</div>
						</div>
						
						<span class="inventoryName" style="visibility: hidden;" >lorem</span><!--This span is for verical allignamet of the div elements-->
						
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