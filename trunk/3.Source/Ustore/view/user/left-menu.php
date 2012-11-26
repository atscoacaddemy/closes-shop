	<script type="text/javascript">
		function doFilter(type) {
			window.location='product-list.php?type=' + type;
		}
	</script>
			<?php 
			$typeList=ProductController::GetProductTypes();
			$selectedSubtype = 0;
			if (!$_GET['type'] == '0') {
				$selectedSubtype = $_GET['type'];
			}
			if (isset($product_detail)){
				$selectedSubtype = $product_detail['Type'];
			}
			function isSelected($selectedType1,$type1)
			{
				if ($selectedType1 == $type1) {
					echo 'selected';
				} else {
					echo '';
				}
			}
			?>
			<div class="left-menu">
				<div class="category-label"><div>Category</div></div>
				<div class="sub-menu">
				<?php foreach ($typeList as $type) {?>
					<div  class="<?php isSelected($selectedSubtype,$type["ID"]);?>"  onclick="doFilter(<?php echo $type['ID']?>)">
						<?php echo $type["Type"]?>
					</div>
					<?php }?>
				</div>
				<div id="support">
					<div class="category-label"><div>Hỗ trợ</div></div>
					<div style="margin-top: 30px;">
						<div style="font-weight: bold;">Thành phố Hồ Chí Minh</div>
						<div class="yahoo">
							<a href="ymsgr:SendIM?luckyluc1988" title="Mr Nhật"> <img  border="0" src="http://opi.yahoo.com/online?u=luckyluc1988&amp;m=g&amp;t=22"> </a>
							<div>Mr Nhật - 0984669938</div>
						</div >
						<div class="yahoo">
							<a href="ymsgr:SendIM?goodking2403" title="Mr Quân"> <img  border="0" src="http://opi.yahoo.com/online?u=goodking2403&amp;m=g&amp;t=22"> </a>
							<div>Mr Quân - 0906622190</div>
						</div>
						<div style="font-weight: bold; padding-top: 10px;">Mỹ Tho</div>
						<div class="yahoo">
							<a href="ymsgr:SendIM?boolep_1188" title="Ms Xuân"> <img  border="0" src="http://opi.yahoo.com/online?u=boolep_1188&amp;m=g&amp;t=22"> </a>
							<div>Ms Xuân - 0972150979</div>
						</div>
					</div>
				</div>
				</div>