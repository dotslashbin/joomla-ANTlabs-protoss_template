/**
 * Author Dan Partac
 * Copyright (C) 2005 - 2012 Dan Partac. All rights reserved.
 * @license commercial
 */

(function($) {
 //smoothscroll to top button
 $(window).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 300) {
   $('.top-link').fadeIn(500);
  } else {
   $('.top-link').fadeOut(500);
  }
 });
  $(document).ready(function() {
   $('#gototop').live('click',function(event) { 
   event.preventDefault();
   var clicktarget =  $(this).attr('href');
   if ( $(clicktarget).length != 0) {
    $('html, body').stop().animate({scrollTop:  $(clicktarget).offset().top}, 500); 
   }
  }); 
 });

 // fixes
 $(document).ready(function() {  
 	if ($.browser.webkit) {
		$('#login-form .inputbox, #member-registration .inputbox').attr('size',34);
		$('#jform_contact_emailmsg').attr('size',30); $('#jform_contact_message').attr({rows:5, cols:28}).css('maxWidth',580);
	} else if ($.browser.opera) { 
		$('#login-form .inputbox, #member-registration .inputbox').attr('size',33); 
	} else if ($.browser.msie) { 
		$('#login-form .inputbox, #member-registration .inputbox').attr('size',41); 
		$('#jform_contact_emailmsg').attr('size',30); 
		$('#jform_contact_message').attr({rows:5, cols:35}).css({maxWidth:580, overflow: 'hidden'});
	} else { $('#jform_contact_emailmsg').attr('size',30); $('#jform_contact_message').attr({rows:5, cols:27}).css('maxWidth',580);} 
 });
})(jQuery);

(function($) {
 // add tiptip
 $(document).ready(function() {
  $('a').not('.menu a').each(function(){
   if ( $(this).attr("title") != null &&  $(this).attr("title") != "undefined" && $(this).attr("title").length != 0){
    $(this).tipTip();
   }
  });
 });
})(jQuery);

// overlay login, feedback and social
(function($) {
	$(document).ready(function() {
		if ($.browser.version >= 9.0) {
			$('#site-wrapper').after('<div id="div-overlay">&nbsp;</div>');
		} else {
			$('#site-wrapper').append('<div id="div-overlay">&nbsp;</div>');		
		}
		var feedbacktop = $('#feedback-wrapper').css('top');
		var logintop = $('#login-wrapper').css('top');
		var logind = $('#login-wrapper');
		var feedbackd = $('#feedback-wrapper');

		$('#openlogin').live('click',function(event) {
			event.preventDefault();
			$(this).toggleClass('active');
			$('#div-overlay').fadeToggle();
			var loginnow = $('#login-wrapper').css('top');
			if ($('form#login-form').is(':hidden') && $(this).hasClass('active') ) {
				logind.animate({ top: 20 },500);
			} else if ($('form#login-form').not(':hidden') && $(this).hasClass('active') ) {
				logind.animate({ top: 50 },500);
			} else if ( $(this).attr('class') == '' ) {
				logind.animate({ top: logintop },500);
			}
		});

		$('#openfeedback').live('click',function(event) {
			event.preventDefault();
			$(this).toggleClass('active');
			$('#div-overlay').fadeToggle();
			feedbackd.animate({	top: parseInt(feedbackd.css('top')) == 50 ? feedbacktop : 50 }, 500);
		});
		
		$('a.loginToggle').live( 'click', function(event) {
			event.preventDefault();
			logind.animate({ top: parseInt( logind.css('top')) ==  50 ? 20 : 50 },500);
		});

		$('.gallery-item a').live('click',function(event) {
			event.preventDefault();
			$('#gallery-page-modal').toggleClass('in');
			$('#div-overlay').fadeToggle();
		});

		$('#gallery-page-modal .close-gallery').live('click',function(event) {
			event.preventDefault();
			$('#gallery-page-modal').toggleClass('in');
			$('#div-overlay').fadeToggle();
		});
		
		$('#div-overlay').live('click', function(event) {
			event.preventDefault();
			$(this).fadeOut(); 
			$('#openlogin').removeClass('active').fadeIn();
			$('#openfeedback').removeClass('active').fadeIn();
			logind.animate({ top: logintop }, 500);
			feedbackd.animate({ top: feedbacktop }, 500);
			$('#gallery-page-modal').removeClass('in');
		});
	});
})(jQuery);


