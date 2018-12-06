<?php

namespace StudyMage\Swapi\Setup;

use Magento\Framework\ObjectManagerInterface;
use StudyMage\Swapi\Helper\SwapiDataFilms;

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
                $installer->getTable('swapi_film'),
                $this->insertFilms()
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
                'director' => $res->director,
                'producer' => $res->producer,
                'release_date' => $res->release_date,
                'episode_id' => $res->episode_id,
                'opening_crawl' => $res->opening_crawl,
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
