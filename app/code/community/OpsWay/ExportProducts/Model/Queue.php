<?php

class OpsWay_ExportProducts_Model_Queue extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('OpsWay_Exportproducts/Queue');
    }
}