(function($){
 
	$(document).ready(function() {
		// toggle submenu
		$('ul.mini li li.parent').each( function() {
			if ( $(this).find('ul').length != 0 ) {
				$(this).append('<span class="icon-sort"> </span>');
			}
		});

		$('li.parent [class^="icon-sort"]').click(function() {
			if ( $(this).hasClass('icon-sort') ) {
				$(this).removeClass().addClass('icon-sort-down');
				$(this).parent('li.parent').siblings().find('[class^="icon-"]').removeClass().addClass('icon-sort');			
				$(this).parent('li.parent').siblings().find('ul').slideUp();
				$(this).parent('li.parent').find('ul:eq(0)').slideDown();
				
			} else {
				$(this).removeClass().addClass('icon-sort');			
				$(this).parent('li.parent').siblings().children('[class^="icon-"]').removeClass().addClass('icon-sort');			
				$(this).parent('li.parent').children('ul').slideUp();
				
				$(this).parent('li.parent').find('li.parent ul').slideUp(200);
				$(this).parent('li.parent').find('span').removeClass().addClass('icon-sort');				
			}
		});
		
		$('a.open-mini').bind('click',function(e) {
			e.preventDefault();
			$(this).toggleClass('active');
			$('.mainnav li.mini > ul.menu').slideToggle(400);
			$(this).parent('li.parent').find('li.parent ul').slideUp(200);
			$(this).parent('li.parent').find('span').removeClass().addClass('icon-sort');
		});		

		
		/* portfolio */
		$('#filter-tools button').on('click', function() {
			$(this).parent().siblings().find('.dropdown-menu').removeClass('open');
			$(this).parent().find('.dropdown-menu').toggleClass('open');
		});
		$(window).on('click', function() {
			$('#filter-tools .dropdown-menu').removeClass('open');
		});
		
		
		//mainnav menu
		$('.mainnav > ul.menu:not(".mini") li').mouseenter( function( e1 ) {
			var thisMenuItem = $(this);			
				clearTimeout(thisMenuItem.data('hoverTimer'));
				var timer = setTimeout( function( e1 ) {
			
				if ( $(thisMenuItem).closest('ul').hasClass('menu') && !$(thisMenuItem).hasClass('open-root') ) {
					$(thisMenuItem).addClass('open-root');
					$(thisMenuItem).siblings().removeClass('open-root');
				}
				
				if ( !$(thisMenuItem).children('ul.nav-child').hasClass('open') ) { 
					$(thisMenuItem).children('ul.nav-child').addClass('open').css({left: 0});			
					
					$(thisMenuItem).siblings().children('ul.nav-child').removeClass('open').stop().delay(100).animate({left: '-999em'}, 0);

				}
				
			}, 100 );
			thisMenuItem.data('hoverTimer', timer);
		});

		$('.mainnav > ul.menu:not(".mini") li').mouseleave( function( e2 ) {
			var thisMenuItem = $(this);
			clearTimeout(thisMenuItem.data('hoverTimer'));
			var timer = setTimeout( function( e2 ) {
				if ( $(thisMenuItem).closest('ul').hasClass('menu') &&  $(thisMenuItem).hasClass('open-root') ) {
					$(thisMenuItem).removeClass('open-root');									
				}
				if ( $(thisMenuItem).children('ul.nav-child').hasClass('open') ) { 
					$(thisMenuItem).children('ul.nav-child').removeClass('open').stop().delay(100).animate({left: '-999em'}, 0);
				}
			}, 500 );
			thisMenuItem.data('hoverTimer', timer);
		});

		//nav menu
		$('ul.nav:not(".menu") li').mouseenter( function( e3 ) {
			var thisMenuItem = $(this);			
				clearTimeout(thisMenuItem.data('hoverTimer'));
				var timer = setTimeout( function( e3 ) {
				
				if ( !$(thisMenuItem).children('ul').hasClass('open') ) { 
					if ( $(thisMenuItem).parent().hasClass('nav') ){
						$(thisMenuItem).children('ul').addClass('open').css({right: 0});
					} else {
						$(thisMenuItem).children('ul').addClass('open').css({right: 121});
					}
					if ( $(thisMenuItem).parent().hasClass('nav') ){
						$(thisMenuItem).siblings().children('ul').removeClass('open').stop().delay(100).animate({right: '-999em'}, 0);
					} else {
						$(thisMenuItem).siblings().children('ul').removeClass('open').stop().delay(100).animate({right: 140}, 0);
					}					
				}
				
			}, 100 );
			thisMenuItem.data('hoverTimer', timer);
		});

		$('ul.nav:not(".menu") li').mouseleave( function( e4 ) {
			var thisMenuItem = $(this);
			clearTimeout(thisMenuItem.data('hoverTimer'));
			var timer = setTimeout( function( e4 ) {
				if ( $(thisMenuItem).children('ul').hasClass('open') ) { 
					if ( $(thisMenuItem).parent().hasClass('nav') ){
						$(thisMenuItem).children('ul').removeClass('open').stop().delay(100).animate({right: '-999em'}, 0); 
					} else {
						$(thisMenuItem).children('ul').removeClass('open').stop().delay(100).animate({right: 150}, 0); 
					}	
				
				}
			}, 500 );
			thisMenuItem.data('hoverTimer', timer);
		});	
		
		// auto height carousel .parents('.carousel') by Dan Partac
		$('#site-wrapper .carousel').on('slide', function(ee) {
			function resizeCarousel() {
				var next_h =  $(ee.relatedTarget).parents('.carousel-inner').height();
				$(ee.relatedTarget).parents('.carousel').stop().animate({ height: next_h }, 300);
				$(ee.relatedTarget).parents('.modal').stop().animate({ marginTop: -parseInt(next_h/2) }, 300);
			}
			setTimeout( function(ee) {
				resizeCarousel();
			}, 650 );
		});
		$(window).on('resize', function() {
			setTimeout( function() {
				if ( $(window).width > 0 || $(window).width != 0 ) { $('#site-wrapper .carousel').height('auto'); }
			}, 150 );
		});
		
		//init carousel
		$('.carousel').each( function() {
			$.noConflict();
			var thisCarousel = $(this);
			if ( $(thisCarousel).attr('data-interval') != null && $.isNumeric($(thisCarousel).attr('data-interval')) && $(thisCarousel).attr('data-interval') != '0' )
			$(thisCarousel).carousel({ interval: $(thisCarousel).attr('data-interval') });
		});	
		
		// auto height tabs .parents('.tab-content') by Dan Partac
		$(window).on('load', function() {
			$('.nav-tabs li > a[data-toggle="tab"]:first').trigger('click');	
		});
		$('.nav-tabs li > a[data-toggle="tab"]').on('click', function(e) {
			var target = $(this);
		
			function resizeTabs(e) {
				var ti = $(target).attr('href').replace('#','');
				var th =  $('[id="'+ti+'"]').height();
				$(target).parents('.tabbable, .tab_wrap, .bs-docs-example, div').find('.tab-content').stop().animate({height: th}, 500);	
			}
	
			setTimeout( function(e) {
				resizeTabs();
			}, 550 );
		});	
		$(window).on('resize', function(et) {
			$('.tabbable, .tab_wrap, .bs-docs-example, div').find('.tab-content').css({height: 'auto'});
		});


		
		// init slider adjustments
		$('.vmiddle').each(function() {
			$(this).adjustMiddleSequence({
				sliderMargin: '0'
			});	
		});
		
		$(window).on('resize',function(){
			setTimeout( function(e) {
				$('.vmiddle').each(function() {
					$(this).adjustMiddleSequence({
						sliderMargin: '0'
					});	
				});	
			}, 550 );
		});	
		
	});
})(jQuery);


