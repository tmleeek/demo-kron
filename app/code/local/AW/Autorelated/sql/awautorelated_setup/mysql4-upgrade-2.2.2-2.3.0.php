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
 * @package    AW_Autorelated
 * @version    2.4.11
 * @copyright  Copyright (c) 2010-2012 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE.txt
 */

$this->startSetup();

/** @var $collection AW_Autorelated_Model_Mysql4_Blocks_Collection */
$collection = Mage::getModel('awautorelated/blocks')->getCollection();
$pagesCount = ceil($collection->getSize() / 10);
for ($i = 1; $i <= $pagesCount; $i++) {
    $collection->clear();
    $collection->setPageSize(10);
    $collection->setCurPage($i);
    foreach ($collection as $block) {
        if ($block->getData('randomize')) {
            $block = Mage::getModel('awautorelated/blocks')->load($block->getId());

            $relatedProductData = new Varien_Object();
            if ($block->getData('related_products')) {
                $relatedProductData = $block->getData('related_products');
            }

            $relatedProductData->setData('order', array(
                'type'            => AW_Autorelated_Model_Source_Block_Common_Order::RANDOM,
                'order_attribute' => null,
                'order_direction' => null
            ));

            $currentlyViewed = array();
            if ($block->getData('currently_viewed')) {
                $currentlyViewed = $block->getData('currently_viewed');
            }
            $block->setData('related_products', $relatedProductData->toArray());
            $block->setData('currently_viewed', $currentlyViewed);
            $block->save();
        }
    }
}
$this->getConnection()->dropColumn($this->getTable('awautorelated/blocks'), 'randomize');
$this->endSetup();