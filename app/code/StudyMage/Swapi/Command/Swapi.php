<?php
namespace StudyMage\Swapi\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\ObjectManagerInterface;
use StudyMage\Swapi\Helper\SwapiDataFilms;
use StudyMage\Swapi\Helper\SwapiDataPeople;
use StudyMage\Swapi\Helper\SwapiDataStarships;

class Swapi extends Command
{
    protected $manager;

    public function __construct(
        ObjectManagerInterface $manager
    )
    {
        $this->manager = $manager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("swapi");
        $this->setDescription("Command return data from swapi helper class");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       /* $swapiFilms = $this->manager->create(SwapiDataFilms::class);
        $resultsFilms = $swapiFilms->getObject(5);
        $swapiPeople = $this->manager->create(SwapiDataPeople::class);
        $resultsPeople = $swapiPeople->getObject(5);
        $swapiStarships = $this->manager->create(SwapiDataStarships::class);
        $resultsStarships = $swapiStarships->getObject(5);

        $output->writeln($resultsFilms);
        $output->writeln($resultsPeople);
        $output->writeln($resultsStarships);*/

        $swapiFilms = $this->manager->create(SwapiDataFilms::class);
        $resultsFilms = $swapiFilms->getCollection();
        foreach($resultsFilms as $res){
            $output->writeln($res->director);
        }


    }
} 