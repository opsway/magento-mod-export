<?php

class OpsWay_ExportProducts_Model_Mysql4_Queue extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('OpsWay_Exportproducts/queue_table', 'id');
    }
}