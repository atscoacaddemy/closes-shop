<?php
	require_once ("../../controller/ProductController.php");
	$product=ProductController::GetProductByID($_REQUEST["id"]);
?>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					INFORMATION
				</legend>
				<p>ID : <?php echo $product["ID"]; ?></p>
				<p>Name : <?php echo $product["Name"]; ?></p>
				<p>Description : <?php echo $product["Description"]; ?></p>
				<p>Type : <?php echo $product["Type"]; ?></p>
				<p>Sub_Type : <?php echo $product["Subtype_Name"]; ?></p>
				<p>Price : <?php echo $product["Price"]; ?></p>
				<p>Promotion_ID : <?php echo $product["Promotion_ID"]; ?></p>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="button" value="Edit image" onclick="window.location='product_index.php?action=image&proId=<?php echo $product["ID"]; ?>'"/>
				<input id="button1" type="button" value="Back" onclick="window.location='product_index.php'"/>			
			</div>
		</form>
	</div>
	</div>
</div>