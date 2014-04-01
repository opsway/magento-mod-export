<?php
class OpsWay_ExportProducts_Block_Adminhtml_Queue_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('queueGrid');
		$this->setDefaultSort('add_date');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('OpsWay_Exportproducts/Queue')
					  ->setStoreId(Mage::app()->getStore()->getId())
					  ->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
	    $this->addColumn('id', array(
	        'header'    => Mage::helper('exportproducts')->__('Queue ID'),
	        'align'     => 'left',
	        'index'     => 'id',
	        'width'     => '20px'
	    ));
	    $this->addColumn('add_date', array(
			'header'    => Mage::helper('exportproducts')->__('Added to Queue Date'),
			'align'     => 'left',
			'width'     => '180px',
	        'type'      => 'datetime',
			'index'     => 'add_date',
		));
		$this->addColumn('start_date', array(
			'header'    => Mage::helper('exportproducts')->__('Export Started Date'),
			'align'     => 'left',
			'width'     => '180px',
	        'type'      => 'datetime',
			'index'     => 'start_date',
		));

		$this->addColumn('stop_date', array(
			'header'    => Mage::helper('exportproducts')->__('Export Finished Date'),
			'align'     => 'left',
	        'width'     => '180px',
	        'type'      => 'datetime',
			'index'     => 'stop_date',
		));

		$this->addColumn('status', array(
			'header'    => Mage::helper('exportproducts')->__('Current Status'),
			'align'     => 'right',
			'index'     => 'status',
			'width'     => '100px'
		));

		$this->addColumn('file', array(
			'header'    => Mage::helper('exportproducts')->__('File name'),
			'align'     => 'left',
			'index'     => 'file',
		));

		return parent::_prepareColumns();
	}

	protected function _prepareMassaction()
	{
		$this->setMassactionIdField('id');
		$this->getMassactionBlock()->setFormFieldName('exportIds');

		$this->getMassactionBlock()->addItem('delete', array(
			'label'    => Mage::helper('exportproducts')->__('Delete'),
			'url'      => $this->getUrl('*/*/massDelete'),
            'selected' => 'selected',
			'confirm'  => Mage::helper('exportproducts')->__('Are you sure want to remove selected export tasks?')
		));

       return $this;
	}

	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/view', array('id' => $row->getId()));
	}

}