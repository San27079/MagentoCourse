<?php

namespace StudyMage\Swapi\Block;

use Magento\Framework\View\Element\Template;
use StudyMage\Swapi\Helper\SwapiConfig;
use StudyMage\Swapi\Helper\SwapiData;

class Main extends \Magento\Framework\View\Element\Template
{
    protected $config;
    protected $swapiData;

    public function __construct
    (
        Template\Context $context,
        SwapiConfig $config,
        SwapiData $swapiData,
        array $data = []
    )
    {
        $this->swapiData = $swapiData;
        $this->config = $config;
        parent::__construct($context, $data);
    }

    public function _prepareLayout(){}

    public function getSwapiData()
    {
        return $this->swapiData->getCollection();
    }

}
