<?php
namespace StudyMage\Test\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command
{
    protected $manager;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $manager
    )
    {
        $this->manager = $manager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("test");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    )
    {

        for($i = 0; $i < 5; $i++){
            $data = $this->manager->get('StudyMage\Test\Helper\Data');
            $data->setNum();
            $output->writeln($data->getNum());
        }
    }
} 