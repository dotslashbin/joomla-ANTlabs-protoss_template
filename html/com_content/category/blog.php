<?php
/**
 * Author Dan Partac
 * Copyright (C) 2005 - 2012 Dan Partac. All rights reserved.
 * @license	commercial
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');


?>
<div class="blog<?php echo $this->pageclass_sfx;?>">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
	<h2>
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
		<?php if ($this->params->get('show_category_title')) : ?>
			<span class="subheading-category"><?php echo $this->category->title;?></span>
		<?php endif; ?>
	</h2>
	<?php endif; ?>


<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<div class="category-desc">
	<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
		<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
		<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
	<?php endif; ?>
	<div class="clr"></div>
	</div>
<?php endif; ?>



<?php $leadingcount=0 ; ?>
<?php if (!empty($this->lead_items)) : ?>
<div class="items-leading">
	<?php foreach ($this->lead_items as &$item) : ?>
		<div class="leading leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? 'system-unpublished' : null; ?>">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</div>
		<?php
			$leadingcount++;
		?>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<?php
	$introcount=(count($this->intro_items));
	$counter=0;
?>
<?php if (!empty($this->intro_items)) : ?>
	<div class="items-row cols-<?php echo (int) $this->columns;?>">

	<?php foreach ($this->intro_items as $key => &$item) : ?>

		<div class="blog-item <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
			<div class="item-inner">
				<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
				?>
			</div>
		</div>

	<?php endforeach; ?>
	</div>

	<?php //count stuff
		$allImages = array();
		$allIntro = array();
		$allFull = array();
		
		foreach ($this->intro_items as $key => &$item) {
			$allImages[] = json_decode($item->images);
			$allIntro[] = $allImages[$key]->image_intro;
			$allFull[] = $allImages[$key]->image_fulltext;
		}
	?>

	<?php if ( !empty($allFull) && !empty($allIntro) ) : ?>
		
		<div id="gallery-page-modal" class="swiper">
			<div id="gallery-carousel-gallery" style="margin: 0" class="dnp-swiper-news">
				<div class="dnp-swiper-news-inner">
					<?php $counter1 = 0;
						foreach ($this->items as $key => &$citem) {
													
							$class = ($counter1==0) ? 'active dnp-swiper-news-item' : 'dnp-swiper-news-item';
							$this->item = &$citem;		
					?>
							<?php if ( !empty($allFull[$key]) && !empty($allIntro[$key]) ) { ?>
							<div class="<?php echo $class; echo ' item-'.$citem->id; ?>">
								<div class="carousel-item-inner">
									<?php echo $this->loadTemplate('item_carousel'); ?>
								</div> 
							</div> 
						<?php }
							$counter1++;
							}
						?>
				</div>
			</div>
			
			<?php if ( count($this->intro_items) > 1 ) : ?>
				<a class="btn left" href="#gallery-carousel-gallery" data-slide="prev"><i class="icon-double-angle-left"></i></a>
				<a class="btn right" href="#gallery-carousel-gallery" data-slide="next"><i class="icon-double-angle-right"></i></a>
			<?php endif; ?>
			
			<a title="<?php echo JText::_('TPL_TEMPLATE_CLOSE'); ?>" aria-hidden="true" data-dismiss="modal" href="#" class="close-gallery"><i class="icon-remove"></i></a>
			
		</div><?php // end the carousel ?>
		
	<?php endif; ?>

<?php endif; ?>

<?php if (!empty($this->link_items)) : ?>

	<?php echo $this->loadTemplate('links'); ?>

<?php endif; ?>


	<?php if (is_array($this->children[$this->category->id]) && count($this->children[$this->category->id]) > 0 && $this->params->get('maxLevel') !=0) : ?>
		<div class="cat-children">
		<h3>
			<?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?>
		</h3>
			<?php echo $this->loadTemplate('children'); ?>
		</div>
	<?php endif; ?>

<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter">
						<?php echo $this->pagination->getPagesCounter(); ?>
				</p>

			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
<?php endif; ?>

<?php if ( !empty($allFull) && !empty($allIntro) ) : ?>
	<script type="text/javascript">
	//<![CDATA[
	(function($) {
		$(document).ready(function() {
			var dnpPopupSwiper = $('#gallery-carousel-gallery').swiper({
				slideClass : 'dnp-swiper-news-item',
				wrapperClass : 'dnp-swiper-news-inner',
				slideActiveClass: 'active',
				slideVisibleClass: 'visible-item',
				grabCursor: true,
				autoplay: 0,
				speed: 500,
				loop: true,
				keyboardControl: false,
				mousewheelControl: false,
				calculateHeight : false,
				autoResize: true,
				freeMode: false,
				freeModeFluid: false,
				visibilityFullFit: false,
				resizeReInit: false
			});
			
			$('#gallery-page-modal .btn.right').on('click', function() {
				dnpPopupSwiper.swipeNext();							
			});		
			$('#gallery-page-modal .btn.left').on('click', function() {
				dnpPopupSwiper.swipePrev();
			});
			
			$('.gallery-item > a').on('click',function(e){
				e.preventDefault();
				var cls = $(this).attr('class');
				var idx = $('#gallery-page-modal .' + cls ).index();
				dnpPopupSwiper.swipeTo((idx-1), 0, false);
				//$('#gallery-page-modal [class*="item"]' ).removeClass('active').removeClass('visible-item');
				//$('#gallery-page-modal .' + cls ).addClass('active').addClass('visible-item');
			});	
			
		});
	})(jQuery);

	//]]>
	</script>	
<?php endif; ?>
</div>


