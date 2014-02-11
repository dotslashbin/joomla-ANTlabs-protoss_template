<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php
//get template params
$app = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;

//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="language" content="<?php echo $this->language; ?>" />

<title><?php echo $this->error->getCode(); ?> | <?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></title>
<?php if ($this->error->getCode()>=400 && $this->error->getCode() < 500) { 	?>


		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" media="all" />

		<!--[if lte IE 6]>
			<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<!--[if IE 7]>
			<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
		<![endif]-->

</head>

<body class="error">


	<div id="site-wrapper" class="wrap" style="text-align:center;">			
		<div id="main-wrapper" class="main error" style="width: 100%;">
			<div class="main-inner" style="background:none;">
					<div><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/404.jpg" alt="404" ></div>
					<h1><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>
					<p><?php echo JText::_('JERROR_SPELLING'); ?></p>


			</div>
		</div>

		<div class="main error" style="width: 100%;">
			<div class="main-inner" style="background:none;">
			<p><a href="<?php echo $this->baseurl; ?>/" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>

				<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?><br />

				<em><?php echo $this->error->getCode() ; ?>&nbsp;<?php echo $this->error->getMessage();?></em></p>						
					<?php if ($this->debug) :
						echo $this->renderBacktrace();
					endif; ?>
			</div>
		</div>

	</div> 
</body>
</html>
<?php } ?>