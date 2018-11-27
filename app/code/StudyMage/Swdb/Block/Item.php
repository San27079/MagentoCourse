<?php

namespace StudyMage\Swdb\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\ObjectManagerInterface;

class Item extends \Magento\Framework\View\Element\Template
{
    protected $manager;

    public function __construct
    (
        Template\Context $context,
        ObjectManagerInterface $manager,
        array $data = []
    )
    {
        $this->manager = $manager;
        parent::__construct($context, $data);
    }

    protected function _prepareLayout(){}

    public function getItems()
    {
        $model = $this->manager->create("StudyMage\Swdb\Model\\".$this->getCategory());
        return $model->getCollection();
    }

    public function getCategory()
    {
        return ucfirst($this->getRequest()->getParam('category'));
    }
}
