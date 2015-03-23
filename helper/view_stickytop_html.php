<?php 




function frontend_stickytop_html(){

	$output = '<div class="stickytop-wrapper" data-spy="affix" data-offset-top="200">
					<div class="stickytop-affix">
						<a id="stickytop-close" href="#" class="btn pull-right">X</a>
					
					<div class = "text-color">
						
						StickytopBar
					</div>
					</div>
			    </div>';
		return $output;
	}
?>