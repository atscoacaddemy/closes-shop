<!-- user content -->
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
	$("#message-panel").load("action/action_promotion.php?action=delete",{'id':userId});
}
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
		<h3>Promotions List</h3>
		<table width="100%">
			<thead>
				<tr>
					<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>					
					<th><a href="#">Name</a></th>
					<th><a href="#">Detail</a></th>
					<th width="90px"><a href="#">Start Date</a></th>
					<th width="70px"><a href="#">End Date</a></th>
					<th width="60px"><a href="#">Action</a></th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				require_once ("../../controller/PromotionController.php");
				$products=PromotionController::Get($curItem,$maxItems);
				$totalItems=PromotionController::Count();
				if ($totalItems != 0) {
				foreach ($products as $product) {
					?>
					<tr>
					<td class="a-center"><?php echo $product["ID"]; ?></td>
					<td><a href="?action=view&<?php echo "id=".$product["ID"]; ?>"><?php echo $product["Name"] ;?></a></td>
					<td><?php echo $product["Detail"] ;?></td>
					<td><?php echo $product["Apply_Date_Start"] ;?></td>
					<td><?php echo $product["Apply_Date_End"] ;?></td>
					<td><a href="?action=view&<?php echo "id=".$product["ID"]; ?>" ><img src="img/icons/user.png" title="Detail" width="16" height="16" /></a><a href="<?php echo "?action=edit&id=".$product["ID"]; ?>"><img src="img/icons/user_edit.png" title="Edit" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete(<?php echo $product["ID"]; ?>);"><img src="img/icons/user_delete.png" title="Delete" width="16" height="16" /></a></td>
					</tr>
					<?php
					}
				} else {
					echo 'chua co san pham nao';
				}
				?>
				
				
			</tbody>
		</table>
	
			<?php 
				
				$strLink = "promotion_index.php?";
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
				<input name="startdate" id="datepicker" type="text"
								tabindex="2" />				
				<br/>
				<label for="enddate">End date : </label>	
				<input name="enddate" id="datepicker" type="text"
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