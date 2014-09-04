// JavaScript Document
jQuery.noConflict();
jQuery(document).ready(function(e) {

 jQuery('.content_contact .right_sidebar .wpcf7-form-control.wpcf7-select').change(function(){
        if(jQuery(this).val()!=''){
            jQuery('.selectboxit-text').css({
                "font-weight": "normal",
                "color": "#000"
            });
        }else{
            jQuery('.selectboxit-text').css({
                "font-weight": "bold",
                "color": "#777"
            });
        }
    })
    jQuery("#searchform").on('submit',function (e){
        var key = jQuery('#s').val();
        if (key == '') {
            e.preventDefault();
        }
    });
    jQuery("#searchform_results").on('submit',function (e){
        var key = jQuery('#s1').val();
        if (key == '') {
            e.preventDefault();
        }
    });

    var currentUrl = document.URL;
    if(currentUrl.indexOf('category')!=-1 && currentUrl.indexOf('our-members')!=-1){
        jQuery("#searchfilter").on('submit',function (e){
            var cat = jQuery('#ofmem_categories').val();
            var state = jQuery('#ofstates').val();
            if (cat == '0' && state == '0') {
                e.preventDefault();
            }
        });
    }

  	 jQuery('input.input_text').keypress(function(){
  		jQuery(this).css('border-color','#cc1f2d');
  	});
  	jQuery('input.input_text').blur(function(){
  		jQuery(this).css({"border-color":"#cdd0d2"});
  	}); 
  	jQuery('input.wpcf7-text ').keypress(function(){
  		jQuery(this).css('border-color','#cc1f2d');
  	});
  	jQuery('input.wpcf7-text ').blur(function(){
  		jQuery(this).css({"border-color":"#cdd0d2"});
  	});
    jQuery('.wpcf7-form input#recaptcha_response_field').attr('placeholder','Type two words here');
    jQuery('.wpcf7-form input#recaptcha_response_field ').keypress(function(){
        jQuery(this).css('border-color','#cc1f2d');
    });
    jQuery('.wpcf7-form input#recaptcha_response_field').blur(function(){
        jQuery(this).css({"border-color":"#cdd0d2"});
    });

hiConfig = {
        sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)
        interval: 10, // number = milliseconds for onMouseOver polling interval
        timeout: 10, // number = milliseconds delay before onMouseOut
        over: function() {
            jQuery(this).children('ul.sub-menu').slideDown('fast');
        }, // function = onMouseOver callback (REQUIRED)
        out: function() { jQuery(this).children('ul.sub-menu').slideUp('fast');  } // function = onMouseOut callback (REQUIRED)
    }
    jQuery(".main_menu .main-menu li").hoverIntent(hiConfig);

	jQuery( ".main_menu li ul.sub-menu li" ).each(function() {
        if(jQuery(this).hasClass('current-post-ancestor')){
			jQuery(this).parents('li.menu-item-has-children').addClass('current-menu-parent');
			return false;
			};
    });
jQuery('.left_sibar .sidebar_block ul.menu li').each(function(){
  if (jQuery(this).hasClass('menu-item-has-children')) {
    jQuery(this).children('a').after('<span class="symbol"></span>');
    jQuery(this).children('span.symbol').click(function(event) {
     var nextUlStd =  jQuery(this).next('ul');
     if (!nextUlStd.is(':visible')) {
      jQuery(this).addClass('active');
      jQuery(this).parent('li').addClass('expand');
      nextUlStd.slideDown();
     }
     else {
      jQuery(this).removeClass('active');
      jQuery(this).parent('li').removeClass('expand');
      nextUlStd.slideUp()
     }
    });
    if (jQuery(this).children('ul.sub-menu').is(':visible')) {
      jQuery(this).children('span.symbol').addClass('active');
    }
      else{
        jQuery(this).children('span.symbol').removeClass('active');
      }
  };
})

	jQuery(".inline_lightbox").colorbox({inline:true, width:"95%", maxWidth:"500px"});
	

//	 jQuery('#gridview').click(function(e) {
//        sessionStorage.setItem("modeview","gridmode");
//		jQuery('.mode_view a').removeAttr('class');
//		jQuery(this).addClass('active');
//         jQuery('.list_ourmember ul').removeAttr('class');
//		jQuery('.list_ourmember ul').addClass('gridmode');
//		})
//	jQuery('#listview').click(function(e) {
//        sessionStorage.setItem("modeview","listmode");
//		jQuery('.mode_view a').removeAttr('class');
//		jQuery(this).addClass('active');
//         jQuery('.list_ourmember ul').removeAttr('class');
//		jQuery('.list_ourmember ul').addClass('listmode');
//
//		})
//
//	 if(sessionStorage.getItem("modeview")!=null){
//            jQuery('#modeview').attr('class', '').addClass( sessionStorage.getItem("modeview"));
//            if(sessionStorage.getItem("modeview")=='gridmode'){
//                jQuery('.mode_view a#gridview').addClass('active');
//                jQuery('.mode_view a#listview').removeClass('active');
//            }else if(sessionStorage.getItem("modeview")=='listmode'){
//                jQuery('.mode_view a#listview').addClass('active');
//                jQuery('.mode_view a#gridview').removeClass('active');
//            }
//        }
	jQuery("select").selectBoxIt({ autoWidth: false, copyClasses: "container" });

	jQuery('.left_sibar li a').each(function() {
        if(window.location.href == jQuery(this).attr('href')){
			jQuery(this).parent().addClass('active');
			}
    });
   if (jQuery('.content_article .attachments > a').length > 1) {
    jQuery('.content_article .attachments > a').css({
        float: 'left',
        width: '50%'
    });
   };
   

    
    jQuery(window).trigger('resize');
});
	
