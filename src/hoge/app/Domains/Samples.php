<?php

namespace App\Domains;

use App\Domains\Sample;

class Samples
{
    
    public static function createEmptyInstance()
    {
        return new Samples(null);
    }
    
    public static function createInstance($sampleModelList)
    {
        return new Samples($sampleModelList);
    }

    public $timeStamp;
    public $sampleList;

    function __construct($sampleModelList) {

        $this->timeStamp = new \DateTime();
        if (count($sampleModelList) == 0) {
            $this->sampleList = array();
            return;
        }

        $sampleList = array();
        $sampleModelListOfNow = array();
        foreach ($sampleModelList as $sampleModel) {
            // サンプルIDが変われば、Sampleを生成し、今のリストを初期化する
            if (count($sampleModelListOfNow) != 0 
                && $sampleModelListOfNow[0]->sample_id != $sampleModel->sample_id) {
                $sampleList[] = Sample::createInstance($sampleModelListOfNow);
                $sampleModelListOfNow = array();
            }
            $sampleModelListOfNow[] = $sampleModel;
        }
        $sampleList[] = Sample::createInstance($sampleModelListOfNow);

        $this->sampleList = $sampleList;
    }
    
    public function getDateTime()
    {
        return $this->timeStamp->format('Y-m-d H:i:s');
    }
    
    public function getFirst()
    {
        if (self::isEmpty()) {
            return Sample::createEmptyInstance();
        }

        return $this->sampleList[0];
    }

    public function isEmpty()
    {
        return count($this->sampleList) == 0;
    }
}