(function($) {
 // split module title and append a module description
 $(document).ready(function() {
  $('div.moduletable h3').each(function() {
   var parts = $(this).text().split('|', 2);
   $(this).text(parts[0]);
   if (parts.length == 2) {
    $(this).after('<span class="mod-desc">' + parts[1] + '</span>');
   }  
  });
 });
})(jQuery);

(function($) {
 // menu
 $(document).ready(function() {
	$('.mainnav ul.menu:first-child > li:first').addClass('home');
	$('ul.menu > li:first-child, ul.nav-tabs > li:first-child, .accordion > div:first-child').addClass('first');
	$('ul.menu > li:last-child, ul.nav-tabs > li:last-child, .accordion > div:last-child').addClass('last');

 });
 // moodules
 $(document).ready(function() {
	$('#ct-wrapper .modulebox:last-child').addClass('last');
	$('#top-wrapper .modulebox:last-child').addClass('last');
	$('#bottom-wrapper .modulebox:last-child').addClass('last');
 });
})(jQuery);

// fix Mootools conflict with Bootstrap carousel
if (typeof jQuery != 'undefined' && typeof MooTools != 'undefined' ) {
    Element.implement({
        slide: function(how, mode){
            return this;
        }
    });
}

// TipTip 
(function($){$.fn.tipTip=function(options){var defaults={activation:"hover",keepAlive:false,maxWidth:"200px",edgeOffset:3,defaultPosition:"bottom",delay:400,fadeIn:200,fadeOut:200,attribute:"title",content:false,enter:function(){},exit:function(){}};var opts=$.extend(defaults,options);if($("#tiptip_holder").length<=0){var tiptip_holder=$('<div id="tiptip_holder" style="max-width:'+opts.maxWidth+';"></div>');var tiptip_content=$('<div id="tiptip_content"></div>');var tiptip_arrow=$('<div id="tiptip_arrow"></div>');$("body").append(tiptip_holder.html(tiptip_content).prepend(tiptip_arrow.html('<div id="tiptip_arrow_inner"></div>')))}else{var tiptip_holder=$("#tiptip_holder");var tiptip_content=$("#tiptip_content");var tiptip_arrow=$("#tiptip_arrow")}return this.each(function(){var org_elem=$(this);if(opts.content){var org_title=opts.content}else{var org_title=org_elem.attr(opts.attribute)}if(org_title!=""){if(!opts.content){org_elem.removeAttr(opts.attribute)}var timeout=false;if(opts.activation=="hover"){org_elem.hover(function(){active_tiptip()},function(){if(!opts.keepAlive){deactive_tiptip()}});if(opts.keepAlive){tiptip_holder.hover(function(){},function(){deactive_tiptip()})}}else if(opts.activation=="focus"){org_elem.focus(function(){active_tiptip()}).blur(function(){deactive_tiptip()})}else if(opts.activation=="click"){org_elem.click(function(){active_tiptip();return false}).hover(function(){},function(){if(!opts.keepAlive){deactive_tiptip()}});if(opts.keepAlive){tiptip_holder.hover(function(){},function(){deactive_tiptip()})}}function active_tiptip(){opts.enter.call(this);tiptip_content.html(org_title);tiptip_holder.hide().removeAttr("class").css("margin","0");tiptip_arrow.removeAttr("style");var top=parseInt(org_elem.offset()['top']);var left=parseInt(org_elem.offset()['left']);var org_width=parseInt(org_elem.outerWidth());var org_height=parseInt(org_elem.outerHeight());var tip_w=tiptip_holder.outerWidth();var tip_h=tiptip_holder.outerHeight();var w_compare=Math.round((org_width-tip_w)/2);var h_compare=Math.round((org_height-tip_h)/2);var marg_left=Math.round(left+w_compare);var marg_top=Math.round(top+org_height+opts.edgeOffset);var t_class="";var arrow_top="";var arrow_left=Math.round(tip_w-12)/2;if(opts.defaultPosition=="bottom"){t_class="_bottom"}else if(opts.defaultPosition=="top"){t_class="_top"}else if(opts.defaultPosition=="left"){t_class="_left"}else if(opts.defaultPosition=="right"){t_class="_right"}var right_compare=(w_compare+left)<parseInt($(window).scrollLeft());var left_compare=(tip_w+left)>parseInt($(window).width());if((right_compare&&w_compare<0)||(t_class=="_right"&&!left_compare)||(t_class=="_left"&&left<(tip_w+opts.edgeOffset+5))){t_class="_right";arrow_top=Math.round(tip_h-13)/2;arrow_left=-12;marg_left=Math.round(left+org_width+opts.edgeOffset);marg_top=Math.round(top+h_compare)}else if((left_compare&&w_compare<0)||(t_class=="_left"&&!right_compare)){t_class="_left";arrow_top=Math.round(tip_h-13)/2;arrow_left=Math.round(tip_w);marg_left=Math.round(left-(tip_w+opts.edgeOffset+5));marg_top=Math.round(top+h_compare)}var top_compare=(top+org_height+opts.edgeOffset+tip_h+8)>parseInt($(window).height()+$(window).scrollTop());var bottom_compare=((top+org_height)-(opts.edgeOffset+tip_h+8))<0;if(top_compare||(t_class=="_bottom"&&top_compare)||(t_class=="_top"&&!bottom_compare)){if(t_class=="_top"||t_class=="_bottom"){t_class="_top"}else{t_class=t_class+"_top"}arrow_top=tip_h;marg_top=Math.round(top-(tip_h+5+opts.edgeOffset))}else if(bottom_compare|(t_class=="_top"&&bottom_compare)||(t_class=="_bottom"&&!top_compare)){if(t_class=="_top"||t_class=="_bottom"){t_class="_bottom"}else{t_class=t_class+"_bottom"}arrow_top=-12;marg_top=Math.round(top+org_height+opts.edgeOffset)}if(t_class=="_right_top"||t_class=="_left_top"){marg_top=marg_top+5}else if(t_class=="_right_bottom"||t_class=="_left_bottom"){marg_top=marg_top-5}if(t_class=="_left_top"||t_class=="_left_bottom"){marg_left=marg_left+5}tiptip_arrow.css({"margin-left":arrow_left+"px","margin-top":arrow_top+"px"});tiptip_holder.css({"margin-left":marg_left+"px","margin-top":marg_top+"px"}).attr("class","tip"+t_class);if(timeout){clearTimeout(timeout)}timeout=setTimeout(function(){tiptip_holder.stop(true,true).fadeIn(opts.fadeIn)},opts.delay)}function deactive_tiptip(){opts.exit.call(this);if(timeout){clearTimeout(timeout)}tiptip_holder.fadeOut(opts.fadeOut)}}})}})(jQuery);