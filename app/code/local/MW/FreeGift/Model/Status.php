<?php

class MW_FreeGift_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 0;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('freegift')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('freegift')->__('Disabled')
        );
    }
}