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
        $sampleOfNow = Sample::createEmptyInstance();
        // $sampleIdOfNow = $sampleModelList[0]->sample_id;
        foreach ($sampleModelList as $sampleModel) {
            if ($sampleOfNow->id != $sampleModel->sample_id) {
                
            }
        }
        // $this->status = $status;
    }
    
    public function sample()
    {
        return $this->hasOne(Sample::class, 'sample_no', 'sample_no');
    }
}
