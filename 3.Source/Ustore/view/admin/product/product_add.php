<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					INFORMATION
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<br />
				<label for="description">Description : </label>
				<textarea name="description" id="description"></textarea>
				<br />
				<!--
				<input name="role" id="role" type="text"
								tabindex="2" />-->				
				
				<label for="type">Type : </label>			
				<input name="type" id="type" type="text"/>
				<br />
				<label for="sub_type">Sub_Type : </label>			
				<input name="sub_type" id="sub_type" type="text"/>
				<br/>
				<label for="price">Price : </label>			
				<input name="price" id="price" type="text"/>
				<br />
				<label for="promotion_id">Promotion_ID : </label>			
				<input name="promotion_id" id="promotion_id" type="text"/>
			</fieldset>
			
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnAddProduct"/>
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
	</div>
</div>