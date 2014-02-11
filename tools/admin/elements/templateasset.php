<?php
/*
 * DNP Theme
 * http://pcadviser.ro
 *
 * Copyright (c) 2013 Dan Partac - http://pcadviser.ro
 * commercial
 *
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');


JLoader::import('joomla.filesystem.file');


class JFormFieldTemplateAsset extends JFormField {
    protected $type = 'TemplateAsset';
    protected function getInput() {

		
        $db	= JFactory::getDBO();
        $sql = 'SELECT template FROM #__template_styles WHERE client_id=0 AND home=1';
        $db->setQuery($sql);
        $template = $db->loadResult();
	
		$doc = JFactory::getDocument();

        // scripts
        $doc->addScript( JURI::root() .'/templates/'. $template .'/tools/admin/admin.js');
  		
		// stylesheets
        $doc->addStyleSheet( JURI::root() .'/templates/'. $template .'/tools/admin/admin.css');        
        return null;
    }
}
