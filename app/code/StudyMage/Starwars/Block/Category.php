<?php

namespace StudyMage\Starwars\Block;

use Magento\Framework\View\Element\Template;
use \Magento\Framework\Registry;

class Category extends \Magento\Framework\View\Element\Template
{
    protected $registry;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }

    function _prepareLayout(){}

    public function getSwapiCategoryData()
    {
        return $this->registry->registry('swapi_category_data');
    }

    public function getCategoryName()
    {
        return $this->getRequest()->getParam('category');
    }

    public function getItemId($url)
    {
        $tmp = explode('/', rtrim($url,'/'));
        return end($tmp);
    }
}
