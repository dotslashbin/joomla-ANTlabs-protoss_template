<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
<?php
foreach ($list as $item) :


$item_heading = $params->get('item_heading', 'h4');

 if ($params->get('item_title')) : ?>

	<h4 class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if ($params->get('link_titles') && $item->link != '') : ?>
		<a href="<?php echo $item->link;?>">
			<?php echo $item->title;?></a>
	<?php else : ?>
		<?php echo $item->title; ?>
	<?php endif; ?>
	</h4>

	<?php endif; ?>

<?php
 if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif;

 echo $item->beforeDisplayContent;

echo $item->introtext;

 if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
	echo '<p class="readmore"><a href="'.$item->link.'">'.$item->linkText.'</a></p>';
endif;

endforeach;
?>
</div>
