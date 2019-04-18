<?php
namespace S4p\Custominvoicecloumn\Controller\Adminhtml\Order\Invoice;

class PrintAction extends \Magento\Sales\Controller\Adminhtml\Order\Invoice\PrintAction {
    
    public function execute() {
        
        $invoiceId = $this->getRequest()->getParam('invoice_id');
        $invoice = $this->_objectManager->create(
                \Magento\Sales\Api\InvoiceRepositoryInterface::class
            )->get($invoiceId);
        
        if($invoice) {
            
            $invoice->setData('is_printed', 1);
            $invoice->save();
        }
        
        return parent::execute();
        
    }
}