<?php

namespace App\Domains;

use App\Domains\SampleElement;

class Sample
{
    
    public static function createEmptyInstance()
    {
        return new Sample(null);
    }
    
    public static function createInstance($sampleModelList)
    {
        return new Sample($sampleModelList);
    }
    
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

    public function getStatus()
    {
        $bumbo = count($this->sampleElementList);

        $bunshi = 0;
        foreach ($this->sampleElementList as $sampleElement) {
            if ($sampleElement->isFin()) {
                $bunshi++;
            }
        }

        return $bunshi."/".$bumbo;
    }
}
