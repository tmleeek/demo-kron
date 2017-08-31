<?php
/**
 * Magestore
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category 	Magestore
 * @package 	Magestore_Madapter
 * @copyright 	Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license 	http://www.magestore.com/license-agreement.html
 */

 /**
 * Madapter Edit Tabs Block
 * 
 * @category 	Magestore
 * @package 	Magestore_Madapter
 * @author  	Magestore Developer
 */
class Magestore_Madapter_Block_Adminhtml_Banner_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct(){
		parent::__construct();
		$this->setId('banner_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('madapter')->__('Banner Information'));
	}
	
	/**
	 * prepare before render block to html
	 *
	 * @return Magestore_Madapter_Block_Adminhtml_Madapter_Edit_Tabs
	 */
	protected function _beforeToHtml(){
		$this->addTab('form_section', array(
			'label'	 => Mage::helper('madapter')->__('Banner Information'),
			'title'	 => Mage::helper('madapter')->__('Banner Information'),
			'content'	 => $this->getLayout()->createBlock('madapter/adminhtml_banner_edit_tab_form')->toHtml(),
		));
		return parent::_beforeToHtml();
	}
}