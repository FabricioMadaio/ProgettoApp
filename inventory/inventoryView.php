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
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/singup.css">
			<link rel="stylesheet" type="text/css" href="css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="css/modal.css">


			<script src="javascript/common/utils.js"></script>
			<script src="javascript/common/responsiveStylesheet.js"></script>
			<script src="javascript/common/modal.js"></script>
			<script src="javascript/inventoryList.js"></script>

			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var m = new Modal("myModal",{
						onOpen:resetModal,
						onClose:startInventoryList
					});
					
					document.closeModal = function(){
						m.close();
					}
					
					startInventoryList();
				}
			</script>
	</head>
	<body>
	
			<header>
				<a href="javascript:toHome()">
					<img src="img/LogoFinal.png" class="logo" alt="Company Inventory" />
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
								<li>
									<a  href="javascript:toProductList()"> Cerca un prodotto </a>
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
					<li class = "fullmenu">
						<a  href="javascript:toProductList()"> Cerca un prodotto </a>
					</li>
					
				</ul>
				
				<ul class="searchBar">
					
					<li class="search">
						<div style="margin-left: 12px;">
						<div class="search">
							<a class="search">
								<img src="img/search.png" class="product-preview" alt="formaggio" />
							</a>
							<div style="overflow: hidden;">
								<input class="search" id="ricerca" onchange="startInventoryList()" placeholder="Cerca" type="text" required>
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
				<form class="form" id="formNew" action="javascript:createIventory()" method="POST">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Nuovo Inventario</p>
						</li>	  
					</ul>
					<div class="modal-body" id="modalBody">
						
							<p>Inserisci un nome per il tuo inventario</p>
							<input type="text" id="inventoryname"name="inventoryName" class="input-text fillrow"/>
							<br>
							<br>
							<div id="response">
							
							</div>
							
					</div>
					
					<div  id="footer" class="modal-footer">
							<input type="submit"  name="inventorySubmit" class="submit submitRightButton" value="Conferma"/>
					</div>
					
				</form>
			  </div>
			 </div>
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
				<!-- Trigger/Open The Modal -->
				<div class="inventoryElem">
					<div class="squareBox">
						<div class="circle squareContent myModal_open">
							<img class="imageAdd" src="img/logoAdd.png" alt="logo aggiungi prodotto">
						</div>
					</div>
					
					<span class="inventoryName" style="visibility: hidden;" >lorem</span><!--This span is for verical allignamet of the div elements-->
					
				</div>
			</section>
			
				
			
			<footer style="text-align:center">
				<div class="background">
					<div class="wrapper">
					
						<img src="img/logoFooter.svg" alt="logo"/>
						<label>
							Copyright @ Webmaster
						</label>
					</div>
				</div>
			</footer>

	</body>

</html>