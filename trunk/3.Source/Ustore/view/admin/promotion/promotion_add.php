<?php require_once ("../../controller/ProductController.php");
?>
<script type="text/javascript">
function addProduct()
	{		
		 var name = $("#name").val();
		 
		  if(name.length<=0 )
		 	{
		 		alert("Must input product name");
		 		return false;
		 	}
		 return true;
		 //alert(name+"_"+description+"_"+type+"_"+present_type);
		//$("#info-panel").load("action/action_product.php?action=addNew",{'name':name,'description':description,'type':type,'sub_type':sub_type,'promotion_id':promotion_id,'present_type':present_type,'price':price});
		//$("#lightbox, #info-panel").fadeIn(300);
		
	}
function closePopupEdit() {
  $("#lightbox, #lightbox-panel, #info-panel, #info-addOk, #info-addFail").fadeOut(300);
}
function showMessageOk()
{
	$("#lightbox, #info-addOk").fadeIn(300);
}
function showMessageFail()
{
	$("#lightbox, #info-addFail").fadeIn(300);
}
</script>
<script>
    $(function() {
        $( "#startdate" ).datepicker();
    });
    $(function() {
        $( "#enddate" ).datepicker();
    });
    </script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PROMOTION</h3>
		<form id="form" action="action/action_promotion.php?action=addNew" method="post" onsubmit="return addProduct();">
			<fieldset id="personal">
				<legend>
					ADD
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				
				<br />				
				<label for="startdate">Start date : </label>	
				<input name="startdate" id="startdate" type="text"
								tabindex="2" />				
				<br/>
				<label for="enddate">End date : </label>	
				<input name="enddate" id="enddate" type="text"
								tabindex="2" />			
															
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
				</fieldset>
				<div align="center">				
				<input  type="button" id="close-panel" value="Close" onclick="closePopupEdit();"/>
			</div>
		</form>
	</div>
	<?php
if(isset($_REQUEST['result']) && $_REQUEST["result"]=='ok')
	echo "<script> showMessageOk(); </script>";
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
	if(isset($_REQUEST['result']) && $_REQUEST["result"]=='fail')
	echo "<script> showMessageFail(); </script>";
?>
</div>