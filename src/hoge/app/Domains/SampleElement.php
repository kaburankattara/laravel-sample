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
        $this->type = $sampleModel->type;
        $this->status = $sampleModel->status;
    }

    public function isFin()
    {
        return $this->status == 1;
    }

    public function getTypeName()
    {
        if ($this->type == 1) {
            return "種類1";
        }

        if ($this->type == 2) {
            return "種類2";
        }

        if ($this->type == 3) {
            return "種類3";
        }

        return "不明";
    }

    public function getStatus()
    {
        return self::isFin() ? "済" : "";
    }
}
