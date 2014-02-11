<?php
/**
 * Author Dan Partac
 * Copyright (C) 2005 - 2012 Dan Partac. All rights reserved.
 * @license	commercial
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');
JHtml::_('bootstrap.framework', true);

// added by KSW to open lightbox
JHTML::_('behavior.modal');

// get template params
$app			= JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
$doc			= JFactory::getDocument();
$siteName 		= $app->getCfg('sitename');

$menustyle		= $this->params->get('menustyle');
$color			= $this->params->get('templatecolor');
$tools			= $this->params->get('tools');
$hidecontent	= $this->params->get('hide_content');
$font			= $this->params->get('font_selection');
$colorPath		= JPATH_SITE .'/templates/'. $this->template .'/themes/' . $color . '/css/style.css';
$ga				= $this->params->get('ga');
$responsive		= $this->params->get('templateresponsive','1');

$mainmenu		= $this->params->get('mainnavigation', 'mainmenu');
$templatewidth	= $this->params->get('template_width', 'full-width');

// networking				
$facebooknetworking		= $this->params->get('facebook_networking');
$twitternetworking		= $this->params->get('twitter_networking');
$pinterestnetworking	= $this->params->get('pinterest_networking');
$googlenetworking		= $this->params->get('google_networking');
$linkedinnetworking		= $this->params->get('linkedin_networking');

//contact
$phone		= $this->params->get('telephone');
$address	= $this->params->get('address');
$mail		= $this->params->get('mail');

// Browser class
jimport('joomla.environment.browser');
$doc = JFactory::getDocument();
$browser = JBrowser::getInstance();
$browserType = $browser->getBrowser();
$browserVersion = $browser->getMajor();
if(($browserType == 'msie') && ($browserVersion == 7)) { $browserClass = 'browserIE browserIE7'; }
if(($browserType == 'msie') && ($browserVersion == 8)) { $browserClass = 'browserIE browserIE8'; }
if(($browserType == 'msie') && ($browserVersion == 9)) { $browserClass = 'browserIE browserIE9'; }
if(($browserType == 'msie') && ($browserVersion == 10)) { $browserClass = 'browserIE browserIE10'; }
if(($browserType == 'mozilla') ) { $browserClass = 'browserFirefox'.$browserVersion; }
if(($browserType == 'safari') ) { $browserClass = 'browserSafari'.$browserVersion; }
if(($browserType == 'chrome') ) { $browserClass = 'browserChrome'.$browserVersion; }

// share count
$list =   array(
	$this->params->get('facebook_share'),
	$this->params->get('twitter_share'),
	$this->params->get('google_share'),
	$this->params->get('linkedin_share'),
	$this->params->get('delicious_share'),
	$this->params->get('pinterest_share'),
	$this->params->get('stumbleupon_share')
);

$shcount = array_sum($list);
$shcount = array_reduce(
    $list,
    function($counter, $value) {
        return $counter + ($value == '1');
    },
    0
);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="ltr" >
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-touch-fullscreen" content="YES" />

	
	<?php if ($font != "none" ) : ?>
		<?php require_once JPATH_BASE .'/templates/'. $this->template . '/tools/fonts.php'; ?>
	<?php endif ; ?>	
	
	<jdoc:include type="head" />

	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/reset.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography.css" media="all" />

	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	
	<?php if ($color == "default" ) : // load default theme ?>
		<link id="styleswitcher" type="text/css" rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/themes/default/css/style.css" media="all" />
	<?php  endif; if ($color !== "default" && file_exists($colorPath) ) : // load another theme ?>
		<link id="styleswitcher" type="text/css" rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/themes/<?php echo $color; ?>/css/style.css" media="all" />
	<?php endif ; ?>
	
	<?php if ($responsive == "1" ) : // load default theme ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template-responsive.css" media="only screen and (max-width:1200px)" />
	<?php endif ; ?>
	
	<!--[if IE 8]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	
	<?php if ($tools != 'disable') : ?>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/cookie.js"></script>
	<?php endif ; ?>
	
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/swiper.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jqscripts.js"></script>

	<?php if ( $shcount > 0 ) :  ?>
		<?php require_once JPATH_BASE .'/templates/'. $this->template . '/tools/sharingjs.php'; ?>
	<?php endif ; ?>
	
	<?php if ($ga != null ): ?>
		<script type="text/javascript">
			<?php echo $ga; ?>
		</script>
	<?php endif ; ?>

        <style>
            span.slogan {
                color:#666666;
                font-size: 12px;
                font-style: italic; 
            }
            
            span.highlighted-word {
                font-weight: bold; 
            }
        </style>
</head>

<body class="<?php echo $browserClass; ?> <?php echo $templatewidth; ?>">

<div id="site-wrapper" class="wrap">

	<div id="header" class="main">
		<div class="main-inner clearfix">
		
			<h1 class="logo" id="site-logo">
				<a href="<?php echo $this->baseurl; ?>/" title="<?php echo $siteName; ?>"></a>
			</h1>
                        <!-- 
                            ANTlabs modification: start
                            NOTE: the additional <span> element below is added 
                            display slogan right after the logo
                        <div style="float: left; padding-top: 22px;">
                            <span class="slogan">Proven technology solutions for</span> <span class="slogan highlighted-word" >service providers'</span> <span class="slogan">unique</span> <span class="slogan highlighted-word">Internet business</span> <span class="slogan">needs.</span>
                        </div>
                        <!-- END -->
                        
			<?php if ($this->countModules('header-1')): ?>
			<div id="header-1">
                                <a id="ANT_sales-enquiry-link" href="index.php?option=com_breezingforms&view=form&Itemid=132">Sales Enquiry</a>
				<?php if ( $phone !='') { echo '<p>'.JText::_('TPL_CALL').' '.$phone.'</p>'; } ?>
			</div>
			<?php endif; ?>

			<?php if ( $facebooknetworking != '' || $twitternetworking !='' || $pinterestnetworking !='' || $googlenetworking !='' || $linkedinnetworking !='' ): ?>
			<div id="header-2">
				<ul class="social-icons">
					<?php if ( $pinterestnetworking !='') { ?><li><a target="_blank" href="<?php echo $pinterestnetworking; ?>"><i class="icon-pinterest-sign"></i><span class="social-text">Pinterest</span></a></li><?php } ?>
					<?php if ( $facebooknetworking !='' ) { ?><li><a target="_blank" href="<?php echo $facebooknetworking; ?>"><i class="icon-facebook-sign"></i><span class="social-text">Facebook</span></a></li><?php } ?>
					<?php if ( $googlenetworking !='' ) { ?><li><a target="_blank" href="<?php echo $googlenetworking; ?>"><i class="icon-google-plus-sign"></i><span class="social-text">Google+</span></a></li><?php } ?>
					<?php if ( $linkedinnetworking !='' ) { ?><li><a target="_blank" href="<?php echo $linkedinnetworking; ?>"><i class="icon-linkedin-sign"></i><span class="social-text">LinkedIn</span></a></li><?php } ?>
					<?php if ( $twitternetworking !='' ) { ?><li><a target="_blank" href="<?php echo $twitternetworking; ?>"><i class="icon-twitter-sign"></i><span class="social-text">Twitter</span></a></li><?php } ?>
				</ul>
			</div>
			<?php endif; ?>
			
		</div> 
	</div> 

	<div id="mainnav-wrapper" class="main <?php if ($menustyle != 'default') echo $menustyle; ?>"> 
		<div class="mainnav main-inner clearfix">			
			<?php require_once JPATH_BASE.'/templates/'. $this->template . '/tools/menu.php'; ?>

			<?php if ($this->countModules('search')): ?>
			<div id="search"><i class="icon-search"></i>
				<jdoc:include type="modules" name="search" style="raw" />
			</div>
			<?php endif; ?>
			
		</div>
	</div>

	<?php if ($this->countModules('slider')): ?>
		<div id="slideshow">
			<jdoc:include type="modules" name="slider" style="raw" />
		</div>
	<?php endif; ?>

	<?php if ( $this->countModules( 'login + breadcrumbs + feedback') != 0 || $shcount > 0 ): ?>
	<?php if ( $this->countModules('bottom-1 + bottom-2 + bottom-3 + bottom-4') != 0 ) { $pathwayhb = 'hb'; } ?>
	<div id="pathway" class="main <?php echo ($pathwayhb != '') ? $pathwayhb:''; ?>">
		<div class="main-inner clearfix">
			<i class="icon-map-marker"></i><jdoc:include type="modules" name="breadcrumbs" style="raw" />
		
			<?php if($this->countModules('login + feedback') != 0 ) : ?>
			
				<div class="top-links" >
					<ul class="nav">
						<li>
							<a href="#"><?php echo JText::_('TPL_CONNECT'); ?> <i class="icon-chevron-down"></i></a>
							<ul>
							
								<?php if( $shcount > 0 ) : ?>
									<li><a href="#" role="button"><?php echo JText::_("TPL_TEMPLATE_SHARE"); ?></a>
										<ul>
											<?php require_once JPATH_BASE.'/templates/'. $this->template . '/tools/sharing.php'; ?>
										</ul>
									</li>
								<?php endif; ?>	

								<?php if($this->countModules('feedback')) : ?>
									<li><a href="#" id="openfeedback"><span class="social-text"><?php echo JText::_('FEEDBACK_BUTTON'); ?></span></a></li>
								<?php endif; ?>

								<?php if($this->countModules('login')) : ?>
									<li><a href="#" id="openlogin"><span class="social-text"><?php echo JText::_('LOGIN_BUTTON'); ?></span></a></li>
								<?php endif; ?>

							</ul>
						</li>						
					</ul>
				</div>			
			<?php endif; ?>
			
			<div class="top-link">
				<a id="gototop" href="#site-wrapper" title="<?php echo JText::_('TOP_DESC')?>"><i class="icon-chevron-up"></i></a>
			</div>			
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('top-portfolio')): ?>
		<div id="top-portfolio" class="main <?php if ($this->countModules('slider')) echo ' hs'; ?>">
			<div class="main-inner clearfix">
				<jdoc:include type="modules" name="top-portfolio" style="dnpxhtml" />
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ( $this->countModules('top-1 + top-2 + top-3 + top-4') != 0 ): ?>
	<?php //counting stuff
		$topmodules = 0;
		for($i = 1; $i < 5; $i++){
			if($this->countModules('top-'.$i)){
			    $topmodules++;		
			}	
		}
	?>
	
	<div id="top-wrapper" class="main spotlight columns-<?php echo $topmodules; if ($this->countModules('top-portfolio')) echo ' ht'; if ($this->countModules('slider')) echo ' hs'; ?>">
		<div class="main-inner clearfix">
			<div class="spotlight-inner clearfix">
				<?php if ($this->countModules('top-1')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="top-1" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('top-2')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="top-2" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('top-3')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="top-3" style="dnpxhtml" /></div>
				<?php endif ; ?>
				<?php if ($this->countModules('top-4')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="top-4" style="dnpxhtml" /></div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
	<?php endif ; ?>
	
	<?php if ($hidecontent != 'enable'): ?>
		<div id="main-wrapper" class="main <?php if ($this->countModules('top-portfolio')) echo ' ht'; if ($this->countModules('slider')) echo ' hs';  if ($this->countModules('top-portfolio + top-1 + top-2 + top-3 + top-4')) echo ' ht'; ?>">
			<div class="main-inner clearfix">
		
				<?php if ($this->countModules('position-5') && !$this->countModules('position-7')) {
					$mainClass = "hl";
				} else if (!$this->countModules('position-5') && $this->countModules('position-7')) {
					$mainClass = "hr";
				} else if ($this->countModules('position-5') && $this->countModules('position-7')) {
					$mainClass = "hl hr";
				} else if (!$this->countModules('position-5') && !$this->countModules('position-7')) {
					$mainClass = "";
				} ?>
				
				<div id="content" class="<?php echo $mainClass; if ($this->countModules('top-portfolio + top-1 + top-2 + top-3 + top-4')) echo ' ht'; if ($this->countModules('top-portfolio')) echo ' ct'; ?>">

					<?php if ($this->countModules('content-top')): ?>
					<div id="content-top">
						<jdoc:include type="modules" name="content-top" style="dnpxhtml" />
					</div>
					<?php endif; ?>

					<div class="component-wrapper">
						
						<jdoc:include type="message" />
						
						<?php if ($this->countModules('left-inner')): ?>
						<div class="left-inner" id="left-inner" >
							<jdoc:include type="modules" name="left-inner" style="dnpxhtml" />
						</div>
						<?php endif; ?>	
						
						<jdoc:include type="component" />
					</div>
					
					<?php if ($this->countModules('content-bottom')): ?>
					<div id="content-bottom">
						<jdoc:include type="modules" name="content-bottom" style="dnpxhtml" />
					</div>
					<?php endif; ?>
				</div>
				
				<?php if ($this->countModules('position-5')): ?>
				<div class="left <?php echo $mainClass; if ($this->countModules('top-portfolio + top-1 + top-2 + top-3 + top-4')) echo ' ht'; ?>" id="left" >
					<jdoc:include type="modules" name="position-5" style="dnpxhtml" />
				</div>
				<?php endif; ?>
				
				<?php if ($this->countModules('position-7')): ?>
				<div class="right <?php echo $mainClass; if ($this->countModules('top-portfolio + top-1 + top-2 + top-3 + top-4')) echo ' ht'; ?>" id="right" >
					<jdoc:include type="modules" name="position-7"  style="dnpxhtml" />
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif ; ?>

	<?php if ($this->countModules('bottom-portfolio')): ?>
	<div id="bottom-portfolio" class="main">
		<div class="main-inner clearfix">
			<jdoc:include type="modules" name="bottom-portfolio" style="dnpxhtml" />
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('ct-1 + ct-2 + ct-3 + ct-4') ) : ?>
	<?php // count positions
		$ctmodules = 0;
		for($i = 1; $i < 5; $i++){
			if($this->countModules('ct-'.$i)){
			    $ctmodules++;		
			}	
		}
	?>
	<div id="ct-wrapper" class="main spotlight columns-<?php echo $ctmodules; ?>">
		<div class="main-inner clearfix">
			<div class="spotlight-inner clearfix">
				<?php if ($this->countModules('ct-1')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="ct-1" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('ct-2')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="ct-2" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('ct-3')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="ct-3" style="dnpxhtml" /></div>
				<?php endif ; ?>
				<?php if ($this->countModules('ct-4')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="ct-4" style="dnpxhtml" /></div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
	<?php endif ; ?>
	
	<?php if ($this->countModules('bottom-1 + bottom-2 + bottom-3 + bottom-4') ) : ?>
	<?php //count positions
		$botclass = 0;
		for($i = 1; $i < 5; $i++){
			if($this->countModules('bottom-'.$i)){
			    $botclass++;		
			}	
		}
	?>
	<div id="bottom-wrapper" class="main spotlight columns-<?php echo $botclass; ?>">
		<div class="main-inner clearfix">
			<div class="spotlight-inner clearfix">
				<?php if ($this->countModules('bottom-1')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="bottom-1" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('bottom-2')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="bottom-2" style="dnpxhtml" /></div>
				<?php endif; ?>
				<?php if ($this->countModules('bottom-3')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="bottom-3" style="dnpxhtml" /></div>
				<?php endif ; ?>
				<?php if ($this->countModules('bottom-4')): ?>
				<div class="modulebox"><jdoc:include type="modules" name="bottom-4" style="dnpxhtml" /></div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
	<?php endif ; ?>
	
	<?php if ( $this->countModules('footernav') ) : ?>
	<div id="footer-wrapper" class="main">
		<div class="main-inner">
			<div id="footernav">
				<jdoc:include type="modules" name="footernav" style="raw" />
			</div>

			<?php if ( $facebooknetworking != '' || $twitternetworking !='' || $pinterestnetworking !='' || $googlenetworking !='' || $linkedinnetworking !='' ): ?>
			<div id="social">
				<ul class="social-icons">
					<?php if ( $pinterestnetworking !='') { ?><li><a target="_blank" href="<?php echo $pinterestnetworking; ?>"><i class="icon-pinterest-sign"></i><span class="social-text">Pinterest</span></a></li><?php } ?>
					<?php if ( $facebooknetworking !='' ) { ?><li><a target="_blank" href="<?php echo $facebooknetworking; ?>"><i class="icon-facebook-sign"></i><span class="social-text">Facebook</span></a></li><?php } ?>
					<?php if ( $googlenetworking !='' ) { ?><li><a target="_blank" href="<?php echo $googlenetworking; ?>"><i class="icon-google-plus-sign"></i><span class="social-text">Google+</span></a></li><?php } ?>
					<?php if ( $linkedinnetworking !='' ) { ?><li><a target="_blank" href="<?php echo $linkedinnetworking; ?>"><i class="icon-linkedin-sign"></i><span class="social-text">LinkedIn</span></a></li><?php } ?>
					<?php if ( $twitternetworking !='' ) { ?><li><a target="_blank" href="<?php echo $twitternetworking; ?>"><i class="icon-twitter-sign"></i><span class="social-text">Twitter</span></a></li><?php } ?>
				</ul>
			</div>
			<?php endif; ?>
			
			<?php if ($phone !='' || $address != '' || $mail != '' ): ?>			
			<div id="contact">
				<ul class="typo-list" style="float: left">
					<?php if ($address !='') { ?><li><i class="icon-home"></i> <?php echo $address; ?></li><?php } ?>
					<?php if ($phone !='') { ?><li><i class="icon-phone"></i> <?php echo $phone; ?></li><?php } ?>
					<?php if ($mail !='') { ?><li><i class="icon-envelope"></i> <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></li><?php } ?>
				</ul>
			</div>
			<?php endif; ?>

		</div>
	</div>
	<?php endif ; ?>

	<?php if ($this->countModules('footer')): ?>
	<div id="copyright-wrapper" class="main">
		<div class="main-inner">	
			<div id="footer">
				<jdoc:include type="modules" name="footer" style="raw" />
			</div>	
		</div>
	</div>
	<?php endif ; ?>
	<?php if ($tools != 'disable') : ?>
		<?php require_once JPATH_BASE.'/templates/'. $this->template . '/tools/panel.php'; ?>
	<?php endif ; ?>

	
	<?php if($this->countModules('login')) : ?>
		<div id="login-wrapper">
			<div id="login-wrapper-div">			
				<div id="dnp-login">
					<jdoc:include type="modules" style="xhtml" name="login" />
				</div>
			<!-- <a href="#" id="openlogin" title="<?php //echo JText::_('LOGIN_BUTTON'); ?>">Open/Close</a> -->
			</div>
		</div>
	<?php endif; ?>

	<?php if($this->countModules('feedback')) : ?>
		<div id="feedback-wrapper">
			<div id="feedback-wrapper-div">			
				<div id="dnp-feedback">
					<jdoc:include type="modules" style="xhtml" name="feedback" />
				</div>
			<!-- <a href="#" id="openfeedback" title="<?php echo JText::_('FEEDBACK_BUTTON'); ?>">Open/Close</a> -->
			</div>
		</div>
	<?php endif; ?>
	
        </div>
        <jdoc:include type="modules" name="debug" />
	</body>
</html>
