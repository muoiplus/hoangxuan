<div class="home_slider">
	<div class="left">
        <?php echo do_shortcode("[metaslider id=113]"); ?></div>
</div>
<script type="text/javascript">
		jQuery(window).on('resize',function() {
			var windowWidth = jQuery(window).width();
		    	 var slideWidth = jQuery('.home_slider .slides').width();
		    	 var slideHeight;
		    	jQuery('.home_slider li img').each(function(){
		        var img = new Image();
		        img.src =  jQuery(this).attr("src");
		        var Imgheight = img.height;
		        var Imgwidth = img.width;
		        if (windowWidth > 768) {
		        	slideHeight = 428;
		        } else {
		        	slideHeight = 275;
		        };
		        var newWidth = Imgwidth * slideHeight / Imgheight;
		        //alert(Imgheight + '---' + Imgwidth + '---' + newWidth);
		        
				 if(slideWidth < newWidth){
				        jQuery(this).css({"height":"100%", "width":"auto"});
				    } 
				    else {
				        jQuery(this).css({"height":"auto", "width":"100%"});

				    }

		    	})
				})
</script>