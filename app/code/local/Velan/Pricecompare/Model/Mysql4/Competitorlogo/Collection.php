<?php

class Velan_Pricecompare_Model_Mysql4_Competitorlogo_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('pricecompare/competitorlogo');
    }
}