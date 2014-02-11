<?php defined('_JEXEC') or die; 
//get variables
$url = JURI::current(); 
$title = $this->getTitle();

?>

<?php if ($this->params->get('facebook_share') == "1") : ?>
	<li id="facebook-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('twitter_share') == "1") : ?>
	<li id="twitter-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('pinterest_share') == "1") : ?>
	<li id="pinterest-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('linkedin_share') == "1") : ?>
	<li id="linkedin-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('google_share') == "1") : ?>
	<li id="googleplus-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('delicious_share') == "1") : ?>
	<li id="delicious-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>

<?php if ($this->params->get('stumbleupon_share') == "1") : ?>
	<li id="stumbleupon-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>"></li>
<?php endif; ?>