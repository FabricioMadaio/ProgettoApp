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
			<link rel="icon" href="../icon.ico" />
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryList.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">


			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/inventoryContent.js"></script>
			<script src="../javascript/deleteInventory.js"></script>
			<script src="../javascript/deleteProductsFromInventory.js"></script>
			<script src="../javascript/updateAmount.js"></script>

			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var mNew = new Modal("modalNew",{
						onOpen:null,
						onClose:null
					});
					
					var mRemove = new Modal("modalRemove",{
						onOpen:null,
						onClose:null
					});

					document.deleteInv=function()
					{
						deleteInventory(<?php echo $inventory->id;?>,mRemove);
					}
					
					document.search = function(){
						loadInventoryContent(<?php echo $inventory->id ?>);
					}
					
					document.search();
					
				}

			</script>
	</head>

	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
				
				<ul class="navbar" style="background-color: #4d4dcc;border-color:#4d4dcc">
					<li style="float:right">
						<a class="inventoryButton specialButton modalRemove_open" style="margin-left:0px">
									Rimuovi
						</a>
					</li>
					<li style="float:left">
						<a class="inventoryButton" style="margin-right:0px" href="<?php echo ROOT; ?>">
									Indietro
						</a>
					</li>
					<li style="float: none;">
							<span class="inventoryTitle">
									<?php echo $inventory->name;?>
							</span>
					</li>
				</ul>
				
				
			<?php include "../php/components/headerEnd.php" ?>
			
			<div class="barSpace"></div>
			
			<section class="responsiveGrid">
					<div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent modalNew_open">
								<img class="imageAdd" src="../img/logoAdd.png" alt="logo aggiungi prodotto">
							</div>
						</div>
						
						<span class="inventoryName" style="visibility: hidden;" >lorem</span><!--This span is for verical allignamet of the div elements-->
						
					</div>
					<div id="elementGrid">
						
					
					</div>
			</section>
			
			<div id="modalNew" class="modal" style="display: none;">
		
			  <!-- Modal content -->
			  <div class="modal-content" style="max-width: 380px;">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="modalNew_close closeButton">×</a>
						</li>
						<li style="float: none;">
							<p class="modalTitle">Inserimento prodotto</p>
						</li>
					</ul>
					<div class="modal-body">
						
						<div class="modalButtonBox">
							<a class="modal-button" onclick="toProductSelection(<?php echo "'index.php?inventory=".$inventory->id."'" ?>)">Scegli dalla lista</a>
							<p>oppure</p>
							<a class="modal-button" onclick="toItemUpload(<?php echo "'index.php?inventory=".$inventory->id."'" ?>)" style="background-color: #08a9ea;">Inserisci nuovo</a>
							<br>
						</div>
					</div>
				<br>
					
				</div>
			 </div>	
			
			<div id="modalRemove" class="modal" style="display: none;">
		
			  <!-- Modal content -->
			  <div class="modal-content" style="max-width: 420px;">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="modalRemove_close closeButton">×</a>
						</li>
						<li style="float: none;">
							<p class="modalTitle">Cancella inventario</p>
						</li>
					</ul>
					<div class="modal-body" id="modalBodyRemove">
							<div id="messageRemove">
								<p>Sei sicuro di voler eliminare l'inventario?</p>
							</div>
							<div id="responseRemove">
							
							</div>
							<br>
							<br>
					</div>
					
					<div  id="footerRemove" class="modal-footer">
					
							<form class="form" id="formNew" action="javascript:document.deleteInv()" method="POST"> 
								<input type="submit"  name="inventorySubmit" class="submit submitLeftButton" value="Si"/>
								<input type="button" name="cancelButton" class="submit submitRightButton modalRemove_close " value="No" >
								<input type="button" name="cancelButton" style="display:none;" class="submit submitRightButton modalRemove_close " value="Chiudi" >
							</form>
					
					</div>
					
				</div>
			 </div>	
		
		</div>
		
		
		<?php include "../php/components/footer.php" ?>

	</body>

</html>