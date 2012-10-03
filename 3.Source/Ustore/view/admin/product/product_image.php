<?php 
require_once ("../../controller/ProductController.php");
require_once ("../../controller/ProductImageController.php");
?>
<script>
	function deleteImg(imageType, productId) {
		var doIt = confirm('Do you want to proceed?');
		if(doIt) {
			$("#msgResult").load("action/action_product.php?action=deleteImage&imgType=" + imageType + "&proId=" + productId);
			$("#msgResult").fadeIn(300);
		}

	}

	function closePopupEdit() {
		$("#msgResult").fadeOut(300);
		$("#dvImgResult").fadeOut(300);
	}

	function show_image(src) {
		$("#imgResult").attr('src',src);
		$("#dvImgResult").fadeIn(300);
	}
</script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<!--<form id="form" action="" method="post">-->
		<?php
		$image =  ProductImageController::GetImageOfProductFromProductID($_REQUEST['proId']);
		?>
			<fieldset id="personal">
				<legend>
					EDIT IMAGE TO PRODUCT
				</legend
				<label >Cover_Img : </label>
				<a href="#" onclick="show_image('<?php echo "../../".$image['Cover_Img']; ?>');"><?php echo $image['Cover_Img']; ?> </a>
				<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('Cover_Img',<?php echo $_REQUEST["proId"]; ?>)">	
				<?php    
				  require_once "../../utility/phpfileuploader/phpuploader/include_phpuploader.php" ;
			            $uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Cover_Img";    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Cover_Img&proId=".$_REQUEST["proId"];    
			            $uploader->Render();    
        			?> 
				
		 
					<?php
				for($i=1;$i<6;$i++)
				{
				?>
				<br/>
				<label>Preview_Img_0<?php echo $i; ?> : </label>
				<a href="#" onclick="show_image('<?php echo "../../".$image['Preview_Img_0'.$i]; ?>');"><?php echo $image['Preview_Img_0'.$i]; ?> </a>
				<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo "Preview_Img_0".$i; ?>',<?php echo $_REQUEST["proId"]; ?>)"> 	
				<?php		
				$uploader=new PhpUploader();    
			            $uploader->Name="myuploader_Preview_Img_0".$i;    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Preview_Img_0".$i."&proId=".$_REQUEST["proId"];    
			            $uploader->Render();  
						?>
						
				<?php
				}
				?>
				<?php
				for($i=1;$i<21;$i++)
				{
					$imgName="Detail_Img_";
					if($i<10)
						$imgName=$imgName."0".$i;
					else {
						$imgName=$imgName.$i;
					}
				?>
				<br/>
				<label>Detail_Img_<?php echo $imgName; ?> : </label>
					<a href="#" onclick="show_image('<?php echo "../../".$image[$imgName]; ?>');"><?php echo $image[$imgName]; ?> </a>		
				<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo $imgName; ?>',<?php echo $_REQUEST["proId"]; ?>)">	
				<?php		
				$uploader=new PhpUploader(); 
						$uploadName="";
						if($i<10)   
							$uploadName.="0".$i;
						else {
							$uploadName.=$i;
						}
			            $uploader->Name="myuploader_Detail_Img_".$uploadName;    
			            //Create a new file upload handler    
			            $uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Detail_Img_".$uploadName."&proId=".$_REQUEST["proId"];    
			            $uploader->Render();  
						?>
						
				<?php
				
				}
				?>
				<!--
				<br/>
								<label>Detail_Img_10 : </label>		
								<img src="img/icons/user_delete.png"	style="cursor:pointer;"	onclick="deleteImg('<?php echo "Detail_Img_10"; ?>',<?php echo $_REQUEST["proId"]; ?>)">	
								<?php		
								$uploader=new PhpUploader();    
										$uploader->Name="myuploader_Detail_Img_10";    
										//Create a new file upload handler    
										$uploader->UploadUrl="../../utility/phpfileuploader/my_handler.php?imgType=Detail_Img_10".$i."&proId=".$_REQUEST["proId"];       
										$uploader->Render();  
										?>-->
				
				
			</fieldset>
			
			
		<!--</form>-->
	</div>
	</div>
	<div class="lightbox-panel" id="msgResult"></div>
	<div class="lightbox-panel" id="dvImgResult">
		<img id="imgResult" width="200" height="200"/>
		<br/>
		<input type="button" id="button1" onclick="closePopupEdit();" value="Close"/>
	</div>
</div>