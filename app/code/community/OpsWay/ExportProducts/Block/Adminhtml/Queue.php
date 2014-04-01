<?php
 
class OpsWay_ExportProducts_Block_Adminhtml_Queue extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_queue';
        $this->_blockGroup = 'exportproducts';
        $this->_headerText = Mage::helper('exportproducts')->__('View export queue grid');
        $this->_addButtonLabel = Mage::helper('exportproducts')->__('Add new export task');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }
}
