<?php

namespace StudyMage\Starwars\Block;

use Magento\Framework\View\Element\Template;
use StudyMage\Starwars\Helper\SwapiHelper;

class Sidebar extends \Magento\Framework\View\Element\Template
{

    protected $swapiHelper;

    public function __construct(
        Template\Context $context,
        SwapiHelper $swapiHelper,
        array $data = []
    )
    {
        $this->swapiHelper = $swapiHelper;
        parent::__construct($context, $data);
    }

    function _prepareLayout(){
        $this->setSwapiCategories($this->swapiHelper->getData());
    }

}
