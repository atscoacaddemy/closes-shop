<!-- user content -->
<script type="text/javascript">
function addProduct()
	{		
		var name = $("#name").val();
		 
		  if(name.length<=0 )
		 	{
		 		alert(" You must input comment name");
		 		return false;
		 	}
		 return true;
		
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
function deleteProduct()
{
	var userId=$("#txtUserId").val();
	$("#message-panel").load("action/action_comment.php?action=delete",{'id':userId});
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
<?php
	require_once("../../utility/Utils.php");
	include_once ("../../controller/config.php");
	$curPage = "";
	if (isset($_GET["page"]))
		$curPage = (int) $_GET["page"];
    $curPage = $curPage>0?$curPage:1;
	$curItem = ($curPage-1)*$maxItems;
?>
<div id="wrapper">
<div id="content">
	<div id="box">
		<h3>Comments List</h3>
		<table width="100%">
			<thead>
				<tr>
					<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>					
					<th width="10px"><a href="#">Product ID</a></th>
					<th width="10px"><a href="#">User ID</a></th>
					<th width="200px"><a href="#">Detail</a></th>
					<th width="70px"><a href="#">Create Date</a></th>
					<th width="65px"><a href="#">Action</a></th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				require_once ("../../controller/CommentController.php");
				$comments=CommentController::GetAll($curItem,$maxItems);
				$totalItems=CommentController::Count();
				if ($totalItems != 0) {
				foreach ($comments as $comment) 
				{
					if($comment["ID"] != null && $comment["ID"] != "")
					{
						?>
						<tr>
						<td class="a-center" width="40px"><?php echo $comment["ID"]; ?></td>
						
						<td width="70px"><?php echo $comment["Product_ID"] ;?></td>
						<td width="70px"><?php echo $comment["User_ID"] ;?></td>
						<td width="450px"><?php echo $comment["Detail"] ;?></td>
						<td width="180px"><?php echo $comment["Create_Date"] ;?></td>
						
						<td width="65px"><a href="?action=view&<?php echo "id=".$comment["ID"]; ?>" ><img src="img/icons/user.png" title="Detail" width="16" height="16" /></a><a href="<?php echo "?action=edit&id=".$comment["ID"]; ?>"><img src="img/icons/user_edit.png" title="Edit" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete(<?php echo $comment["ID"]; ?>);"><img src="img/icons/user_delete.png" title="Delete" width="16" height="16" /></a></td>
						</tr>
						<?php
					}
				}
				} else {
					echo 'No comment at here';
				}
				?>
				
				
			</tbody>
		</table>
	
			<?php 
				
				$strLink = "comment_index.php?";
								$strPaging = Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
								echo $strPaging; 
				
			?>
			
			<!--
			Page <a href="#"><img src="img/icons/arrow_left.gif" width="16" height="16" /></a>
									<input size="1" value="1" type="text" name="page" id="page" />
									<a href="#"><img src="img/icons/arrow_right.gif" width="16" height="16" /></a>of 42
									pages | View
									<select name="view">
										<option>10</option>
										<option>20</option>
										<option>50</option>
										<option>100</option>
									</select>
									per page | Total <strong>420</strong> records found-->
			
			
		
	</div>
	<br />
	<!--div id="box">
		<h3 id="adduser">COMMENT</h3>
		<form id="form" action="action/action_promotion.php?action=addNew" method="post" onsubmit="return addProduct();">
			<fieldset id="personal">
				<legend>
					ADD
				</legend>
				<label for="productid">Product ID : </label>
				<input name="productid" id="productid" type="text" tabindex="1" />
				
				<br />				
				<label >User ID : </label>	
				<input name="userid" id="userid" type="text"
								tabindex="2" />				
				<br/>
				<label for="enddate">Create date : </label>	
				<input name="enddate" id="enddate" type="text"
								tabindex="2" />			
															
				<br/>
				<?php
												//$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."/library/fckeditor/";
												// include("../../library/fckeditor/fckeditor.php");
												// $description = new FCKeditor("description");
												// $description->BasePath = "../../library/fckeditor/";
												// $description->Height=300;
												// $description->Value = "";
												// $description->ToolbarSet = 'MyTool';
												// $description->Create();
											?>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnAddProduct" />
				<input id="button2" type="reset" />
			</div>
		</form>
	
	</div-->
</div>


<div class="lightbox" id="lightbox"> </div><!-- /lightbox -->
<!-- Confirm Messagebox -->
<div class="lightbox-panel" id="message-panel">
    <form id="form" action="..." method="post">
			<fieldset id="personal">
				<legend>
					REMOVE COMMENT
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
<!-- -->
<!-- Confirm Messagebox -->
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
	echo "<script> showMessageOk(); </script>";
?>
</div>