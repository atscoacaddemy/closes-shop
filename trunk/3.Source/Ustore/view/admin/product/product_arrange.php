<?php
include('../../controller/config.php');
include_once ("../../controller/ProductController.php");
?>
<head>
    <meta charset="utf-8" />
    <title>jQuery UI Sortable - Display as grid</title>
    <link rel="stylesheet" type="text/css" href="../../template/css/jquery-ui-1.9.0.custom.min.css">
    <script type="text/javascript" src="../../template/js/jquery.min.js">
	</script>
	<script type="text/javascript" src="../../template/js/jquery-ui-1.9.0.custom.min.js">
	</script>
    <style>
    #sortable {
    		 list-style-type: none; margin: 0; padding: 0; width: 950px; 
    	}
    #sortable li {cursor: move; margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 1em; text-align: center; }
    </style>
    <script>
    function search()
	{		
		 var name = "";
		 var description = "";
		 var type = $("#type").val();
		 var sub_type = -1;
		 var promotion_id = "";
		 var present_type = -1;
		 var pricefrom = "";
		 var priceto = "";
		 //alert(name+"_"+description+"_"+type+"_"+present_type);
		$("#sortable").load("action/action_product.php?action=search4Arrange",{'name':name,'description':description,'type':type,'sub_type':sub_type,'promotion_id':promotion_id,'present_type':present_type,'pricefrom':pricefrom,'priceto':priceto});
	}
    function save()
	{		
    	var arrProduct = {};
    	var i = 0;
    	$.each($('.ui-state-default'),function (){
    		arrProduct[this.id] = i;
    		i ++;
        	});
    	$.ajax({
			  url: "action/action_product.php?action=arrange",
			  data : {
  			  		'arrProduct':arrProduct
  			  	}
			}).done(function() { 
				
			  alert('Successful !');
			  search();
			});
	}
    $(function() {
        var arrProduct = [];
    	search();
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });
    $(function() {
        $('#type').change(function() {
        	search();
        });
  	});
    $(function() {
        $('#save').click(function() {
        	save();
        });
  	});
    </script>
</head>
<script type="text/javascript">
</script>
<div id="wrapper">
<div id="content">
<div id="box">
		<h3 id="adduser">PRODUCT ARRANGEMENT</h3>
		<form id="form" action="action/action_product.php" method="post">
			<div align="center">
			
				<label for="type">Type : </label>	
				<select name="type" id="type" style="float:left">
				<?php
					$roles=ProductController::GetProductTypes();
					for ($i=0;$i<count($roles);$i++) {						
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Type"]."</option>";						
					}
				?>
				</select>
				<div style="clear: both; margin-bottom: 30px;"></div>		
				<ul id="sortable">
				</ul>
 				<div style="clear: both;"></div>
				<input id="save" type="button" value="Save" name="btnSearch" style="width: 200px; color: red; font-weight: bold;"/>
			</div>
		</form>
		<div id="dvSearchResult"/>
	</div>
	</div>
</div>