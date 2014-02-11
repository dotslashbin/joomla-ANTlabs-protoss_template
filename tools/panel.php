<?php defined('_JEXEC') or die;

$stylepath = $this->baseurl .'/templates/'. $this->template .'/themes/';
$font = $this->params->get('font_selection');

$csspath = $this->baseurl .'/templates/'. $this->template .'/css/';
$templatewidth	= $this->params->get('template_width', 'full-width');

$doc = JFactory::getDocument();

$fontlist =	'
	<li><a data-font="Abel" href="#">Abel</a></li>
	<li><a data-font="Amarante" href="#">Amarante</a></li>
	<li><a data-font="Amaranth" href="#">Amaranth</a></li>
	<li><a data-font="Almendra" href="#">Almendra</a></li>
	<li><a data-font="Anton" href="#">Anton</a></li>
	<li><a data-font="Arimo" href="#">Arimo Regular</a></li>
	<li><a data-font="Arimo:400italic" href="#">Arimo Italic</a></li>
	<li><a data-font="Architects+Daughter" href="#">Architects Daughter</a></li>
	<li><a data-font="Archivo+Narrow" href="#">Archivo Narrow</a></li>
	<li><a data-font="Archivo+Narrow:400italic" href="#">Archivo Narrow Italic</a></li>
	<li><a data-font="Asap:400" href="#">Asap Regular</a></li>
	<li><a data-font="Asap:400italic" href="#">Asap Italic</a></li>
	<li><a data-font="BenchNine" href="#">Bench Nine</a></li>
	<li><a data-font="Bigelow+Rules" href="#">Bigelow Rules</a></li>
	<li><a data-font="Bubblegum+Sans" href="#">Bubblegum Sans</a></li>
	<li><a data-font="Cabin" href="#">Cabin Regular</a></li>
	<li><a data-font="Cabin:400italic" href="#">Cabin Italic</a></li>
	<li><a data-font="Cabin+Condensed:400" href="#">Cabin Condensed Regular</a></li>
	<li><a data-font="Cabin+Condensed:400italic" href="#">Cabin Condensed Italic</a></li>
	<li><a data-font="Cantarell:400" href="#">Cantarell Regular</a></li>
	<li><a data-font="Cantarell:400italic" href="#">Cantarell Italic</a></li>
	<li><a data-font="Comfortaa:300" href="#">Comfortaa Light</a></li>
	<li><a data-font="Comfortaa:400" href="#">Comfortaa Regular</a></li>
	<li><a data-font="Coming+Soon" href="#">Coming Soon</a></li>
	<li><a data-font="Condiment" href="#">Condiment</a></li>
	<li><a data-font="Covered+By+Your+Grace" href="#">Covered By Your Grace</a></li>
	<li><a data-font="Crimson+Text:400" href="#">Crimson Text Regular</a></li>
	<li><a data-font="Crimson+Text:400italic" href="#">Crimson Text Italic</a></li>
	<li><a data-font="Cinzel" href="#">Cinzel</a></li>
	<li><a data-font="Cinzel+Decorative" href="#">Cinzel Decorative</a></li>
	<li><a data-font="Cuprum" href="#">Cuprum Regular</a></li>
	<li><a data-font="Cuprum:400italic" href="#">Cuprum Italic</a></li>
	<li><a data-font="Dosis:300" href="#">Dosis Light</a></li>
	<li><a data-font="Dosis:400" href="#">Dosis Regular</a></li>
	<li><a data-font="Droid+Sans" href="#">Droid Sans</a></li>
	<li><a data-font="Droid+Serif" href="#">Droid Serif Regular</a></li>
	<li><a data-font="Droid+Serif:400italic" href="#">Droid Serif Italic</a></li>
	<li><a data-font="Economica" href="#">Economica Regular</a></li>
	<li><a data-font="Economica:400italic" href="#">Economica Italic</a></li>
	<li><a data-font="Emilys+Candy" href="#">Emilys Candy</a></li>
	<li><a data-font="Englebert" href="#">Englebert</a></li>
	<li><a data-font="Electrolize" href="#">Electrolize</a></li>
	<li><a data-font="EB+Garamond" href="#">EB Garamond</a></li>
	<li><a data-font="Exo:400" href="#">Exo</a></li>
	<li><a data-font="Exo:400italic" href="#">Exo Italic</a></li>
	<li><a data-font="Exo:300italic" href="#">Exo Light Italic</a></li>
	<li><a data-font="Felipa" href="#">Felipa</a></li>
	<li><a data-font="Fenix" href="#">Fenix</a></li>
	<li><a data-font="Finger+Paint" href="#">Finger Paint</a></li>
	<li><a data-font="Francois+One" href="#">Francois One</a></li>
	<li><a data-font="Forum" href="#">Forum</a></li>
	<li><a data-font="Gentium+Basic" href="#">Gentium Basic</a></li>
	<li><a data-font="Gentium+Book+Basic" href="#">Gentium Book Basic</a></li>
	<li><a data-font="Gentium+Book+Basic:400italic" href="#">Gentium Book Basic Italic</a></li>
	<li><a data-font="Gochi+Hand" href="#">Gochi Hand</a></li>
	<li><a data-font="Glegoo" href="#">Glegoo</a></li>
	<li><a data-font="Happy+Monkey" href="#">Happy Monkey</a></li>
	<li><a data-font="Headland+One" href="#">Headland One</a></li>
	<li><a data-font="Iceberg" href="#">Iceberg</a></li>
	<li><a data-font="Inder" href="#">Inder</a></li>
	<li><a data-font="Istok+Web" href="#">Istok Web Regular</a></li>
	<li><a data-font="Istok+Web:400italic" href="#">Istok Web Italic</a></li>
	<li><a data-font="Judson" href="#">Judson Regular</a></li>
	<li><a data-font="Judson:400italic" href="#">Judson Italic</a></li>
	<li><a data-font="Julius+Sans+One" href="#">Julius Sans One</a></li>
	<li><a data-font="Kristi" href="#">Kristi</a></li>
	<li><a data-font="Lato:300" href="#">Lato Light</a></li>
	<li><a data-font="Lato:300italic" href="#">Lato Light Italic</a></li>
	<li><a data-font="Lato:400" href="#">Lato Regular</a></li>
	<li><a data-font="Lato:400italic" href="#">Lato Regular Italic</a></li>
	<li><a data-font="Life+Savers" href="#">Life Savers</a></li>
	<li><a data-font="Lobster" href="#">Lobster</a></li>
	<li><a data-font="Lobster+Two" href="#">Lobster Two</a></li>
	<li><a data-font="Lusitana" href="#">Lusitana</a></li>
	<li><a data-font="Marcellus+SC" href="#">Marcellus SC</a></li>
	<li><a data-font="Marvel" href="#">Marvel Regular</a></li>
	<li><a data-font="Marvel:400italic" href="#">Marvel Italic</a></li>
	<li><a data-font="Merriweather:300" href="#">Merriweather Light</a></li>
	<li><a data-font="Merriweather:300italic" href="#">Merriweather Light Italic</a></li>
	<li><a data-font="Merriweather:400" href="#">Merriweather Regular</a></li>
	<li><a data-font="Merriweather:400italic" href="#">Merriweather Regular Italic</a></li>
	<li><a data-font="Metamorphous" href="#">Metamorphous</a></li>
	<li><a data-font="Mouse+Memoirs" href="#">Mouse Memoirs</a></li>
	<li><a data-font="Montserrat" href="#">Montserrat</a></li>
	<li><a data-font="Muli:400" href="#">Muli</a></li>
	<li><a data-font="News+Cycle" href="#">News Cycle</a></li>
	<li><a data-font="Nobile" href="#">Nobile Regular</a></li>
	<li><a data-font="Nobile:400italic" href="#">Nobile Italic</a></li>
	<li><a data-font="Noto+Sans:400" href="#">Noto Sans Regular</a></li>
	<li><a data-font="Noto+Sans:700" href="#">Noto Sans Bold</a></li>
	<li><a data-font="Old+Standard+TT" href="#">Old Standard TT Regular</a></li>
	<li><a data-font="Old+Standard+TT:400italic" href="#">Old Standard TT Italic</a></li>
	<li><a data-font="Open+Sans+Condensed:300" href="#">Open Sans Condensed Light</a></li>
	<li><a data-font="Open+Sans+Condensed:300italic" href="#">Open Sans Condensed Light Italic</a></li>
	<li><a data-font="Open+Sans:300" href="#">Open Sans Light</a></li>
	<li><a data-font="Open+Sans:300italic" href="#">Open Sans Light Italic</a></li>
	<li><a data-font="Open+Sans" href="#">Open Sans</a></li>
	<li><a data-font="Open+Sans:400italic" href="#">Open Sans Italic</a></li>
	<li><a data-font="Oleo+Script" href="#">Oleo Script</a></li>
	<li><a data-font="Oleo+Script+Swash+Caps" href="#">Oleo Script Swash Caps</a></li>
	<li><a data-font="Orbitron" href="#">Orbitron</a></li>
	<li><a data-font="Original+Surfer" href="#">Original Surfer</a></li>
	<li><a data-font="Oswald:300" href="#">Oswald Light</a></li>
	<li><a data-font="Oswald" href="#">Oswald Regular</a></li>
	<li><a data-font="Overlock" href="#">Overlock Regular</a></li>
	<li><a data-font="Overlock:400italic" href="#">Overlock Italic</a></li>
	<li><a data-font="Oxygen" href="#">Oxygen</a></li>
	<li><a data-font="Philosopher:400" href="#">Philosopher Regular</a></li>
	<li><a data-font="Philosopher:400italic" href="#">Philosopher Italic</a></li>
	<li><a data-font="Pirata+One" href="#">Pirata One</a></li>
	<li><a data-font="Play" href="#">Play</a></li>
	<li><a data-font="Playball" href="#">Playball</a></li>
	<li><a data-font="Playfair+Display" href="#">Playfair Display</a></li>
	<li><a data-font="Playfair+Display+SC" href="#">Playfair Display DC</a></li>
	<li><a data-font="Playfair+Display+SC:400italic" href="#">Playfair Display DC Italic</a></li>
	<li><a data-font="Pontano+Sans" href="#">Pontano Sans</a></li>
	<li><a data-font="Poiret+One" href="#">Poiret One</a></li>
	<li><a data-font="PT+Sans" href="#">PT Sans Regular</a></li>
	<li><a data-font="PT+Sans:400italic" href="#">PT Sans Italic</a></li>
	<li><a data-font="PT+Sans+Narrow" href="#">PT Sans Narrow</a></li>
	<li><a data-font="PT+Serif" href="#">PT Serif Regular</a></li>
	<li><a data-font="PT+Serif:400italic" href="#">PT Serif Italic</a></li>
	<li><a data-font="Puritan" href="#">Puritan Regular</a></li>
	<li><a data-font="Puritan:400italic" href="#">Puritan Italic</a></li>
	<li><a data-font="Rum+Raisin" href="#">Rum Raisin</a></li>
	<li><a data-font="Roboto+Condensed:300" href="#">Roboto Condensed Light</a></li>
	<li><a data-font="Roboto+Condensed:400" href="#">Roboto Condensed Regular</a></li>
	<li><a data-font="Roboto+Condensed:700" href="#">Roboto Condensed Bold</a></li>
	<li><a data-font="Quattrocento+Sans" href="#">Quattrocento Sans Regular</a></li>
	<li><a data-font="Quattrocento+Sans:400italic" href="#">Quattrocento Sans Italic</a></li>
	<li><a data-font="Quintessential" href="#">Quintessential</a></li>
	<li><a data-font="Questrial" href="#">Questrial</a></li>
	<li><a data-font="Raleway:300" href="#">Raleway Light</a></li>
	<li><a data-font="Raleway:400" href="#">Raleway Regular</a></li>
	<li><a data-font="Racing+Sans+One" href="#">Racing Sans One</a></li>
	<li><a data-font="Revalia" href="#">Revalia</a></li>
	<li><a data-font="Rochester" href="#">Rochester</a></li>
	<li><a data-font="Ropa Sans" href="#">Ropa Sans Regular</a></li>
	<li><a data-font="Ropa Sans:400italic" href="#">Ropa Sans Italic</a></li>
	<li><a data-font="Rokkitt" href="#">Rokkitt</a></li>
	<li><a data-font="Satisfy" href="#">Satisfy</a></li>
	<li><a data-font="Sansita+One" href="#">Sansita One</a></li>
	<li><a data-font="Shadows+Into+Light" href="#">Shadows Into Light</a></li>
	<li><a data-font="Shadows+Into+Light+Two" href="#">Shadows Into Light Two</a></li>
	<li><a data-font="Signika:300" href="#">Signika Light</a></li>
	<li><a data-font="Signika:400" href="#">Signika Regular</a></li>
	<li><a data-font="Text+Me+One" href="#">Text Me One</a></li>
	<li><a data-font="Ubuntu:300" href="#">Ubuntu Light</a></li>
	<li><a data-font="Ubuntu:300italic" href="#">Ubuntu Light Italic</a></li>
	<li><a data-font="Ubuntu:400" href="#">Ubuntu Regular</a></li>
	<li><a data-font="Ubuntu:400italic" href="#">Ubuntu Regular Italic</a></li>
	<li><a data-font="Ubuntu+Condensed" href="#">Ubuntu Condensed</a></li>
	<li><a data-font="Tinos" href="#">Tinos Regular</a></li>
	<li><a data-font="Tinos:400italic" href="#">Tinos Italic</a></li>
	<li><a data-font="Titillium+Web:200" href="#">Titillium Web Light</a></li>
	<li><a data-font="Titillium+Web:200italic" href="#">Titillium Web Light Italic</a></li>
	<li><a data-font="Titillium+Web:400" href="#">Titillium Web Normal</a></li>
	<li><a data-font="Titillium+Web:400italic" href="#">Titillium Web Regular Italic</a></li>
	<li><a data-font="Vollkorn" href="#">Vollkorn</a></li>
	<li><a data-font="Vollkorn:400italic" href="#">Vollkorn Italic</a></li>
	<li><a data-font="Yanone+Kaffeesatz:300" href="#">Yanone Kaffeesatz Light</a></li>
	<li><a data-font="Yanone+Kaffeesatz" href="#">Yanone Kaffeesatz Regular</a></li>';
