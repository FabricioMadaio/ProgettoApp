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
			<script src="../javascript/productsListSearch.js"></script>
			<script src="../javascript/productSelection.js"></script>
			
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet(true);
					startProductsList();
					
					document.search = startProductsList;
					
				}
			</script>
	</head>
	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
			<?php include "../php/components/headerEnd.php" ?>
			
			<section class="responsiveGrid">
			
				<span id="elementGrid">
	                
				</span>
			</section>
			
		</div>
		
		<?php include "../php/components/footer.php" ?>

	</body>

</html>