<?php

class OpsWay_ExportProducts_Model_Mysql4_Queue_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('OpsWay_Exportproducts/Queue');
    }
}