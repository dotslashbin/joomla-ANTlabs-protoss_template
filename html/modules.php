<?php

defined('_JEXEC') or die('Restricted access');


/*
 * Default Module Chrome that has semantic markup and has best SEO support
 */
function modChrome_dnpxhtml($module, &$params, &$attribs)
{ 
?>
	<div class="moduletable <?php echo $params->get('moduleclass_sfx'); ?>" id="mod<?php echo $module->id; ?>">
		<div class="inner">
			<?php if ($module->showtitle != 0) : ?>
				<h3><?php echo $module->title; ?></h3>
			<?php endif; ?>
			<div class="box-ct clearfix">
				<?php echo $module->content; ?>
			</div>
		</div>
    </div>
	
<?php } 
function modChrome_raw($module, &$params, &$attribs)
{ 
	echo $module->content; 
} 

function modChrome_inner3($module, &$params, &$attribs)
{ ?>
	<div class="moduletable inner3 <?php echo $params->get('moduleclass_sfx'); ?>" id="mod<?php echo $module->id; ?>">
		<div class="inner2">
			<div class="inner1">
				<div class="inner">
					<?php if ($module->showtitle != 0) : ?>
						<h3><?php echo $module->title; ?></h3>
					<?php endif; ?>
					<div class="modulecontent">
						<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } 

function modChrome_inner2($module, &$params, &$attribs)
{ ?>
	<div class="moduletable inner2 <?php echo $params->get('moduleclass_sfx'); ?>" id="mod<?php echo $module->id; ?>">
		<div class="inner1">
			<div class="inner">
				<?php if ($module->showtitle != 0) : ?>
					<h3><?php echo $module->title; ?></h3>
				<?php endif; ?>
				<div class="modulecontent">
					<?php echo $module->content; ?>
				</div>
			</div>
		</div>
	</div>
<?php } 

function modChrome_inner1($module, &$params, &$attribs)
{ ?>
	<div class="moduletable inner1 <?php echo $params->get('moduleclass_sfx'); ?>" id="mod<?php echo $module->id; ?>">
		<div class="inner">
			<?php if ($module->showtitle != 0) : ?>
				<h3><?php echo $module->title; ?></h3>
			<?php endif; ?>
			<div class="modulecontent">
				<?php echo $module->content; ?>
			</div>
		</div>
	</div>
<?php }

function modChrome_inner($module, &$params, &$attribs)
{ ?>
	<div class="moduletable inner <?php echo $params->get('moduleclass_sfx'); ?>" id="mod<?php echo $module->id; ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h3><?php echo $module->title; ?></h3>
		<?php endif; ?>
		<div class="modulecontent">
			<?php echo $module->content; ?>
		</div>
	</div>
<?php } 

function modChrome_mainnav($module, &$params, &$attribs)
{ 
?>
		<?php echo $module->content; ?>
		<ul class="menu mini">
			<li class="parent deeper mini">
			<a href="#" class="open-mini"><?php echo JText::_('TPL_MENU'); ?></a>
				<script type="text/javascript">//<![CDATA[ 
				(function($) {
					$(document).ready(function() {
						$('.mainnav .mini li a').attr('rel','nofollow');
					});
				})(jQuery);	
				//]]></script>
				<?php echo $module->content; ?>
			</li>
		</ul>	
	
<?php } 