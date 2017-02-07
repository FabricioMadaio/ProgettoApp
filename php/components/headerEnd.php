	<ul class="navbar searchBar">
		
		<li class="search">
			<div style="margin-left: 12px;">
			<div class="search">
				<div class="fileUpload" style="float: right;padding: 0px;background: none;border: none;">
				<a class="barcode-search">
					<img src=<?php echo "'".ROOT."img/barcode.png'"; ?> style="width: 100%;" alt="codice a barre" />
					<input type="file" id="barcodeImage" class="upload" accept="image/*">
				</a>
				</div>
				<div style="overflow: hidden;">
					<input class="search" id="ricerca" onchange="document.search();" placeholder="Cerca" type="text">
				</div>
			</div>
			</div>
		</li>
	</ul>
</nav>