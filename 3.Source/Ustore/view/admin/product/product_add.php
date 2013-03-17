<?php require_once ("../../controller/ProductController.php");
?>
<script type="text/javascript">
function addProduct()
	{		
		 var name = $("#name").val();
		 //var description = $("#description").val();
		 //var type = $("#type").val();
		 //var sub_type = $("#sub_type").val();
		 //var promotion_id = $("#promotion_id").val();
		 //var present_type = $("#present_type").val();
		  var price = $("#price").val()+ '000';
		  if(name.length<=0 )
		 	{
		 		alert("Must input product name");
		 		return false;
		 	}
		 if( $("#price").val().length<=0) 
		 {
		 		alert("Must input price");
		 		return false;
		 }
		 return true;
		 //alert(name+"_"+description+"_"+type+"_"+present_type);
		//$("#info-panel").load("action/action_product.php?action=addNew",{'name':name,'description':description,'type':type,'sub_type':sub_type,'promotion_id':promotion_id,'present_type':present_type,'price':price});
		//$("#lightbox, #info-panel").fadeIn(300);
		
	}
function closePopupEdit() {
  $("#lightbox, #lightbox-panel, #info-panel, #info-addOk").fadeOut(300);
}
function showMessageOk(proId)
{
	$("#txtProAdded").val(proId);
	//alert(proId);
	$("#lightbox, #info-addOk").fadeIn(300);
}
function gotoAddImage()
{
	var id = $("#txtProAdded").val();
	window.location='product_index.php?action=image&proId='+id;
}
function showMessageFail()
{
$("#lightbox, #info-addFail").fadeIn(300);
}
</script>

<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php?action=addNew" method="post" onsubmit="return addProduct();">
			<fieldset id="personal">
				<legend>
					ADD
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<!--
				<br />
								<label for="description">Description : </label>
								<textarea name="description" id="description"></textarea>-->
				
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
				<input name="price" id="price" type="text"
				onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" 
				/>
				<span style="font-size: 20px; color: red">,000</span>		
				<br/>
				<?php
												//$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."/library/fckeditor/";
												include("../../library/fckeditor/fckeditor.php");
												$description = new FCKeditor("description");
												$description->BasePath = "../../library/fckeditor/";
												$description->Height=300;
												$description->Value = "";
												$description->ToolbarSet = 'MyTool';
												$description->Create();
											?>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnAddProduct" />
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
	</div>
	<div class="lightbox" id="lightbox"> </div><!-- /lightbox -->
	<div class="lightbox-panel" id="info-panel"></div>
	
	<div class="lightbox-panel" id="info-addOk">
		<form id="form" action="" method="post">
			<fieldset id="personal">
				<legend>
					MESSAGE
				</legend>
				<h4>Add completed</h4>
				<input id="txtProAdded" type="hidden"/>
				</fieldset>
				<div align="center">				
				<input  type="button" id="close-panel" value="Close" onclick="gotoAddImage();"/>
			</div>
		</form>
	</div>
	<?php
if(isset($_REQUEST['result']) && $_REQUEST["result"]>=0)
	echo "<script> showMessageOk(".$_REQUEST["result"]."); </script>";
?>
	<div class="lightbox-panel" id="info-addFail">
		<form id="form" action="" method="post">
			<fieldset id="personal">
				<legend>
					MESSAGE
				</legend>
				<h4>Add fail!</h4>
				</fieldset>
				<div align="center">				
				<input  type="button" id="close-panel" value="Close" onclick="closePopupEdit();"/>
			</div>
		</form>
	</div>
	<?php
	if(isset($_REQUEST['result']) && $_REQUEST["result"]<0)
	echo "<script> showMessageFail(); </script>";
?>
</div>