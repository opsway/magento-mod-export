<?php
$installer = $this;

$installer->startSetup();

/**
 * Create table 'exportproducts_queue'
 */
$table = $installer->getConnection()->newTable($installer->getTable('OpsWay_Exportproducts/queue_table'));
$table->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        'identity' => true,
    ), 'Queue ID')
    ->addColumn('add_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Added to Queue Date')
    ->addColumn('start_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Started Export Date')
    ->addColumn('stop_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Stopped Export Date')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Current Export Status')
    ->addColumn('file', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
    ), 'Export File Name')
    ->setComment('Export Products Queue');
$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');
$installer->getConnection()->createTable($table);

$installer->endSetup();