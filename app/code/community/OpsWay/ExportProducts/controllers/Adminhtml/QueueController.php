<?php
 
class OpsWay_ExportProducts_Adminhtml_QueueController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('export_products_button')
            ->_title($this->__('View export queue'));

        $this->renderLayout();
    }

    public function newAction(){
        $this->loadLayout()
            ->_setActiveMenu('export_products_button')
            ->_title($this->__('Add export to queue'));

        //Add new export to queue
        $queueModel = Mage::getModel('OpsWay_Exportproducts/Queue');
        $queueModel->addData(array(
            'add_date'   => now(),
            'start_date' => null,
            'stop_date'  => null,
            'status'     => 'pending',
            'file'       => 'products_' . time() . '.csv'
        ));
        $queueModel->save();

        $this->renderLayout();

        return $this->_redirect('*/*/index');
    }

    public function viewAction(){
        $id = $this->getRequest()->getParam('id');
        $queueModel = Mage::getModel('OpsWay_Exportproducts/Queue')->load($id);
        $exportedFile = $queueModel->getData();

        $io   = new Varien_Io_File();
        $path = '/var/www/shared/var/export';
        $file = $path . DS . $exportedFile['file'];

        if($io->fileExists($file, true)) {
            $content = file_get_contents($file);
            return $this->_prepareDownloadResponse($exportedFile['file'], $content);
        } else {
            $this->_getSession()->addError($this->__('File ' . $exportedFile['file'] . ' doesn`t exist'));
        }
        return $this->_redirect('*/*/index');
    }

    public function massDeleteAction(){
        $ids = $this->getRequest()->getParam('exportIds');

        //Delete export task from queue table
        $queueModel = Mage::getModel('OpsWay_Exportproducts/Queue');
        foreach ($ids as $id) {
            $queueModel->load($id)->delete();
        }

        return $this->_redirect('*/*/index');
    }
}