<?php
namespace StudyMage\Test\Block;
use Magento\Framework\View\Element\Template;

class FilmsContent extends \Magento\Framework\View\Element\Template
{

    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    function _prepareLayout(){}

    /**
     * @param $type
     * Type can be films, planets, people, species, starships, vehicles
     */
    public function addTypeContent($type)
    {
        $this->setTypeContent($type);
    }

    public function ApiData()
    {
        $content = strtolower(($this->getTypeContent()) ? $this->getTypeContent() : 'films');
        $url = "https://swapi.co/api/$content/";
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_HEADER, 0);
        curl_setopt ($connection, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($connection);
        curl_close($connection);

        $this->setFilms(json_decode($result,false));
    }
}
