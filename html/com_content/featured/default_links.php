<?php
/**
 * Author Dan Partac
 * Copyright (C) 2005 - 2012 Dan Partac. All rights reserved.
 * @license	commercial
 */

// no direct access
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$templateparams =$app->getTemplate(true)->params;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>

<h3><?php echo JText::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>

<ol class="links">
<?php foreach ($this->link_items as &$item) : ?>
	<li>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>">
			<?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ol>

