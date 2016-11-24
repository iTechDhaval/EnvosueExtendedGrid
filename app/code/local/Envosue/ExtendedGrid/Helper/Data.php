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
 * @category    Envosue
 * @package     Envosue_ExtendedGrid
 * @author      Envosue Core Team
 * @copyright   Copyright (c) 2014 Envosue (http://www.envosue.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Envosue_ExtendedGrid_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * parameters for addColumnAfter method
     * @return array
     */
    public function getShippingMethodColumnParams()
    {
        return array(
            'header' => 'Shipping Method',
            'index' => 'shipping_description',
            'type' => 'text',
            'filter_condition_callback' => array('Envosue_ExtendedGrid_Model_Observer', 'filterShippingMethod'),
        );
    }
}
