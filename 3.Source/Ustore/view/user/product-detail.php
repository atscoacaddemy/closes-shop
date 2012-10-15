<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<?php $contextPath = "../../"?>
        <head>
                <meta http-equiv=Content-Type content='text/html; charset=utf-8'>
                <title></title>
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css" media="screen"/>
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/cloud-zoom.1.0.3/cloud-zoom.css"   />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/scrollable-horizontal.css"  />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/scrollable-buttons.css"   />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css"  media="screen">
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
                <script type="text/JavaScript" src="<?php echo $contextPath?>template/cloud-zoom.1.0.3/cloud-zoom.1.0.3.js"></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.tools.min.js" ></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui.js"></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/menu.js"></script>
<script type="text/javascript">
	$(function() 
	{
			$(".scrollable").scrollable();

			$(".items img").click(function() {
					// see if same thumb is being clicked
					if($(this).hasClass("active")) {
							return;
					}

					// calclulate large image's URL based on the thumbnail URL (flickr specific)
					var url = $(this).attr("src").replace("_t", "");

					// get handle to element that wraps the image and make it semi-transparent
					var wrap = $("#image_wrap").fadeTo("medium", 0.5);

					// the large image from www.flickr.com
					var img = new Image();

					// call this function after it's loaded
					img.onload = function() {

							// make wrapper fully visible
							wrap.fadeTo("fast", 1);

							// change the image
							wrap.find("img").attr("src", url);

							wrap.find("a").attr("href", url);
					};
					// begin loading the image from www.flickr.com
					img.src = url;

					// activate item
					$(".items img").removeClass("active");
					$(this).addClass("active");

					// when page loads simulate a "click" on the first image
			}).filter(":first").click();
	});
	function checkLoginToComment()
	{
		document.getElementById('idUser').innerHTML=" Phải nhập lại password mới và lớn hơn 5 kí tự!";
		var strUsername = $("#idUser").attr("value");
		var strProductID = $("#txtProductID").attr("value");
		var strTextComment = $("#txtComment").attr("value");
                var change="";
	//	strTextComment=strTextComment.replace(/ /g,"_");
		strTextComment=strTextComment.replace(/&/g," ");
		strTextComment=strTextComment.replace(/#/g," ");
		strTextComment=strTextComment.replace(/'/g," ");
		strTextComment=strTextComment.replace(/"/g," ");
		strTextComment=strTextComment.replace(/=/g," ");
		strTextComment=strTextComment.replace(/\s+/g,"_");
		
		if(strUsername != "")
		{
			if(strTextComment != null){
				//document.getElementById('messCommentAjax').innerHTML="";
				var serverURL = "checkEmail.php?txtComment=" + strTextComment +"&userID="+strUsername+"&productID="+strProductID;
				$("#messCommentAjax").load(serverURL);
			}
			else{
				alert("Bạn hãy điền nội dung mới comment được!")
			}
		}
		else
		{
			press_LoginToComment();
		//alert("Bạn phải đăng nhập mới comment sản phẩm này được!")
		}
		
	}

</script>
        </head>
        <body class="body" >
 <?php include_once 'header.php';?>
                <div id="contain" class="contain contain box-transparent">
       	<?php 
	if(isset($_REQUEST['productid']) && $_REQUEST['productid'] !=null) 
	{
		include_once ($contextPath."controller/ProductController.php");
		include_once ($contextPath."controller/CommentController.php");
	    include_once ($contextPath."controller/ProductImageController.php");
	    include_once ($contextPath."controller/UserController.php");
		$productid = $_REQUEST['productid'];
		$product_detail=ProductController::GetProductByID($_REQUEST['productid']);
		$productImage  =ProductImageController::GetImageOfProductFromProductID($productid);
		$productComment=CommentController::GetCommentFromProductID($productid);
		$_SESSION["addCart"]="true";
		

	}
	else
	{
		header("Location:product-list.php");
	}
	
	?>  
	<?php require_once 'left-menu.php';?>                  
<div >
	<div class="product-detail-picture">
		<div id="image_wrap" >
			<div href='<?php echo $contextPath.$productImage[1];?>' class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">		
				<img src="<?php echo $contextPath.$productImage[1];?>" alt='' title="Optional title display" width="330px" height="300px;"/>
			</div>
		</div>
		<div style="padding: 10px; border: solid wheat; width: 305px;">
					
						<?php //show detail image
							for($i=2;$i<7;$i++)
							{
								if($productImage[$i] != null)
								{ 
						?>
								<div style="float: left">
									<a href='<?php echo $contextPath.$productImage[$i];?>' class='cloud-zoom-gallery' title='Thumbnail 1' 
									rel="useZoom: 'zoom1', smallImage: '<?php echo $contextPath.$productImage[$i];?>' "> 
									<img width="60px" height="60px;" src="<?php echo $contextPath.$productImage[$i];?>" alt = "Thumbnail 1"/></a>
								</div>
						<?php
								}
							}
						?>	
						<div style="clear: both;"></div>						
				<!-- "next page" action -->
				<a class="next browse right"></a>
		</div>
	</div>
	 <!--form action="cart.php?productid=<?php //echo $productid; ?>" method="POST" id="form"-->
	 <form action="cart.php" method="POST" id="form">

			<div class="product-description" id="product-description">
				<div class="product-title" id="product-title">
					<h2><?php echo $product_detail[1];?></h2>
				</div>
				<div style="height: 200px; overflow: hidden;">
					<?php echo $product_detail[6];?>
				</div>
				
				<div  class="product-price">
					<span><?php echo number_format($product_detail[4], 0, ',', ',');?></span> 
				</div>
				<?php
				echo "<input name='txtProductID' id='txtProductID' type='text' style='width:300px;display:none;' value='".$productid."'>";
				?>
				<div>
					<input class="stock-status" type="submit" value="Thêm vào giỏ hàng" id="btAddToCard" name="btAddToCard" />
				</div>
			</div>
	</form>
		
		<div class="product-gallery" >
			<?php //show detail image
			for($i=7;$i<27;$i++)
			{
				if($productImage[$i] != null )
				{
					echo "<img src='".$contextPath.$productImage[$i]."'/></br>";
				}
			}
			?>
		</div>
	<!--start comment -->	
		<div class="comment-content" >
		<div id="messCommentAjax" name="messCommentAjax">
		<!--begin ajax for div messCommentAjax -->
					<?php 
					echo "<label type='text' class='suggest_comment' value=''>Phần đánh giá sản phẩm của các bạn</label></br>";
					echo "<div><a id='comment-toggle' href='javascript:;' >".count($productComment)." comment(s)</a></div>";
					echo "<div id='comment' style='display: none'>";
					echo "<div id= 'comment-list'>";
					
					//echo "count=".count($productComment);
					
					for($i=0;$i<count($productComment);$i++)
					{
						if($productComment[$i] !=null)
						{
							echo "<div class='comment-item'>";
							$commentUser=UserController::GetUserByID($productComment[$i][2]);
								echo "<div style='float:right' class='comment-info'>";
									echo $commentUser[1];
									echo "(".$productComment[$i][4].")";
								echo "</div>";
								echo "<div style='clear: both'></div>";
								echo "<div class='comment-detail'>";
									echo $productComment[$i][3];
								echo "</div>";
							echo "</div>";			
						}
					}
				echo "</div>";
			
				echo "<div>";
				echo "<textarea id='txtComment' name='txtComment' rows='3' title='Write a comment' cols='85' class='comment-textarea'>Write a comment</textarea>";
				echo "</div>";
				
				echo "<div>
						<span class='action-button-left'></span>						
						<input class='submitYellow' type='button' value='Send comment' id='btSendComment' name='btSendComment' onclick='checkLoginToComment();'/>
						<span class='action-button-right'></span></div>";
			    echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
			    echo "</div>";
					?>
				<!--text area -->
		<!--end ajax for div messCommentAjax -->
		</div>

<!--end comment -->				
				
					
				
<?php
	// echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
	
?>
					
					</div>
						<div style="clear: both;"></div>
				</div>
				<div style="clear: both;"></div>
			</div>
			
                         <?php include_once 'footer.php';?>
                         <script type="text/javascript">
                                $('#nav').spasticNav();
                                $('#comment-toggle').click(function() {
                                          $('#comment').toggle('slow', function() {
                                            // Animation complete.
                                          });
                                        });
                               
                                $(document).ready(function() {
                                        $("#txtComment").css("background-color", "#EDEDED"); 
                                        $("#txtComment").bind("focusin", function() {
                                                if ($("#txtComment").val() == 'Write a comment') {
                                                        $("#txtComment").val("");
                                                }
                                        });
                                        $("#txtComment").bind("focusout", function() {
										
                                                if ($("#txtComment").val() == '') {
                                                        $("#txtComment").val("Write a comment");
                                                }
                                        });
                                });
                        </script>
        </body>
</html>

