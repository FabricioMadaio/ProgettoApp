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

			<title>Company Inventory </title>
			<link rel="icon" href="../icon.ico" />
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/retriveUserInfo.js"></script>
			<script type="text/javascript">
				window.onload = function()
				{
					retriveUserInfo();
				}
			</script>
			
	</head>

	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
			</nav>
			<br>
		    <!-- The Modal -->
			<div class="barSpace"></div>
			
			<section   class="sectionbox" style="text-align: center;">
			<div style="margin:21px">
				<h2> Contatti </h2>
				<div style="text-align: left;color: #655757;">
					<h3>Black Studios</h3>
					<hr style="border-style: ridge;">
					<table class="contacts">
						<tbody>
						<tr>
							<td> Giovanni Leo</td>
							<td>Mail: giovannileo595@gmail.com</td>
						</tr>
						<tr>
							<td> Fabricio N. Madaio</td>
							<td>Mail: fabricio.madaio@gmail.com</td>
						</tr>
						</tbody>
					</table>
					
					<br>
					<br>
					<h3>Contatta il supporto al Cliente</h3>
					<hr style="border-style: ridge;">
					<table class="contacts">
						<tbody>
						<tr>
							<td> Mail: blueinventory@hotmail.com</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			<br>
			</section>
			
			<br>
			<br>	
			
			</div>
		
		<?php include "../php/components/footer.php" ?>

	</body>

</html>