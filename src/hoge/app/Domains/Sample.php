<?php

namespace App\Domains;

use App\Domains\SampleElement;

class Sample
{
    public $id;
    public $sampleNo;
    public $orderNo;
    public $sampleElementList;

    private function __construct($sampleModelList) {

        if ($sampleModelList == null) {
            return;
        }

        $this->id = $sampleModelList[0]->sample_id;
        $this->sampleNo = $sampleModelList[0]->sample_no;
        $this->orderNo = $sampleModelList[0]->order_no;

        $sampleElementList = array();
        foreach ($sampleModelList as $sampleModel) {
            $sampleElementList[] = SampleElement::createInstance($sampleModel);
        }
        $this->sampleElementList = $sampleElementList;
    }
    
    public static function createEmptyInstance()
    {
        return new Sample(null);
    }
    
    public static function createInstance($sampleModelList)
    {
        return new Sample($sampleModelList);
    }
}
