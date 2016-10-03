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
			<script src="../javascript/productsListSearch.js"></script>
			<script src="../javascript/productSelection.js"></script>
			
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					startProductsList(true);
					
					var ps = new Selection(document.getElementById("submit"));
					
					var m = new Modal("modalSubmit",{
						onOpen:function(){
							ps.submit(m,<?php echo $inventory->id ?>);
						},
						onClose:null
					});
					
					document.selectItem = function(item){
						
						var amountCounter = item.nextSibling.childNodes[0];
	 
						if(item.className != "selectedItem"){	
							item.className = "selectedItem";
							amountCounter.className="itemCounterSelected";
							ps.addItem(item);
						}else{
							item.className = "notSelected";
							amountCounter.className="itemCounter";
							ps.dropItem(item);
						}
					}
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
				<ul style="background-color: #4d4dcc;">
					<li style="float:right">
						<button id="submit" class="inventoryButton modalSubmit_open" style="margin-left:0px" disabled>
									Conferma
						</button>
					</li>
					<li style="float:left">
						<button class="inventoryButton" style="margin-right:0px" onclick="toInventory(<?php echo "'content.php?inventory=".$inventory->id."'" ?>)">
									Indietro
						</button>
					</li>
					<li style="float: none;">
							<span class="inventoryTitle">
									Seleziona
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
								<input class="search" id="ricerca" onchange="startProductsList(true)" placeholder="Cerca" type="text"">
							</div>
						</div>
						</div>
					</li>
				</ul>
			</nav>
			
			<section class="responsiveGrid">
			
				<span id="elementGrid">

				</span>
			</section>
			
			<div id="modalSubmit" class="modal" style="display: none;">
				<!-- Modal content -->
				<div class="modal-content" style="max-width: 380px;">
					
						<ul class="modal-header">
							<li style="float:right">
								<a class="modalSubmit_close closeButton">×</a>
							</li>
							<li style="float: none;">
								<p class="modalTitle">Selezione</p>
							</li>
						</ul>
						<div class="modal-body">
							<div id="response">
								<p>Caricamento</p>
							</div>
						</div>
					<br>
						
				</div>	
			</div>
			
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