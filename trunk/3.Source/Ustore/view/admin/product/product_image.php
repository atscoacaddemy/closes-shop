<?php require_once ("../../controller/ProductController.php");
?>
<script>
	function deleteImg(imageType,productId)
	{
		var doIt=confirm('Do you want to proceed?');
	  if(doIt){
	    $("#msgResult").load("action/action_product.php?action=deleteImage&imgType="+imageType+"&proId="+productId);
		$("#msgResult").fadeIn(300);
	  }
	  
		
	}
	function closePopupEdit() {
  $("#msgResult").fadeOut(300);
	}
</script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<!--<form id="form" action="" method="post">-->
		
			<fieldset id="personal">
				<legend>
					EDIT IMAGE TO PRODUCT
				</legend>
				<label >Cover_Img : </label>		
				<?php    
				  require_once "../../utility/phpfileuploader/phpuploader/include_phpuploader.php" ;
			            $uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Cover_Img";    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Cover_Img&proId=".$_REQUEST["proId"];    
			            $uploader->Render();    
        			?> 
				
		<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('Cover_Img',<?php echo $_REQUEST["proId"]; ?>)"> 
					<?php
				for($i=1;$i<6;$i++)
				{
				?>
				<br/>
				<label>Preview_Img_0<?php echo $i; ?> : </label>	
				<?php		
				$uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Preview_Img_0".$i;    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Preview_Img_0".$i."&proId=".$_REQUEST["proId"];    
			            $uploader->Render();  
						?>
						<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo "Preview_Img_0".$i; ?>',<?php echo $_REQUEST["proId"]; ?>)"> 
				<?php
				}
				?>
				<?php
				for($i=1;$i<10;$i++)
				{
				?>
				<br/>
				<label>Detail_Img_0<?php echo $i; ?> : </label>			
				<?php		
				$uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Detail_Img_0".$i;    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Detail_Img_0".$i."&proId=".$_REQUEST["proId"];    
			            $uploader->Render();  
						?>
						<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo "Detail_Img_0".$i; ?>',<?php echo $_REQUEST["proId"]; ?>)">
				<?php
				
				}
				?>
				<br/>
				<label>Detail_Img_10 : </label>			
				<?php		
				$uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Detail_Img_10";    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Detail_Img_10".$i."&proId=".$_REQUEST["proId"];       
			            $uploader->Render();  
						?>
				<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo "Detail_Img_10"; ?>',<?php echo $_REQUEST["proId"]; ?>)">
			</fieldset>
			
			
		<!--</form>-->
	</div>
	</div>
	<div class="lightbox-panel" id="msgResult"></div>
</div>