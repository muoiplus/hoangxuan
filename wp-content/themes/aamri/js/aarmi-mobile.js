jQuery.noConflict();
var oldWidth = null;
var curWidth = jQuery(window).width();
jQuery(window).on('resize',function() {
     jQuery("#searchform-mobile").on('submit',function (e){
        var key = jQuery('#s2').val();
        if (key == '') {
            e.preventDefault();
        }

    });
        delay1(function(){
            var numberMember = jQuery('.list_ourmember li').length;
            var cutMember = Math.ceil(numberMember / 2);
            var windowWidth = jQuery(window).width();
            oldWidth = curWidth;
            curWidth = windowWidth;
            if(oldWidth > 768 && curWidth < 768) {
                 jQuery( ".news_listing .left_sibar .sidebar_block .widgettitle" ).next().hide();
            }
        if(windowWidth <= 768) {
			toggleMenu('.menu_icon #mobile_icon_menu','.mobile_menu');
			toggleMenu('.title_filters a','div.filters');
            jQuery('.mobile-menu > li.menu-item-has-children > a').attr('href', '#');
           
           if (!jQuery('.list_ourmember .gridmode li').parent().hasClass('left')) {
            jQuery('.list_ourmember .gridmode li').slice(0,cutMember).wrapAll('<div class="left"/>');
            jQuery('.list_ourmember .gridmode li').slice(cutMember).wrapAll('<div class="right"/>');
            };
          jQuery('.flexslider li img').each(function() {
            if (jQuery(this).parent().is('li')) {
                jQuery(this).wrap('<a>');
                };
             });
          var reCaptchaWidth = jQuery('#recaptcha_widget_div').width();
          var PercentZoom =  reCaptchaWidth/318;
          if (reCaptchaWidth < 318) {
            jQuery('#recaptcha_table').css({'transform': 'scale(' + PercentZoom + ')',
            '-ms-transform': 'scale(' + PercentZoom + ')','-webkit-transform': 'scale(' + PercentZoom + ')'
            /*,'zoom': PercentZoom,'-ms-zoom': PercentZoom,
                '-webkit-zoom': PercentZoom*/})
          }else {
            jQuery('#recaptcha_table').css({'transform': 'scale(1)','-webkit-transform': 'scale(1)','-ms-transform': 'scale(1)',/*'zoom': '1','-ms-zoom': '1',
                '-webkit-zoom': '1'*/})
          }
                //  var slideWidth = jQuery('.content_slider .slides').width();
                //  var slideHeight;
                // jQuery('.content_slider li img').each(function(){
                // var img = new Image();
                // img.src =  jQuery(this).attr("src");
                // var Imgheight = img.height;
                // var Imgwidth = img.width;
                // if (windowWidth > 480) {
                //     slideHeight = 367;
                // } else {
                //     slideHeight = 184;
                // };
                // var newWidth = Imgwidth * slideHeight / Imgheight;
                // //alert(Imgheight + '---' + Imgwidth + '---' + newWidth);
                
                //  if(slideWidth < newWidth){
                //         jQuery(this).css({"height":"100%", "width":"auto"});
                //     } 
                //     else {
                //         jQuery(this).css({"height":"auto", "width":"100%"});

                //     };

                //})
              
                var resizeTimer;
                    if (resizeTimer) clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function() {
                        if (jQuery('#cboxOverlay').is(':visible')) {
                            if(windowWidth <= 500) {
                                jQuery.colorbox.resize({
                                     width: '95%'
                                 }); 
                            }
                            else{
                                jQuery.colorbox.resize({
                                     width: '500px'
                                 });  
                            }
                        }
                    }, 150)
                        }
		else {
			jQuery( ".menu_icon #mobile_icon_menu" ).removeClass('active');
			jQuery('.mobile_menu').hide();
			jQuery('div.filters').show();
            jQuery('.sub_menu_mobile').hide();
           jQuery( ".news_listing .left_sibar .sidebar_block .widgettitle" ).next().show();
           jQuery( ".news_detail .left_sibar .sidebar_block").find('ul.menu').show();
             if (jQuery('.list_ourmember .gridmode li').parent().hasClass('left')) {
                jQuery('.list_ourmember .gridmode li').unwrap( "<div>");
          
                };
             jQuery('.content_slider li img').each(function(){
                 jQuery(this).css({"height":"auto", "width":"100%"});
             })
			}
		  
    },200)
});
jQuery(document).ready(function() {
    jQuery(window).trigger('resize');
    jQuery('.mobile-menu > li.menu-item-has-children > a').click(function(){
            var nextUl = jQuery(this).next('ul.sub-menu');
            if (nextUl.css('display')=='none') {
                jQuery('.mobile-menu .sub-menu').hide();
                jQuery('.mobile-menu > li.menu-item-has-children > a').removeClass('active');
                jQuery(this).addClass('active');
                nextUl.show();
            }
            else{
                jQuery(this).removeClass('active');
                nextUl.hide();
            }
        })
      jQuery( ".news_listing .left_sibar .sidebar_block .widgettitle" ).click(function() {
             var nextulArch = jQuery(this).next();
            if (jQuery(window).width() <= 768) {
                    if (nextulArch.css('display') == 'none') {
                        jQuery(this).addClass('active');
                        nextulArch.show();
                    }
                    else{
                        jQuery(this).removeClass('active');
                        nextulArch.hide();
                    }
            };
                   
        }); 
       jQuery( ".news_detail .title_mobile" ).click(function() {
             var nextUlMenu = jQuery(this).next().find('ul.menu');
            if (jQuery(window).width() <= 768) {
                    if (nextUlMenu.css('display') == 'none') {
                        jQuery(this).addClass('active');
                        nextUlMenu.show();
                    }
                    else{
                        jQuery(this).removeClass('active');
                        nextUlMenu.hide();
                    }
            };
                   
        }); 
});

var delay1 = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();
function toggleMenu(a,b){
		jQuery(a).toggle(
                function() {
                    jQuery(this).addClass('active');
                    jQuery(b).show();
                }, function() {
                    jQuery(this).removeClass('active');
                    jQuery(b).hide();
                }
            )
}