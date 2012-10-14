<?php require_once ("../../controller/CommentController.php");
$comment = CommentController::GetCommentByID($_REQUEST["id"]);
?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#form").submit(function()
	{
		// var name = $("#description").attr("value");
		// if(name.length < 10)
		// {
			// alert("Bạn phải mô tả chi tiết sản phẩm lớn hơn 10 kí tự!");
			// return false;
		// }
		// return true;
	});
});

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
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" name="form" action="action/action_comment.php?action=edit&id=<?php echo $comment["ID"]; ?>" method="post" >
			<fieldset id="personal">
				<legend>
					Edit comment!
				</legend>
			
				<label for="name">Product ID : <?php echo $comment["Product_ID"]; ?></label>
							
				<br />
				<label for="name">User ID : <?php echo $comment["User_ID"]; ?></label>
													
				<br/>
				<?php
												//$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."/library/fckeditor/";
												include("../../library/fckeditor/fckeditor.php");
												$description = new FCKeditor("description");
												$description->BasePath = "../../library/fckeditor/";
												$description->Height=300;
												$description->Value =  $comment['Detail'];
												$description->ToolbarSet = 'MyTool';
												$description->Create();
											?>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnUpdateComment" />
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