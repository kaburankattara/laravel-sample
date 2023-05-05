<?php

namespace App\Domains;

use App\Domains\Sample;

class Samples
{
    public $timeStamp;
    public $sampleList;

    function __construct($sampleModelList) {

        $this->timeStamp = new \DateTime();
        if (empty($sampleModelList)) {
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
    
    public function sample()
    {
        return $this->hasOne(Sample::class, 'sample_no', 'sample_no');
    }
}
