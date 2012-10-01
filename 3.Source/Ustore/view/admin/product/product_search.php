<?php
include('../../controller/config.php');
include_once ("../../controller/ProductController.php");
?>
<script type="text/javascript">
function search()
	{		
		 var name = $("#name").val();
		 var description = $("#description").val();
		 var type = $("#type").val();
		 var sub_type = $("#sub_type").val();
		 var promotion_id = $("#promotion_id").val();
		 var present_type = $("#present_type").val();
		 var pricefrom = $("#pricefrom").val();
		 var priceto = $("#priceto").val();
		 //alert(name+"_"+description+"_"+type+"_"+present_type);
		$("#dvSearchResult").load("action/action_product.php?action=search",{'name':name,'description':description,'type':type,'sub_type':sub_type,'promotion_id':promotion_id,'present_type':present_type,'pricefrom':pricefrom,'priceto':priceto});
		
	}
function closePopupEdit() {
  $("#lightbox, #lightbox-panel, #info-panel").fadeOut(300);
  window.location.reload(true);
}
function showConfirmDelete(userId)
{
	$("#txtUserId").val(userId);
	$("#lightbox, #message-panel").fadeIn(300);
}
</script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					SEARCH
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<br />
				
				<label for="type">Type : </label>	
				<select name="type" id="type">
					<option selected="selected" value="-1"></option>
				<?php
					$roles=ProductController::GetProductTypes();
					for ($i=0;$i<count($roles);$i++) {						
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Type"]."</option>";						
					}
				?>
				</select>		
				<br />
				<label for="sub_type">Sub_Type : </label>	
				<select name="sub_type" id="sub_type">
					<option selected="selected" value="-1"></option>
					<?php
					$roles=ProductController::GetProductSubTypes();
					for ($i=0;$i<count($roles);$i++) {					
							echo "<option  value='".$roles[$i]["Type_ID"]."'>".$roles[$i]["Name"]."</option>";					
					}
				?>	
				</select>	
				<br/>
			
				<label for="promotion_id">Promotion_ID : </label>		
				<select name="promotion_id" id="promotion_id">
					<option selected="selected" value="-1"></option>
					<?php
					$roles=ProductController::GetProductPromotions();
					for ($i=0;$i<count($roles);$i++) {						
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";				
					}
				?>	
				</select>		
				<br />
				<label for="present_type">Present_Type : </label>		
				<select name="present_type" id="present_type">
					<option selected="selected" value="-1"></option>
					<?php
					$roles=ProductController::GetProductPresentTypes();
					for ($i=0;$i<count($roles);$i++) {						
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";						
					}
				?>	
				</select>		
				<br />
				<label for="pricefrom">Price : </label>			
				<input name="pricefrom" id="pricefrom" type="text"/>
				->
				<input name="priceto" id="priceto" type="text"/>
				
			</fieldset>
			
			<div align="center">
				<input id="button1" type="button" value="Search" name="btnSearch" onclick="search();"/>
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
	<div id="dvSearchResult">
	<!--
	<div id="box">
			<h3>Users</h3>
			<table width="100%">
				<thead>
					<tr>
						<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>					
						<th><a href="#">Name</a></th>
						<th><a href="#">Description</a></th>
						<th width="90px"><a href="#">Type</a></th>
						<th width="50px"><a href="#">Sub_Type</a></th>
						<th width="90px"><a href="#">Price</a></th>
						<th width="60px"><a href="#">Action</a></th>
					</tr>
				</thead>
				<tbody>
					<?php
					require_once ("../../controller/ProductController.php");
					$totalItems=ProductController::Count();
					$products=ProductController::GetAll(0,$totalItems);
					
					foreach ($products as $product) {
						?>
						<tr>
						<td class="a-center"><?php echo $product["ID"]; ?></td>
						<td><a href="?action=view&<?php echo "id=".$product["ID"]; ?>"><?php echo $product["Name"] ;?></a></td>
						<td><?php echo $product["Description"] ;?></td>
						<td><?php echo $product["Type"] ;?></td>
						<td><?php echo $product["Sub_Type"] ;?></td>
						<td><?php echo $product["Price"] ;?></td>
						<td><a href="?action=view&<?php echo "id=".$product["ID"]; ?>" ><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="<?php echo "?action=edit&id=".$product["ID"]; ?>"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete(<?php echo $product["ID"]; ?>);"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
						</tr>
						<?php
					}
					?>
					
					
				</tbody>
			</table>
		
				
			
				
			
		</div>-->
	
	</div>
	</div>
	<!-- Confirm Messagebox -->
<div class="lightbox-panel" id="message-panel">
    <form id="form" action="..." method="post">
			<fieldset id="personal">
				<legend>
					REMOVE PRODUCT
				</legend>
				<h3>Are you sure remove!</h3>
			</fieldset>
			
			
			<div align="center">
				<input id="txtUserId" type="hidden" />
				<input id="button1" type="button" value="Yes" onclick="deleteProduct();"/>
				<input  type="button" id="close-panel" value="No"/>
			</div>
		</form>
</div>
	<div class="lightbox" id="lightbox"> </div><!-- /lightbox -->
	<div class="lightbox-panel" id="info-panel"></div>
</div>