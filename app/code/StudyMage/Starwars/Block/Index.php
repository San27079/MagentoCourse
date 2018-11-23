<?php

namespace StudyMage\Starwars\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $registry;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    )
    {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    function _prepareLayout(){}

    public function getApiData()
    {
        return $this->registry->registry('swapi_data');
    }
}
