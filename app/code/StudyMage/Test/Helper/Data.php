<?php
/**
 * Created by PhpStorm.
 * User: San27079
 * Date: 16.11.2018
 * Time: 18:07
 */

namespace StudyMage\Test\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    const DEFAULT_API_URL = 'https://swapi.co/api/';
    protected $num = 0;
    /**
     * @param null $category
     * @param null $id
     * @param null $url
     * @return mixed
     */
    public function getData($category = null, $id = null, $url = null)
    {
        $url = $this->generateUrl($category, $id, $url);
        if(!empty($category) && empty($id)){
            return $this->getAllDataFromCategory($url);
        }
        return $this->getDataFromApi($url);
    }

    /**
     * @param $category
     * @param $id
     * @param $api_url
     * @return string
     */
    protected function generateUrl($category, $id, $api_url)
    {
        $url = ((!empty($api_url)) ? strtolower($api_url) : self::DEFAULT_API_URL);

        if(!empty($category)){
            $url .= strtolower($category).'/';
        }
        if(!empty($id)){
            $url .= $id.'/';
        }
        return $url;
    }

    /**
     * @param $url
     * @return mixed
     */
    protected function getDataFromApi($url, $as_array = false)
    {
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_HEADER,0);
        curl_setopt ($connection, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($connection);
        $code = curl_getinfo($connection, CURLINFO_HTTP_CODE);
        curl_close($connection);
        if($code == 404){
            return $code;
        }
        return json_decode($result, $as_array);
    }

    /**
     * @param $url
     * @return object
     */
    protected function getAllDataFromCategory($url)
    {
        $all_data = null;
        while(!empty($url)){
            $data = $this->getDataFromApi($url, true);
            $url = $data['next'];
            if(empty($all_data)){
                $all_data = $data;
            }else{
                $all_data['results'] = array_merge($all_data['results'], $data['results']);
            }
        }
        return json_decode(json_encode($all_data), false);
    }

    public function snakeToCamel($snake)
    {
        $camel = ucwords(str_replace('_',' ', $snake));
        return str_replace(' ', '', $camel);
    }

    public function setNum()
    {
        $this->num += 2;
    }

    public function getNum()
    {
        return $this->num;
    }

}