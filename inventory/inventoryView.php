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
			<title>InventarIUM</title>
			<link rel="icon" href="<?php echo ROOT; ?>/icon.ico" />
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
					
					document.search = startInventoryList;
					
					startInventoryList();
				}
			</script>
	</head>
	<body class="fullPage">
		<div class="content">
		
			<?php include "php/components/headerStart.php" ?>
			<?php include "php/components/headerEnd.php" ?>
		
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
			
		</div>
		
		<?php include "php/components/footer.php" ?>
	
	</body>

</html>