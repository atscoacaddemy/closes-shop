			<?php 
			$type = 1;
			$subtypeList=ProductController::getProductSubType($type);
			?>
			<div class="sub-menu-title">
				<h1 style="top:20px">Túi Xách</h1>
			</div>
			<div class="left-menu">
				<div class="sub-menu">
					<div  onclick="doFilter()">
						Tất cả sản phẩm
					</div>
				<?php foreach ($subtypeList as $subtype) {?>
					
					<div onclick="doFilter(<?php echo $subtype['ID']?>)">
						<?php echo $subtype["Name"]?>
					</div>
					<?php }?>
				</div>
				<div id="support">
					<h1>Hỗ Trợ</h1>
					<div style="font-weight: bold;">Thành phố Hồ Chí Minh</div>
					<div class="yahoo">
						<a href="ymsgr:SendIM?luckyluc1988" title="mr Nhut"> <img  border="0" src="http://opi.yahoo.com/online?u=luckyluc1988&amp;m=g&amp;t=16"> </a>
						<div>Mr Nhật - 0984669938</div>
					</div >
					<div class="yahoo">
						<a href="ymsgr:SendIM?goodking2403" title="mr Nhut"> <img  border="0" src="http://opi.yahoo.com/online?u=goodking2403&amp;m=g&amp;t=22"> </a>
						<div>Mr Quân - 0906622190</div>
					</div>
					<div style="font-weight: bold; padding-top: 10px;">Mỹ Tho</div>
					<div class="yahoo">
						<a href="ymsgr:SendIM?boolep_1188" title="mr Nhut"> <img  border="0" src="http://opi.yahoo.com/online?u=boolep_1188&amp;m=g&amp;t=13"> </a>
						<div>Ms Xuân - 0972150979</div>
					</div>
					</div>
					<div>
<!-- 						<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fustore.vn&amp;width=292&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;border_color=blue&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:590px;" allowTransparency="true"></iframe> -->
					</div>
				</div>