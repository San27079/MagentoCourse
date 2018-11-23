<?php

namespace StudyMage\Swapi\Plugin\StudyMage\Swapi\Helper;


class SwapiData
{
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}


    public function afterGetObject($subject, $result)
    {
        if(!empty($subject->props)){
            $filter_result = [];
            foreach($subject->props as $prop){
                if(isset($result->$prop)){
                    $filter_result[$prop] = $result->$prop;
                }
            }
            return (object) $filter_result;
        }
        return $result;
    }
}
