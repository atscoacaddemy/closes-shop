<script type="text/javascript" src="template/js/CevherLink.min.js"></script>
<script>
$(document).ready(

function(){
$(".cevherlink").CevherLink(
{
   //YOU CAN CHANGE THIS OPTIONS
   text: "",
   border:'1px #bbbbbb solid',
   corner:"5px",
   href:"http://www.facebook.com/chipvnshop",
   icon_src:"http://chip.vn/fb/close.png",   minimize:"http://chip.vn/fb/minimize.png",   maximize:"http://chip.vn/fb/maximize.png",		pause:"http://chip.vn/fb/pause.png", 	start:"http://chip.vn/fb/play.png",
   text_position:"top",
   text_font:"arial",
   text_weight:"bold",
   text_color:"#336699",
   size:"16px",
   background:"#ffffff",
   position:"bottom-left",
   popup_height:"124px",
   popup_width:"310px",
   language:"en_US",
   timer:"25",
      cookies:"0",   middle_html:""
//CHANGE END!

}

);
}
);
</script>
<div style="position: fixed; left: 0px; bottom: 20px;"></div>
<div class="cevherlink"
	style="position: fixed; z-index: 999999999; width: 310px; min-height: 124px; border: 1px solid rgb(187, 187, 187); background-color: rgb(255, 255, 255); visibility: visible; bottom: 20px; left: 30px; background-position: initial initial; background-repeat: initial initial;">
	<div id="cevher_text"
		style="max-width: 310px; max-height: 124px; color: rgb(51, 102, 153); margin: 2px auto; font-size: 16px; font-family: arial; font-weight: bold; padding: 4px 30px 4px 4px;"></div>
	<div id="cevher_middle"></div>
	<iframe id="cevherlink"
		src="http://www.facebook.com/plugins/likebox.php?locale=en_US&amp;href=http://www.facebook.com/ustorevn&amp;width=292&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=false&amp;header=false&amp;height=88"
		scrolling="no" frameborder="0"
		style="border: none; overflow: hidden; width: 292px; min-height: 62px; max-height: 90px; backgorund: #ccc;"
		allowtransparency="true"></iframe>
	<div id="cevher_link_timer"
		style="position: absolute; bottom: 3px; right: 30px;">12</div>
	<div id="cevher_start" check="1"
		style="position: absolute; bottom: 5px; right: 5px; display: block; cursor: pointer; color: rgb(85, 85, 85);">
		<img src="http://chip.vn/fb/play.png" width="16" height="16">
	</div>
	<div id="cevher_pause" check="0"
		style="position: absolute; bottom: 5px; right: 5px; cursor: pointer; color: rgb(85, 85, 85); display: none;">
		<img src="http://chip.vn/fb/pause.png" width="16" height="16">
	</div>
	<div id="cevher_close"
		style="position: absolute; right: 10px; top: 5px; cursor: pointer;">
		<img src="http://chip.vn/fb/close.png" width="16" height="16">
	</div>
	<div id="cevher_minimize"
		style="position: absolute; right: 30px; top: 5px; cursor: pointer; z-index: 9999;">
		<img src="http://chip.vn/fb/minimize.png" width="16" height="16">
	</div>
	<div id="cevher_maximize"
		style="position: absolute; right: 10px; top: 30px; cursor: pointer; display: none; z-index: 99999;">
		<img src="http://chip.vn/fb/maximize.png" width="16" height="16">
	</div>
</div>