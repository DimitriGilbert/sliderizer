<?php

/*
build the html and initialize the slider in javascript;
$items => array; each row contain a raw html string;
$id => string; the id of the slider;
$sizes => array; 0 => width, 1 => height, in px;
$timing => int; number of ms between each items;
$effects => array; 0 => in effect, 1 => out effect;
*/
function sliderizer($items,$id='',$sizes=array(450,300),$timing=5000,$effects=array('run','fall'))
{
	$x=0;
	$display_item=array();
	$display_item['main']='';
	$display_item['thumb']='';
	$width=$sizes[0];
	$height=$sizes[1];
	foreach($items as $i)
	{
		$display_item['main'].='<div class="mm_slider_item';
		if($x==0)
		{
			$display_item['main'].=' mm_slider_enter_fade';
		}
		$display_item['main'].='"  id="mm_slider_item_main_'.$x.'_'.$id.'" style="width:'.$width.'px; height:'.$height.'px">'.$i.'</div>';
		$display_item['thumb'].='<div class="mm_slider_item"  id="mm_slider_item_thumb_'.$x.'_'.$id.'" onclick="mm_slider_'.$id.'.show('.$x.');"';
		if($x==0)
		{
			$display_item['thumb'].=' style="background-color:#000;"';
		}
		$display_item['thumb'].='>'.$i.'</div>';
		$x++;
	}
	$x--;
	$display=
	'
	<script type="text/javascript">
	var mm_slider_'.$id.'="";
	document.getElementsByTagName("body")[0].setAttribute("onload","mm_slider_'.$id.'=new sliderizer;mm_slider_'.$id.'.init('.$x.',\''.$id.'\','.$timing.',\''.$effects[0].'\',\''.$effects[1].'\')");
	</script>
	<div class="mm_slider_box" id="mm_slider_box_'.$id.'" style="width:'.($width+64).'px;">
		<div class="mm_slider_main" id="mm_slider_main_'.$id.'" style="width:'.($width+64).'px; height:'.$height.'px">
			<div class="mm_slider_main_prev" id="mm_slider_main_prev_'.$id.'" onclick="mm_slider_'.$id.'.prev()">
				<img src="media/img/precedant_32.png" />
			</div>
			<div class="mm_slider_main_view" id="mm_slider_main_view_'.$id.'">
			'.$display_item['main'].'
			</div>
			<div class="mm_slider_main_next" id="mm_slider_main_next_'.$id.'" onclick="mm_slider_'.$id.'.forward()">
				<img src="media/img/suivant_32.png" />
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="mm_slider_thumb" id="mm_slider_thumb_'.$id.'" style="">
			<div class="mm_slider_thumb_prev" id="mm_slider_thumb_prev_'.$id.'">
				<img src="media/img/precedant_32.png" />
			</div>
			<div class="mm_slider_thumb_view" id="mm_slider_thumb_view_'.$id.'">
			'.$display_item['thumb'].'
			</div>
			<div class="mm_slider_thumb_next" id="mm_slider_thumb_next_'.$id.'">
				<img src="media/img/suivant_32.png" />
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
	';
	
	return $display;
}

/*
USAGE :
*/
/*
echo
'<style type="text/css">'.file_get_contents('sliderizer.css').</style>
<script type="text/javascript">'.file_get_contents('sliderizer.js').</script>';
echo sliderizer(array(
'<h1>Here come the sliderizer...</h1><h2>A CSS3/JavaScript slider creator</h2>',
'<h1>With sliderizor you can </h1><p>slide any HTML elements</p><p>from <div style="background:red">div</div> to <input type="text" value="form inputs" /></p>',
'<h1>of course, images...</h1><img src="https://secure.gravatar.com/avatar/606d1f5b038e9ea60137c3a100f8331d?s=140&d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png" />',
'<h1>You can also</h1><h2>choose between numerous transition effects</h2><h2>for in and out separatly</h2>',
'<p>RUN : from side to side of the screen</p><p>FADE : play on opacity</p><p>SHRINK : shrink the content</p><p>EXPLODE : content get biiiiiiiiiig</p><p>FALL : HAAAAaaaaaaaaaaa---....</p>',
'<h1>Of course, if those</h1><p>dont suits you, you can style</p><p>declare new animation in a css file ^^</p>',
'<h1>MAKE IT SLIDE BABY !</h1>'
));
*/
?>