?>

<div id="panel-wrapper" style="position:relative;">
	<div id="panel">
		<h2><?php echo $this->template; ?> Options</h2>
		<div class="panel-tools" id="styles-panel">
			<ul class="nav" id="themes">
				<li>
					<a href="#" class="<?php echo $color; ?>">Color: <span id="color-name"><?php echo $color; ?></span></a>
					<ul>
						<li class="default"><a href="#" rel="default" >Blue Default</a></li>
						<li class="green"><a href="#" rel="green">Green</a></li>
						<li class="orange"><a href="#" rel="orange">Orange</a></li>						
						<li class="red"><a href="#" rel="red">Red</a></li>						
						<li class="yellow"><a href="#" rel="yellow">Yellow</a></li>						
					</ul>
				</li>
			</ul>	
			<a id="themesinfo" href="#" title="Here you can switch the color themes."></a>
		</div>

		<div class="panel-tools" id="template-width-panel">
			<ul class="nav" id="templatewidth">
				<li>
					<a href="#" class="<?php echo $color; ?>">Template Width: <span id="width-name"><?php echo $templatewidth; ?></span></a>
					<ul>
						<li><a href="#" rel="boxed">Boxed</a></li>
						<li><a href="#" rel="full-width">Full Width</a></li>						
					</ul>
				</li>
			</ul>	
			<a id="widthinfo" href="#" title="Here you can switch the template width"></a>
		</div>
		
		<div class="panel-tools" id="menu-styles-panel">
			<ul class="nav" id="menustyle">
				<li>
					<a href="#" class="<?php echo $color; ?>">Menu Style: <span id="menu-name"><?php echo $menustyle; ?></span></a>
					<ul>
						<li><a href="#" rel="default">Modern</a></li>
						<li><a href="#" rel="clean">Clean</a></li>						
						<li><a href="#" rel="big">Big</a></li>
						<li><a href="#" rel="pills">Pills</a></li>
					</ul>
				</li>
			</ul>	
			<a id="menuinfo" href="#" title="Here you can switch the menu style to your needs. "></a>
		</div>
		
		<div class="panel-tools" id="fonts-panel">
				<ul class="nav" id="fonts">
					<li>
						<a href="#site-wrapper" class="<?php echo $color; ?>">Font: <span id="font-name"><?php echo $font; ?></span></a>
						<ul>
							<?php echo $fontlist; ?>
						</ul>
					</li>
				</ul>
			<a id="fontsinfo" href="#" title="Now you can switch the typeface or font. There are 50 fonts available, the best for corporate websites."></a>				
		</div>
				
		<small>This panel is for demo preview only and can be disabled in the template back-end. <a class="panel-more" href="#">More</a><span class="panel-more-info" style="display:none">This panel is only visible on pads and desktop computers. Keep in mind that the values you select are remembered over page refresh and that is why you have to clear your browser cache and/or cookies to apply your changes you select in the back-end.</span> <a class="clearcookies" href="#">Reset</a> </small>

		<div id="openpanelbutton"><a href="#" id="openpanel" title="Click to open or close options"><i class="icon-remove"></i><i class="icon-cogs"></i><span class="panel-button-text">Tools</a></div>
	</div>