// function resizeText(multiplier) {
//     if (document.body.style.fontSize == "") {
//         document.body.style.fontSize = "1.0em";
//     }
//     document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
// 	jQuery("p").css("line-height","normal");
// }

var min=10;
var max=35;
function increaseFontSize() {
  var contentA = jQuery('.content_article');
  var p = jQuery('.content_article').find('p');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 15;
      }
      if(s!=max) {
         s += 1;
      }
      p[i].style.fontSize = s+"px";
      p[i].style.lineHeight = "normal";
      contentA.css({'font-size':s,'line-height':'normal'})
   }
}
function decreaseFontSize() {
    var contentA = jQuery('.content_article');
     var p = jQuery('.content_article').find('p');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 15;
      }
      if(s!=min) {
         s -= 1;
      }
      p[i].style.fontSize = s+"px";
      p[i].style.lineHeight = "normal";
      contentA.css({'font-size':s,'line-height':'normal'})
   }   
}

jQuery(window).on('resize',function() {
    
    wdWidth = jQuery(window).width();
    var Xb =  (wdWidth - 997)/2;
    var pbx = Xb+'px 39px';
    if (Xb > 0) { 
        jQuery('#header').css('background-position', pbx);
    }
    else {
        jQuery('#header').css('background-position', 'left 39px');
    }    
  if (wdWidth <= 768) {
    if (!jQuery('.content_slider.mobile .metaslider ').is(':visible')) {
        jQuery('.news_detail .metaslider').appendTo('.content_slider.mobile');
    }
  }
  else {
    if (!jQuery('.content_slider.desktop .metaslider ').is(':visible')) {
      jQuery('.news_detail .metaslider').appendTo('.content_slider.desktop');
    }
  }
   jQuery('.news_listing .list_article > ul > li').each(function() {
        if (jQuery(window).width() >768) { 
        var heightLI = jQuery(this).height();
          if (heightLI > 177) {
            jQuery(this).find('a > img').height(heightLI);
          }else {jQuery(this).find('a > img').height('177px');}
        }
        else {
           jQuery('.news_listing .list_article > ul > li a > img').height('auto');
        } 
      });
});

var delay1 = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();

