<?php require_once ("../../controller/CommentController.php");
$comment = CommentController::GetCommentByID($_REQUEST["id"]);
?>
<script type="text/javascript">
function addProduct()
	{		
		 var name = $("#name").val();
		 
		  if(name.length<=0 )
		 	{
		 		alert("You must input detail of product");
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

<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">COMMENT</h3>
		<form id="form" action="action/action_comment.php?action=edit&id=<?php echo $comment["ID"]; ?>" method="post" onsubmit="return addProduct();">
			<fieldset id="personal">
				<legend>
					Detail of Comment
				</legend>
				
				<p>Product ID : <?php echo $comment["Product_ID"]; ?></p>
				<p>User ID: <?php echo $comment["User_ID"]; ?></p>
				<p>Detail: <?php echo $comment["Detail"]; ?></p>
				<p>Create date : <?php echo $comment["Create_Date"]; ?></p>
				
			</fieldset>
			
			<div align="center">
				<input id="button1" type="button" value="Back" name="btnBack" onClick="history.back();"/>
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