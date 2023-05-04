<?php

namespace App\Domains;

class Sample
{
    public $id;
    public $sampleNo;
    public $orderNo;
    public $sampleElementList;

    private function __construct($sampleModel) {

        if ($sampleModel == null) {
            return;
        }

        $this->id = $sampleModel->sample_id;
        $this->sampleNo = $sampleModel->sample_no;
        $this->orderNo = $sampleModel->order_no;
    }
    
    public static function createEmptyInstance()
    {
        return new Sample(null);
    }
    
    public static function createEmpty($sampleModelList)
    {
        return new Sample($sampleModelList);
    }
}
