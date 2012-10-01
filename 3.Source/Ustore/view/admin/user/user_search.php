<?php
include('../../controller/config.php');
?>
<script type="text/javascript">
function search()
	{		
		 var name = $("#name").val();
		 var mail = $("#email").val();
		$("#dvSearchResult").load("action/action_user.php?action=search",{'name':name,'email':mail});
		
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
</script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">USER</h3>
		<form id="form" action="action/action_product.php" method="post">
			<fieldset id="personal">
				<legend>
					SEARCH
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<br />
				<label for="email">Email : </label>
				<input name="email" id="email" type="text" tabindex="1" />
				<br />
				
			
			<div align="center">
				<input id="button1" type="button" value="Search" name="btnSearch" onclick="search();"/>
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
	<div id="dvSearchResult">
	
	
	</div>
	</div>
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
	<div class="lightbox" id="lightbox"> </div><!-- /lightbox -->
	<div class="lightbox-panel" id="info-panel"></div>
</div>