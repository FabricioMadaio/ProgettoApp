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
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryList.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">
			
			<link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="../css/share.css">


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
					
					var mShare = new Modal("modalShare",{
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
				
				document.showOptions = function(){
					updateVisibility("menu-option");
				}
				
			</script>
	</head>

	
	<?php $shareUrl = ROOT."inventoryShare/content.php?inventory=".$inventory->id;?>

	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
				
				<ul class="navbar" style="background-color: #4d4dcc;border-color:#4d4dcc">
					<li style="float:right;position:relative">
						<a class="inventoryButton specialButton" onclick="document.showOptions()" style="margin-left:0px">
									Opzioni
						</a>
						<div class="menu-option menu-content" style="display: block;right: 0;background: #12167b;min-width:110px;margin-top: 5px;display:none;">
						<ul class="navbar">
						
							<li>
								<a class="modalRemove_open"> Rimuovi </a>
							</li>
							<li>
								<a class="modalShare_open"> Condividi </a>
							</li>
						</ul>
					</div>
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
		<div id="modalShare" class="modal" style="display: none;">
		
			  <!-- Modal content -->
			  <div class="modal-content" style="max-width: 420px;">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="modalShare_close closeButton">×</a>
						</li>
						<li style="float: none;">
							<p class="modalTitle">Condividi inventario</p>
						</li>
					</ul>
					<div class="modal-body" id="modalBodyShare" style="margin-top: 10px;text-align: center;">
						<br>
						<br>
						<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $shareUrl ?>" target="_blank" class="share-btn facebook"
							onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')";>
								<i class="fa fa-facebook"></i>
						</a>
						<a href="http://twitter.com/share?url=<URL>&text=Dai uno sguardo il mio inventario! - <?php echo $shareUrl ?>" target="_blank" class="share-btn twitter"
							onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')";>
								<i class="fa fa-twitter"></i>
						</a>
						<a href="https://plus.google.com/share?url=<?php echo $shareUrl ?>" target="_blank" class="share-btn google-plus"
							onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')";>
							<i class="fa fa-google-plus"></i>
						</a>	
						<a href="http://reddit.com/submit?url=<?php echo $shareUrl ?>" target="_blank" class="share-btn reddit"
							onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')";>
							<i class="fa fa-reddit"></i>
						</a>
						<br>
						<br>
					</div>
					
					<div  id="footerShare" class="modal-footer">
					
					</div>
					
				</div>
			 </div>	
		
		</div>
		
		
		<?php include "../php/components/footer.php" ?>

	</body>

    <?php include "../php/components/barcodeInsert.php" ?>

</html>