<script type="text/javascript">
// <![CDATA[ 
(function($) {

	//set theme
	var demostyle = $('#styleswitcher');
	if($.cookie('style-<?php echo $this->template; ?>')) {
		$(demostyle).attr('href', '<?php echo $stylepath; ?>' + $.cookie('style-<?php echo $this->template; ?>') + '/css/style.css');
		$('.panel-tools > ul > li > a').attr("class",$.cookie('style-<?php echo $this->template; ?>'));
		$('#color-name').text($.cookie('style-<?php echo $this->template; ?>'));
	}
	$(document).ready(function() {
		$('.panel-tools #themes li ul li a').click(function(e) { 
			$('.panel-tools > ul > li > a').attr("class",$(this).attr('rel'));
			$(demostyle).attr('href', '<?php echo $stylepath; ?>' + $(this).attr('rel') + '/css/style.css');
			$.cookie("style-<?php echo $this->template; ?>",$(this).attr('rel'), {expires: 365, path: '/'});
			$('#color-name').text($(this).attr('rel'));
			e.preventDefault();
		});
	});
	
	//set width
	if($.cookie('width-<?php echo $this->template; ?>')) {
		var wcookie = $.cookie('width-<?php echo $this->template; ?>');
		$('body').removeClass('full-width').removeClass('boxed').addClass(wcookie);
		//$('.slider').removeClass('full').removeClass('template').addClass( (wcookie=='boxed')? 'template': 'full' );
		$('#width-name').text( (wcookie=='boxed')? 'Boxed': 'Full Width' );
	}
	$(document).ready(function() {
		$('.panel-tools #templatewidth li ul li a').on('click',function(e) {
			var wvalue = $(this).attr('rel');
			$('body').removeClass('full-width').removeClass('boxed').addClass( wvalue );
			//$('.slider').removeClass('full').removeClass('template').addClass( (wvalue=='boxed')? 'template': 'full' );
			$.cookie("width-<?php echo $this->template; ?>", wvalue, {expires: 365, path: '/'});
			$('#width-name').text( (wvalue=='boxed')? 'Boxed': 'Full Width' );
			e.preventDefault();
			setTimeout( function(e) { }, 200);
		});
	});
	
	//set fonts
	var fontsheet = $('#fontsheet')
	var fontlink = $('#fontlink');
	var fontCookie = $.cookie( 'font-<?php echo $this->template; ?>' );
	
	if( typeof fontCookie == 'string' && fontCookie != '' && fontCookie != null ) {
		$(fontlink).attr('href', 'http://fonts.googleapis.com/css?family='+ fontCookie + '&amp;subset=latin,latin-ext');
		$(fontsheet).text('#font-name, .mainnav ul.menu, #header-1, .nav-tabs > li > a, .contentheading, .componentheading, span.mod-desc , h1, h2, h3, h4, h5 { font-family: "' + fontCookie.split(':')[0].replace(/\+/g, ' ' ) + '"; font-weight: normal !important; font-style: ' + (fontCookie.indexOf("italic")!=-1)?"italic":"normal" + ' !important; }');
		$('#font-name').text( fontCookie.split(':')[0].replace(/\+/g, ' ' ) );
	}
	
	$('.panel-tools #fonts a').click(function(e) {
		$(fontlink).attr('href', 'http://fonts.googleapis.com/css?family=' + $(this).attr('data-font') + '&amp;subset=latin,latin-ext');
		$(fontsheet).text('#font-name, .mainnav ul.menu, #header-1, .nav-tabs > li > a, .contentheading, .componentheading, span.mod-desc , h1, h2, h3, h4, h5 { font-family: "' + $(this).attr('data-font').split(':')[0].replace(/\+/g, ' ' ), ' ' + '"; font-weight: normal !important; font-style: ' + ( $(this).attr('data-font').indexOf("italic")!=-1)?"italic":"normal" + ' !important; }');
		$('#font-name').text($(this).text());
		$.cookie("font-<?php echo $this->template; ?>",$(this).attr('data-font'), { path: '/'});
		e.preventDefault();
	});
	
	//set menu style
	$(document).ready(function() {
		var menustyle = $('#menustyle li ul li a');

		if ($.cookie('menustylecookie-<?php echo $this->template; ?>') && $.cookie('menustylecookie-<?php echo $this->template; ?>') != 'default') {
			$('#mainnav-wrapper').removeClass().addClass('main ' + $.cookie('menustylecookie-<?php echo $this->template; ?>'));
			$('#menu-name').text($.cookie('menustylecookie-<?php echo $this->template; ?>'));
		} else if ($.cookie('menustylecookie-<?php echo $this->template; ?>') && $.cookie('menustylecookie-<?php echo $this->template; ?>') == 'default') {
			$('#mainnav-wrapper').removeClass().addClass('main');
		}
		
		$('.panel-tools #menustyle li ul li a').click(function(e) {
			$('#mainnav-wrapper').removeClass();
			if ($(this).attr('rel') != 'default' ) { $('#mainnav-wrapper').addClass('main ' + $(this).attr('rel')); $('#menu-name').text($(this).attr('rel'));
			} else { $('#mainnav-wrapper').addClass('main'); $('#menu-name').text($(this).attr('rel')); }
			$.cookie('menustylecookie-<?php echo $this->template; ?>',$(this).attr('rel'), {expires: 365, path: '/'});
			e.preventDefault();
		});
		
		$('.clearcookies').click(function(e) {
			$.cookie('menustylecookie-<?php echo $this->template; ?>','', {path: '/'});
			$.cookie('style-<?php echo $this->template; ?>','', {path: '/'});
			$.cookie('font-<?php echo $this->template; ?>','', {path: '/'});
			$.cookie('width-<?php echo $this->template; ?>','', {path: '/'});
			location.reload(); e.preventDefault();
		});
	});	
	
})(jQuery);	

(function($) {
	$(document).ready(function() {
	
		$('#openpanel').click(function (e) {
			e.preventDefault();
			var lefty = $('#panel');
			
			lefty.stop().animate({
				left: parseInt(lefty.css('left')) == 0 ? -255 : 0
				},500, function() {$('#openpanel').toggleClass('active');  });
		});
		$('a.panel-more').click(function (e) {
			e.preventDefault();
			$(this).hide();
			$('span.panel-more-info').show();
		});
	})	
})(jQuery);


// ]]>
</script>
</div>