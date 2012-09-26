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
                        $(function() {
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
			//ajax comment			
			function checkLoginToComment()
			{
				//document.getElementById('idUser').innerHTML=" Phải nhập lại password mới và lơn hơn 5 kí tự!";
				var strUsername = $("#idUser").attr("value");
				var strTextComment = $("#txtComment").attr("value");
				alert("strUsername="+ strUsername);
				var change="";
			//	strTextComment=strTextComment.replace(/ /g,"_");
				strTextComment=strTextComment.replace(/&/g," ");
				strTextComment=strTextComment.replace(/#/g," ");
				strTextComment=strTextComment.replace(/\s+/g,"_");


				
				//alert(strTextComment.replace('&', '-'));
				//var change=changeString(strTextComment);
				
			//	alert("change="+strTextComment);
				if(strUsername != "")
				{
				//alert("strUsername not equal null="+ strUsername);
					if(strTextComment != null){
						
						var serverURL = "checkEmail.php?txtComment=" + strTextComment;
						//alert("strTextComment ="+ strTextComment);	
						$("#messCommentAjax").load(serverURL);
						
			//	alert("again="+ strTextComment);
					}
					else{
						alert("Bạn hãy điền nội dung mới comment được!")
					}
				}
				else
				{
					alert("Bạn phải đăng nhập mới comment sản phẩm này được!")
				}
				
			}
			
					
                </script>
        </head>
        <body class="body" >
 <?php include_once 'header.php';?>
                <div id="contain" class="contain contain box-transparent">
                        <div class="sub-menu-title">
                                <h1 style="top:20px">Túi Xách</h1>
                        </div>
                        <div class="left-menu">
                                <div class="sub-menu">
                                        <div >
                                                Tất cả sản phẩm
                                        </div>
                                        <div>
                                                For teen
                                        </div>
                                        <div>
                                                Sang trọng
                                        </div>
                                        <div>
                                                Cao cấp nhất
                                        </div>
                                </div>
                                <div id="support">
                                        <h1>Hỗ Trợ</h1>
                                        <div class="phone">
                                                09123456789
                                        </div>
                                        <div class="phone">
                                                09123456789
                                        </div>
                                        <div class="yahoo">
                                                <a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
                                                </div >
                                                <div class="yahoo">
                                                        <a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
                                                </div>
                                        </div>
                                        <div>
<!--                                            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fustore.vn&amp;width=292&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;border_color=blue&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:590px;" allowTransparency="true"></iframe> -->
                                        </div>
                                </div>
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
			

		}
		else
		{
			header("Location:product-list.php");
		}
	?>                     
                                <div >
                                        <div class="product-detail-picture">
										   <div id="image_wrap" >
												<div href='<?php echo $contextPath.$productImage[1];?>' class = "cloud-zoom" id="zoom1" rel="adjustX: 10, adjustY:-4">						
												<img  src="<?php echo $contextPath.$productImage[1];?>" title="Optional title display" width="330px" height="300px;" />
												
												</div>
											</div>
											<div id="img_scroll" style="border:0px; background: white; margin-top: 10px;">
												<!--scroll-->
												<div style="margin:0 auto; width: 634px; height:100px;">
													<!-- "previous page" action -->
													<a class="prev browse left"></a>
													<!-- root element for scrollable -->
													<div class="scrollable" id="scrollable" style="border:0px; margin-top:10px;">
															<!-- root element for the items -->
															<div class="items">
						
																<?php //show detail image
																	for($i=1;$i<7;$i++)
																	{
																		
																		if($productImage[$i] != null)
																		{ 
																?>
																<div style="width:102px">
																	<a href='<?php echo $contextPath.$productImage[$i];?>' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '<?php echo $contextPath.$productImage[$i];?>' "> 
																	<img src="<?php echo $contextPath.$productImage[$i];?>" alt = "Thumbnail 1"/></a>
																</div>
																<?php
																		}
																	}
																?>
																
															</div>
													</div>
													<!-- "next page" action -->
													<a class="next browse right"></a>
												</div>
												<!--end scroll-->
											</div>
                                        </div>
                                        <div class="product-description" id="product-description">
                                                <div class="product-title" id="product-title">
													<?php echo $product_detail[1];?>
												</div>
												<div>
													<?php echo $product_detail[6];?>
												</div>
                                                <div  class="product-price">
													Giá: <span><?php echo $product_detail[4];?></span><sup style="margin-left: 5px;">đ</sup>
												</div>
                                                <div class="stock-status">
                                                        <div>
                                                                Còn Hàng
                                                        </div>
                                                </div>
												<div>
													<span class="action-button-left"></span>						
														<input class="submitYellow" type="submit" value="Add Giỏ Hàng" id="btAddCart" name="btAddCart" />
														<span class="action-button-right"></span>
												</div>
												
                                        </div>
                                        <div style="float:left; width: 750px;">
                                               <?php //show detail image
													for($i=7;$i<17;$i++)
													{
														
														if($productImage[$i] != null)
														{
															echo "<img src='".$contextPath.$productImage[$i]."'/></br>";
														}
													}
												?>
                                        </div>
                                        <div class="comment-content">
                                        <div>
                                                <a id="comment-toggle" href="javascript:;" >4 comment(s)</a>
                                        </div>
<!--start comment -->	
                                        <div id="comment" style="display: none">
                                                <div id= "comment-list">
                                                       <?php //echo "count=".count($productComment);
													   
														for($i=0;$i<count($productComment);$i++)
														{
															if($productComment[$i] !=null)
															{
																echo "<div class='comment-item'>";
																$commentUser=UserController::GetUserByID($productComment[$i][2]);
														?>
															
																<div style="float:right" class="comment-info"><?php echo $commentUser[1]; echo " (".$productComment[$i][4].")"; ?></div>
																<div style="clear: both"></div>
																<div class="comment-detail"><?php echo $productComment[$i][3];?></div>
															
														<?php
																echo "</div>";
																
															}
														}
														?>
														<div id="messCommentAjax" name="messCommentAjax">
															<!--div style="float:right" class="comment-info">By dinhbanhut24 04/10/2012 1:00AM</div>
															<div style="clear: both"></div>
															<div class="comment-detail">Con ku kfdfadfdsfafsdasdfasdfasdfafdu</div-->
														 </div>
                                                </div>
                                                <div>
													<textarea id="txtComment" name="txtComment" rows="3" title="Write a comment" cols="80" class="comment-textarea">Write a comment</textarea>
												</div>
												<div>
														</br>
														<span class="action-button-left"></span>						
														<input class="submitYellow" type="button" value="Send comment" id="btSendComment" name="btSendComment" onclick="checkLoginToComment();"/>
														<span class="action-button-right"></span>
														<?php
														echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
														?>
												</div>
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
                                        $("#txtComment").css("background-color", "#EDEDED"); //You can use some more styling.
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

