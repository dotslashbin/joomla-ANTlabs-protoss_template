<?php defined('_JEXEC') or die; 

$font 	= $this->params->get('font_selection','Abel');
$weight = $this->params->get('font_weight','400');
$subset = $this->params->get('font_subset','latin');

?>

<link id="fontlink" href='http://fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", $font); if ($weight) echo ':'.$weight; if ($subset) echo '&amp;subset='.$subset; ?>' rel='stylesheet' type='text/css' media='all' />

<style id="fontsheet" type="text/css" media="all">
#font-name, .mainnav ul.menu, #header-1, 
.nav-tabs > li > a,
.contentheading, .componentheading, span.mod-desc , h1, h2, h3, h4, h5 {
	font-family: '<?php echo $font; ?>', Helvetica, Verdana, Arial, sans-serif !important;
	font-weight: <?php if (strpos($weight, 'bold' ) !== false || strpos($weight, '700' ) !== false ) { echo 'bold'; } else { echo 'normal';} ?>; 
	font-style: <?php if (strpos( $font, 'italic' ) !== false ) { echo 'italic'; } else { echo 'normal';} ?>;
}
</style>


