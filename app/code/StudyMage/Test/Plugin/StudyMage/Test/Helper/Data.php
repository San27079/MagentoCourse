<?php
namespace StudyMage\Test\Plugin\StudyMage\Test\Helper;
class Data
{
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}
    //function afterMETHOD($subject, $result){return $result;}
    function afterGetNum($subject, $result)
    {
        $result = 'Plugin was here';
        return $result;
    }
}
