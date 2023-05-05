<?php

namespace App\Domains;

class SampleElement
{
    
    public static function createEmptyInstance()
    {
        return new SampleElement(null);
    }
    
    public static function createInstance($sampleModel)
    {
        return new SampleElement($sampleModel);
    }
    
    public $id;
    public $type;
    public $status;

    function __construct($sampleModel) {
        $this->id = $sampleModel->sample_element_id;
        $this->status = $sampleModel->status;
    }

    public function sample()
    {
        return $this->hasOne(Sample::class, 'sample_no', 'sample_no');
    }
}
