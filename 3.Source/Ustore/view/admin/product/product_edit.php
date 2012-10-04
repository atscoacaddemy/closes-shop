<?php require_once ("../../controller/ProductController.php");
	$product = ProductController::GetProductByID($_REQUEST["id"]);
?>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					EDIT
				</legend>
				<input name="id" id="id" type="hidden" tabindex="1" value="<?php echo $product["ID"] ?>"/>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" value="<?php echo $product["Name"] ?>"/>
				<br />
				
				<!--
				<label for="description">Description : </label>
								<textarea name="description" id="description"><?php echo $product["Description"] ?></textarea>
								<br />-->
				
				<!--
				<input name="role" id="role" type="text"
								tabindex="2" />-->				
				
				<label for="type">Type : </label>	
				<select name="type" id="type">
				<?php
					$roles=ProductController::GetProductTypes();
					for ($i=0;$i<count($roles);$i++) {
						if($roles[$i]['ID']==$product["Type"])//select first option
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
						if($roles[$i]['ID']==$product["Sub_Type"])//select first option
							echo "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
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
						if($i==$product["Promotion_ID"])//select first option
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
				<input name="price" id="price" type="text" value="<?php echo $product["Price"] ?>" 
				onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" 
				/> <span style="font-size: 20px; color: red">,000</span>		
				<?php
												//$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."/library/fckeditor/";
												include("../../library/fckeditor/fckeditor.php");
												$description = new FCKeditor("description");
												$description->BasePath = "../../library/fckeditor/";
												$description->Height=300;
												$description->Value = $product['Description'];
												$description->ToolbarSet = 'MyTool';
												$description->Create();
											?>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnUpdateProduct"/>
			</div>
		</form>
	</div>
	</div>
</div>