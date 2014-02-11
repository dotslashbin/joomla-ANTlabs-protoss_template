<?php
/**
 * Author Dan Partac
 * Copyright (C) 2005 - 2012 Dan Partac. All rights reserved.
 * @license	commercial
 */

// No direct access.
defined('_JEXEC') or die;

JHtml::_('behavior.framework', true);

// get params
$app			= JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
$doc			= JFactory::getDocument();
$siteName 		= $app->getCfg('sitename');

$color			= $this->params->get('templatecolor');
$tools			= $this->params->get('tools');
$fonts			= $this->params->get('fonts');
$colorPath		= JPATH_SITE .'/templates/'. $this->template .'/themes/' . $color . '/css/style.css';
$ga				= $this->params->get('ga');
$isK2 			= JRequest::getCmd( 'option' ) == 'com_k2';
$mainmenu		= $this->params->get('mainnavigation', 'mainmenu');

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="ltr" >
<head>	
	<jdoc:include type="head" />

	<!-- //Metadata -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-touch-fullscreen" content="YES" />
	<!-- //Metadata -->

	<!-- //Basic Styling -->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/reset.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/print.css" media="print" />
	<!-- //Basic Styling -->
	
	<!-- //k2 styling -->
	<?php // load k2 styling only if needed
	if (!$isK2) {} else { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/k2-style.css" media="all" />
	<?php } ?>	
	<!-- //k2 styling -->
	
	<!-- //Color Theme -->
	<?php if ($color == "default" ) : // load default theme ?>
		<link id="styleswitcher" type="text/css" rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/themes/default/css/style.css" media="all" />
	<?php  endif; if ($color !== "default" && file_exists($colorPath) ) : // load another theme ?>
		<link id="styleswitcher" type="text/css" rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/themes/<?php echo $color; ?>/css/style.css" media="all" />
	<?php endif ; ?>
	<!-- //Color Theme -->
	

	<!--[if IE 7]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 8]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	


</head>

<body>

<!-- //begin site -->	
<div id="site-wrapper" class="wrap">
	

	<!-- //beggin content -->
	<div id="main-wrapper" class="main">
		<div class="main-inner clearfix">
			<div id="content">
				<div class="component-wrapper">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</div>
		</div>
	</div>
	<!-- //end content -->


	
</div>
<!-- //end site wrapper -->
		<jdoc:include type="modules" name="debug" />
	</body>
</html>
