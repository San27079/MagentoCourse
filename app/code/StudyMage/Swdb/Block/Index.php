<?php

namespace StudyMage\Swdb\Block;

use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct
    (
        Template\Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
    }

    protected function _prepareLayout(){}


    public function getItems()
    {
        return [
            [
                'name' => 'Films',
                'category' => 'film'
            ],
            [
                'name' => 'People',
                'category' => 'people'
            ],
            [
                'name' => 'Starships',
                'category' => 'starship'
            ]
        ];
    }
}
