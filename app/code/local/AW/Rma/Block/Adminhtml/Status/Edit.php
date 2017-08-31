<?php
/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/AW-LICENSE.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This software is designed to work with Magento community edition and
 * its use on an edition other than specified is prohibited. aheadWorks does not
 * provide extension support in case of incorrect edition use.
 * =================================================================
 *
 * @category   AW
 * @package    AW_Rma
 * @version    1.5.6
 * @copyright  Copyright (c) 2010-2012 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE.txt
 */


class AW_Rma_Block_Adminhtml_Status_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_status';
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'awrma';
        $this->_updateButton('save', 'onclick', "awrma_save();");

        $this->_addButton(
            'saveandcontinueedit', array(
                'label'   => $this->__('Save And Continue Edit'),
                'onclick' => 'awrmaSaveAndContinueEdit()',
                'class'   => 'save'
            ), -200
        );

        $this->_formScripts[] = "";
    }

    public function getHeaderText()
    {
        if (!Mage::registry('awrmaformdatatype')) {
            return $this->__('New RMA Status');
        } else {
            return $this->__('Edit RMA Status');
        }
    }
}