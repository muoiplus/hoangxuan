<div id="footer">
  <div class="inner">
    <div class="top">
      <div class="logo"> <a href="<?php bloginfo('home') ?>"><img src="<?php bloginfo('template_url')?>/images/footer_logo.png" alt="logo" title="Aamri"/></a></div>
      <div class="logo_m"> <a href="<?php bloginfo('home') ?>"><img src="<?php bloginfo('template_url')?>/images/footer_logo_m.png" alt="logo" title="Aamri"/></a></div>
      <div class="footer_menu">
        <?php wp_nav_menu(array(
    		'theme_location' => 'footer',
    		'container' => '',
    		'menu_id' => '',
    		'menu_class' => 'footer-menu'
    	)); ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="bottom">
    <div class="left">
    <ul><li> <h3>Contact Us</h3></li>
    <li><p>AAMRI</p>
<p>PO Box 2097</p>
<p>Royal Melbourne Hospital VIC 3050</p></li>
    <li><p class="email">E: <a href="mailto:enquiries@aamri.org.au">enquiries@aamri.org.au</a></p>
<p>P: 03 9345 2500</p>
<p class="facebook"> <a href="http://twitter.com/AAMRI_Aus" target="_blank" class="fb_mobile_mn"><img src="<?php bloginfo('template_url')?>/images/tw.png" width="31"/></a> </p>
</li>
    <li class="twiter"><a href="http://twitter.com/AAMRI_Aus" class="external" target="_blank">twitter</a></li>
    
    </ul>
     </div>
     <div class="right"><h3>Stay Up To Date</h3>
	<p>Receive AAMRI eNews</p>
	<a href="#subscribe_form" class="inline_lightbox button">Sign Up Now</a>
</div>
<div class="clear"></div>
    </div>
  </div>
  <div class="black_footer">
  <div class="inner">
  	<div class="left">
  <span>&copy;AAMRI <?php echo date('Y'); ?></span>
  	<?php wp_nav_menu(array(
    		'theme_location' => 'black_footer',
    		'container' => '',
    		'menu_id' => '',
    		'menu_class' => 'black-menu'
    	)); ?>
       </div>
       <div class="right"><span>Website design by <a href="http://www.monkii.com.au/">Monkii</a></span></div>
         <div class="clear"></div>
  </div>
  </div>
</div>
<div class="subscribe_form_wrapper" style="display:none"><div id="subscribe_form"><?php echo do_shortcode("[mc4wp_form]"); ?></div></div>
<?php wp_footer()?>
<?php //if(isset($_POST['mc4_submit']) && $_POST['mc4_submit'] == 'Sign up'): ?>
    <script type="text/javascript">
        // jQuery(document).ready(function(e) {
        //     jQuery(".inline_lightbox").click();
        //     jQuery("#cboxLoadingGraphic").remove();
        //     jQuery("#cboxLoadingOverlay").remove();
        // });
    </script>
<?php //endif;?>

</body></html>