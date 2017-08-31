<?php
/**
 * Mirasvit
 *
 * This source file is subject to the Mirasvit Software License, which is available at http://mirasvit.com/license/.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to http://www.magentocommerce.com for more information.
 *
 * @category  Mirasvit
 * @package   Advanced SEO Suite
 * @version   1.2.0
 * @build     970
 * @copyright Copyright (C) 2015 Mirasvit (http://mirasvit.com/)
 */


class Mirasvit_Seo_Model_Object_Pager extends Varien_Object
{
    public function _construct()
    {
        parent::_construct();
		$page = Mage::app()->getRequest()->getParam('p');
		if ($page > 1) {
		    $this->setPage(Mage::helper('seo')->__("Page %s", $page));
		}
	}
}