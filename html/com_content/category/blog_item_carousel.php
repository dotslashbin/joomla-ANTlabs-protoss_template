<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
$images = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$id = $this->item->id;

JHtml::_('behavior.framework');
?>

<?php if ( !empty($images->image_fulltext) && !empty($images->image_intro) ) : ?>

	<?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) { ?>
		<img <?php if ($images->image_fulltext_caption): echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) . '"'; endif; ?> src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" />
	<?php } else { ?>
		<img <?php if ($images->image_intro_caption): echo 'class="caption"'.' title="' . htmlspecialchars($images->image_intro_caption) . '"'; endif; ?> src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" />
	<?php } ?>
	<div class="carousel-caption"><h4><?php echo $this->item->title; ?></h4></div>

<?php endif; ?>