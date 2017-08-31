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
 * @package   Sphinx Search Ultimate
 * @version   2.3.4
 * @build     1356
 * @copyright Copyright (C) 2016 Mirasvit (http://mirasvit.com/)
 */



$installer = $this;
$installer->startSetup();

$resource = Mage::getSingleton('core/resource');
$connection = $resource->getConnection('core_write');
$connection->update($resource->getTableName('searchsphinx/synonym'), array('synonyms' => new Zend_Db_Expr('CONCAT(word, ",", synonyms)')));

$installer->endSetup();
