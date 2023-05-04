<?php

namespace App\Domains;

class SampleElement
{
    public int $id;
    public int $sampleId;
    public int $status;

    function __construct($id, $sampleId, $status) {
        $this->id = $id;
        $this->sampleId = $sampleId;
        $this->status = $status;
    }

    public function sample()
    {
        return $this->hasOne(Sample::class, 'sample_no', 'sample_no');
    }
}
