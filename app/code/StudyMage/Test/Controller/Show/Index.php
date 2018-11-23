<?php

namespace StudyMage\Test\Controller\Show;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $registry;
    protected $resultPageFactory;
    protected $helper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \StudyMage\Test\Helper\Data $helper
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        $this->helper = $helper;

        parent::__construct($context);
    }

    public function execute()
    {
        $this->registry->register('films', $this->getFilms());
        $title = $this->getRequest()->getParam('title');
        $this->registry->register('title', $this->helper->snakeToCamel($title));

        return $this->resultPageFactory->create();
    }

    protected function getFilms()
    {
        $url = 'https://swapi.co/api/films/';
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_HEADER, 0);
        curl_setopt ($connection, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($connection);
        curl_close($connection);
        return json_decode($result,false);
    }
}
