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
			<script src="../javascript/deleteProducts.js"></script>
			<script src="../javascript/inventoryList.js"></script>
			
			<script> 
	        	window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var m = new Modal("myModal",{
						onOpen:null,
						//onClose:null;
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
		    <!-- The Modal -->
			<div id="myModal" class="modal">
		
			  <!-- Modal content -->
			  <div class="modal-content">
				<form class="form" id="formNew" action=<?php echo "javascript:deleteProduct(".$item->id.")"; ?> method="POST"> 
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Nuovo Inventario</p>
						</li>	  
					</ul>
					<div class="modal-body" id="modalBody">
						
							<p>Sei sicuro/a di volerlo cancellare da tutti gli inventari?</p>
							<br>
							<br>
							<div id="response">
							
							</div>
							
					</div>
					
					<div  id="footer" class="modal-footer">
							<input type="submit"  name="inventorySubmit" class="submit submitLeftButton" value="Si"/>
							<input type="button" name="cancelButton" class="submit submitRightButton myModal_close " value="No" >
							<input type="button" name="cancelButton" style="display:none;" class="submit submitRightButton myModal_close " value="Chiudi" >
					</div>
					
				</form>

			  </div>
			 </div>
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
									<input type="submit" class="submit submitRightButton myModal_open" value="Cancella" style="background-color:red">
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