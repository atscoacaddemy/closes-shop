<?php require_once ("../../controller/ProductController.php");
?>
<script type="text/javascript">
function addProduct()
	{		
		 var name = $("#name").val();
		 var description = $("#description").val();
		 var type = $("#type").val();
		 var sub_type = $("#sub_type").val();
		 var promotion_id = $("#promotion_id").val();
		 var present_type = $("#present_type").val();
		 var price = $("#price").val();
		 alert(name+"_"+description+"_"+type+"_"+present_type);
		$("#info-panel").load("action/action_product.php?action=addNew",{'name':name,'description':description,'type':type,'sub_type':sub_type,'promotion_id':promotion_id,'present_type':present_type,'price':price});
		$("#lightbox, #info-panel").fadeIn(300);
		
	}
function closePopupEdit() {
  $("#lightbox, #lightbox-panel, #info-panel").fadeOut(300);
  window.location.reload(true);
}
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					ADD
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<br />
				<label for="description">Description : </label>
				<textarea name="description" id="description"></textarea>
				<br />
				<!--
				<input name="role" id="role" type="text"
								tabindex="2" />-->				
				
				<label for="type">Type : </label>	
				<select name="type" id="type">
				<?php
					$roles=ProductController::GetProductTypes();
					for ($i=0;$i<count($roles);$i++) {
						if($i==0)//select first option
							echo "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Type"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Type"]."</option>";
						}
					}
				?>
				</select>		
				<br />
				<label for="sub_type">Sub_Type : </label>	
				<select name="sub_type" id="sub_type">
					<?php
					$roles=ProductController::GetProductSubTypes();
					for ($i=0;$i<count($roles);$i++) {
						if($i==0)//select first option
							echo "<option  selected='selected' value='".$roles[$i]["Type_ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["Type_ID"]."'>".$roles[$i]["Name"]."</option>";
						}
					}
				?>	
				</select>	
				<br/>
			
				<label for="promotion_id">Promotion_ID : </label>		
				<select name="promotion_id" id="promotion_id">
					<?php
					$roles=ProductController::GetProductPromotions();
					for ($i=0;$i<count($roles);$i++) {
						if($i==0)//select first option
							echo "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						}
					}
				?>	
				</select>		
				<br />
				<label for="present_type">Present_Type : </label>		
				<select name="present_type" id="present_type">
					<?php
					$roles=ProductController::GetProductPresentTypes();
					for ($i=0;$i<count($roles);$i++) {
						if($i==0)//select first option
							echo "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						}
					}
				?>	
				</select>		
				<br />
				<label for="price">Price : </label>			
				<input name="price" id="price" type="text"/>
				
			</fieldset>
			
			<div align="center">
				<input id="button1" type="button" value="Save" name="btnAddProduct" onclick="addProduct();"/>
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
	</div>
</div>