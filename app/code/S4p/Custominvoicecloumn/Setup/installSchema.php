<?php

namespace S4p\Custominvoicecloumn\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {

        $setup->startSetup();

        $connection = $setup->getConnection();
        $getInvoiceTableName = $setup->getTable('sales_invoice');
        $getGridTableName = $setup->getTable('sales_invoice_grid');
        
        if ($connection->isTableExists($getInvoiceTableName) == true) {
            $connection->addColumn(
                    $getInvoiceTableName, 'is_printed', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'nullable' => false,
                'default' => 0,
                'comment' => 'Is Printed'
            ]);
            
        }
        
        if ($connection->isTableExists($getGridTableName) == true) {
            $connection->addColumn(
                    $getGridTableName, 'is_printed', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'nullable' => false,
                'default' => 0,
                'comment' => 'Is Printed'
            ]);
            
        }
        
        
        
        $setup->endSetup();
    }

}
