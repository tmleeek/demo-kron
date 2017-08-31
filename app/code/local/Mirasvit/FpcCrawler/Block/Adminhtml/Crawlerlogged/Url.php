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
 * @package   Full Page Cache
 * @version   1.0.32
 * @build     662
 * @copyright Copyright (C) 2016 Mirasvit (http://mirasvit.com/)
 */



class Mirasvit_FpcCrawler_Block_Adminhtml_Crawlerlogged_Url extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_crawlerlogged_url';
        $this->_blockGroup = 'fpccrawler';
        $this->_headerText = Mage::helper('fpccrawler')->__('Crawler URLs for logged in users');

        parent::__construct();

        $this->_removeButton('add');
    }

    public function getCreateUrl()
    {
        return false;
    }
}
