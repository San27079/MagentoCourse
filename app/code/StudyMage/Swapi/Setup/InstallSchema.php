<?php

namespace StudyMage\Swapi\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff
        
        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable('swapi_film')
        )->addColumn(
            'film_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Entity ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Title'
        )->addColumn(
            'director',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Director'
        )->addColumn(
            'producer',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Producer'
        )->addColumn(
            'release_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Release_Date'
        )->addColumn(
            'episode_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Episode Id'
        )->addColumn(
            'opening_crawl',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            500,
            [ 'nullable' => false, ],
            'Opening Crawl'
        );
        $installer->getConnection()->createTable($table);
        //END   table setup
        //END   table setup
$installer->endSetup();
    }
}
