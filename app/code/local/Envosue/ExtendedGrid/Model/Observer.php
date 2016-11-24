<?php
/**
 * Envosue
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Envosue
 * @package     Envosue_ExtendedGrid
 * @author      Envosue Core Team
 * @copyright   Copyright (c) 2014 Envosue (http://www.envosue.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Envosue_ExtendedGrid_Model_Observer
{
    /**
     * Joins extra tables for adding custom columns to Mage_Adminhtml_Block_Sales_Order_Grid
     * @param Varien_Object $observer
     * @return Envosue_Exgrid_Model_Observer
     */
    public function salesOrderGridCollectionLoadBefore($observer)
    {
        $collection = $observer->getOrderGridCollection();
        $select = $collection->getSelect();
        $select->join(array('order' => $collection->getTable('sales/order')), 'order.entity_id=main_table.entity_id', array('shipping_description' => 'shipping_description'));

        $select->group('main_table.entity_id');
    }

    /**
     * callback function used to filter collection
     * @param $collection
     * @param $column
     * @return $this
     */
    public function filterShippingMethod($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return $this;
        }

        $collection->getSelect()->having(
            "`order`.shipping_description LIKE ?", "%$value%");

        return $this;
    }
}