<?php

namespace StudyMage\Swdb\Setup;

use Magento\Framework\ObjectManagerInterface;
use StudyMage\Swapi\Helper\SwapiDataFilms;
use StudyMage\Swapi\Helper\SwapiDataPeople;
use StudyMage\Swapi\Helper\SwapiDataStarships;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    protected $manager;

    public function __construct
    (
        ObjectManagerInterface $manager
    )
    {
        $this->manager = $manager;
    }

    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $installer->getConnection()
            ->insertMultiple(
                $installer->getTable('swdb_film'),
                $this->insertFilms()
            );
        $installer->getConnection()
            ->insertMultiple(
                $installer->getTable('swdb_people'),
                $this->insertPeople()
            );
        $installer->getConnection()
            ->insertMultiple(
                $installer->getTable('swdb_starship'),
                $this->insertStarships()
            );
        $installer->endSetup();


    }

    public function insertFilms()
    {
        $swapi = $this->manager->create(SwapiDataFilms::class);
        $results = $swapi->getCollection();
        $insertData = [];
        foreach($results as $res){
            $insertData[] = [
                'title' => $res->title,
                'director' => $res->director
            ];
        }
        return $insertData;
    }

    public function insertPeople()
    {
        $swapi = $this->manager->create(SwapiDataPeople::class);
        $results = $swapi->getCollection();
        $insertData = [];
        foreach($results as $res){
            $insertData[] = [
                'name' => $res->name,
                'gender' => $res->gender
            ];
        }
        return $insertData;
    }

    public function insertStarships()
    {
        $swapi = $this->manager->create(SwapiDataStarships::class);
        $results = $swapi->getCollection();
        $insertData = [];
        foreach($results as $res){
            $insertData[] = [
                'name' => $res->name,
                'model' => $res->model
            ];
        }
        return $insertData;
    }
}
