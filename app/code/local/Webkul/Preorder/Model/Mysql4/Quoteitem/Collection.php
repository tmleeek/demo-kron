<?php

class Webkul_Preorder_Model_Mysql4_Quoteitem_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('preorder/quoteitem');
    }
}