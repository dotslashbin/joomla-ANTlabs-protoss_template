<?php defined('_JEXEC') or die;

	$mainmenu = $this->params->get('mainnavigation', 'mainmenu');
	
	// Get a database object
	$db = JFactory::getDBO();
	$query = $db->getQuery(true);
	
	$query->select('id, menutype, title')
		  ->from('#__menu_types')
		  ->where('menutype='.$db->quote($mainmenu)); 
	$db->setQuery($query);
	$result = $db->loadObject();
	$menutitle = $result->title;

	jimport( 'joomla.application.module.helper' );
	$module = JModuleHelper::getModule( 'mod_menu', $menutitle );
	//$module = JModuleHelper::getModule( $mainmenu, $menutitle );
	//$module = JModuleHelper::getModule( 'mainmenu', 'Main Menu' );
	$module->params = "menutype=" . $mainmenu ."\nshowAllChildren=1";
	$attribs['style'] = 'mainnav';
	echo JModuleHelper::renderModule($module, $attribs);
	
 ?>


