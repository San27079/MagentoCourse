<?php
namespace StudyMage\Test\Block;
use Magento\Framework\View\Element\Template;

class Show extends \Magento\Framework\View\Element\Template
{
    protected $registry;

    /**
     * Show constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }


    public function _prepareLayout(){
        $this->setTitle($this->registry->registry('title'));
    }

    public function getRegistryFilms()
    {
        return $this->registry->registry('films')->results;
    }
}
